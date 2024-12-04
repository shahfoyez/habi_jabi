public function GetAllAssignedCourses() {
		global $wpdb, $status;
		$table_name = $wpdb->prefix . 'bd_assigned_course';

		$query       = $wpdb->prepare( "
			SELECT *
			FROM $table_name
			WHERE manager_id = %d
			ORDER BY created_at DESC
		", $this->current_user_id );
		$all_courses = $wpdb->get_results( $query );
		$domain      = 'commonwealth.int';
		$users_query = $wpdb->prepare( "
			    SELECT ID 
			    FROM {$wpdb->users}
			    WHERE user_email LIKE %s
			", '%' . $wpdb->esc_like( '@' . $domain ) );

		$user_ids = $wpdb->get_col( $users_query );
		$results = [];

		if (!empty($user_ids)) {
			foreach ($user_ids as $user_id) {
				$courses_query = $wpdb->prepare("
		            SELECT 
		                um.meta_key AS meta_key, 
		                um.meta_value AS meta_value
		            FROM {$wpdb->usermeta} um
		            WHERE um.user_id = %d AND um.meta_key LIKE %s
		        ", $user_id, 'course_status%');
				$courses = $wpdb->get_results($courses_query);

				foreach ($courses as $course) {
					preg_match('/course_status(\d+)/', $course->meta_key, $matches);
					if (!empty($matches[1])) {
						$course_id = $matches[1];
						$created_at = maybe_unserialize($course->meta_value)['start_date'] ?? null;

						$results[] = (object) [
							'learner_id' => $user_id,
							'course_id'  => $course_id,
							'created_at' => !empty($created_at) ? date('Y-m-d H:i:s', $created_at) : null,
						];
					}
				}
			}
		}
		foreach ($results as $result) {
			$duplicate_found = false;
			foreach ($all_courses as $course) {
				if ($result->learner_id == $course->learner_id && $result->course_id == $course->course_id) {
					$duplicate_found = true;
					break;
				}
			}
			if (!$duplicate_found) {
				$all_courses[] = $result;
			}
		}
		$filtered_courses = array();
		foreach ($all_courses as $course) {
			$user_id = $course->learner_id;
			$course_id = $course->course_id;
			// Fetch course start and completion dates
			$activity_table = $wpdb->prefix . 'bp_activity';
			$dates_query = $wpdb->prepare(
				"SELECT
		            MAX(CASE WHEN type = 'start_course' THEN date_recorded ELSE NULL END) AS start_date,
		            MAX(CASE WHEN type = 'submit_course' THEN date_recorded ELSE NULL END) AS completion_date
		         FROM $activity_table
		         WHERE user_id = %d AND item_id = %d",
						$user_id,
						$course_id
					);

			$dates = $wpdb->get_row($dates_query);

			// Format dates
			$start_date = !empty($dates->start_date) ? date('d F Y, h:i A', strtotime($dates->start_date)) : 'Not started';
			$completion_date = !empty($dates->completion_date) ? date('d F Y, h:i A', strtotime($dates->completion_date)) : 'Not completed';
			// calculate duration
//			$units = bp_course_get_curriculum_units($course_id);
			$duration = $total_duration = 0;


			// Query the bp_activity table to fetch completed units for this user and course
			$activities = $wpdb->get_results(
				$wpdb->prepare("
                SELECT secondary_item_id
                FROM {$wpdb->prefix}bp_activity
                WHERE user_id = %d
                  AND item_id = %d
                  AND type = %s
            ", $user_id, $course_id, 'unit_complete')
			);
			$units = [];
			if (!empty($activities)) {
				$units = array_map(function ($activity) {
					return $activity->secondary_item_id;
				}, $activities);
			}
			foreach ($units as $unit) {
				$duration = get_post_meta($unit, 'vibe_duration', true);
				if (empty($duration)) {
					$duration = 0;
				}
				if (get_post_type($unit) == 'unit') {
					$unit_duration_parameter = apply_filters('vibe_unit_duration_parameter', 60, $unit);
				} elseif (get_post_type($unit) == 'quiz') {
					$unit_duration_parameter = apply_filters('vibe_quiz_duration_parameter', 60, $unit);
				}
				$total_duration += $duration * $unit_duration_parameter;
			}

			$course_duration = 0;
			if($total_duration > 0){
				$hours = floor($total_duration / 3600);
				$minutes = floor(($total_duration % 3600) / 60);
				$seconds = $total_duration % 60;

				// Build the formatted string dynamically
				$time_parts = [];
				if ($hours > 0) {
					$time_parts[] = sprintf('%d hour%s', $hours, $hours > 1 ? 's' : '');
				}
				if ($minutes > 0) {
					$time_parts[] = sprintf('%d min%s', $minutes, $minutes > 1 ? 's' : '');
				}
				if ($seconds > 0) {
					$time_parts[] = sprintf('%d sec%s', $seconds, $seconds > 1 ? 's' : '');
				}
				$course_duration = implode(' ', $time_parts);
			}
			$course->course_duration = $course_duration;
			$course->completion_date = $completion_date;
			$course->start_date = $start_date;

			$course_name = get_the_title($course->course_id);
			$course_progress = $progress = floor(bp_course_get_user_progress($course->learner_id, $course->course_id));
			$status = bp_course_get_user_course_status($course->learner_id, $course->course_id);
			$course_status = $status == 1 ? 'Not Started' : ( $status == 4 ? 'Completed' : 'Incomplete' );

			$learner_id = $course->learner_id;

			$user_info = get_userdata($learner_id);

			$user_email = $user_info->user_email;
			$name = $user_info->display_name;

			
			
			$avatar_url = get_avatar_url($learner_id);
			$user_roles = implode(', ', $user_info->roles);

			$user_department_id = get_user_meta($learner_id, 'user_department', true);
			$table_name = $wpdb->prefix . 'bd_departments';
			$query_dep = $wpdb->prepare("SELECT name FROM $table_name WHERE id = $user_department_id");
			$department = $wpdb->get_var($query_dep);

			$course->course_name = $course_name;
			$course->course_progress = $course_progress;
			$course->course_status = $course_status;
			$course->learner_name = $name;
			$course->learner_email = $user_email;
			$course->learner_department = $department;
			$course->learner_avatar = $avatar_url;
			$course->learner_roles = $user_roles;


			if($status == 1){
				$filtered_courses['not-started'][] = $course;
			}elseif($status == 4){
				$filtered_courses['completed'][] = $course;
			}else{
				$filtered_courses['not-completed'][] = $course;
			}
		}

		return[
			'all' => $all_courses,
			'filtered' => $filtered_courses
		];
	}
