<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../helpers/Format.php');
?>
<?php
class OrderCertificate
{
    private $fm;
    public function __construct()
    {
        $this->fm = new Format();
    }
    public function getCourses()
    {
        $user_id = get_current_user_id();
        $course_ids = bp_course_get_user_courses($user_id);

        if ($course_ids) {
            // get user certificates(string)
            $user_certificates = get_user_meta($user_id, 'certificates', true);
            // get the distinct course ids
            $distinct_course_ids = array_unique($course_ids);

            // dd($distinct_course_ids);
            if ($user_certificates != NULL) {
                // Get the common elements
                $common_elements = array_intersect($user_certificates, $distinct_course_ids);
                $different_elements = array_diff($distinct_course_ids, $user_certificates);
            } else {
                $common_elements = array('');
                $different_elements =  $distinct_course_ids;
            }

            // Create the two separate arrays
            $claimed = count($common_elements) > 0 ? $common_elements : array('');
            $pending = count($different_elements) > 0 ? $different_elements : array('');

            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $default = array(
                'post_type' => 'course',
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'ASC',
                'meta_query' => array(
                    array(
                        'key' => 'vibe_certificate_template',
                        'compare' => '!=',
                        'value' => ''
                    ),
                    // array(
                    //     'key' => 'vibe_product',
                    //     'value'   => array(''),
                    //     'compare' => 'NOT IN'
                    // ),
                ),
            );
            $claimed_arg = array(
                'post__in' =>  $claimed,
                'posts_per_page' => 4, // number of courses per page
            );
            $pending_arg = array(
                'post__in' =>  $pending,
                'posts_per_page' => 10, // number of courses per page
                'paged' => $paged,
            );
            $allPending_arg = array(
                'post__in' =>  $pending,
                'posts_per_page' => -1,
            );
            $claimed_merged_args = array_merge($default, $claimed_arg);
            $pending_merged_args = array_merge($default, $pending_arg);
            $all_pending_cources_args = array_merge($default, $allPending_arg);

            $claimed_cources = new WP_Query($claimed_merged_args);
            $pending_cources = new WP_Query($pending_merged_args);
            $all_pending_cources = new WP_Query($all_pending_cources_args);

            $data = array(
                'claimed' => $claimed_cources,
                'pending' => $pending_cources,
                'allPending' => $all_pending_cources
            );
        } else {
            $data = [];
        }
        return $data;
    }
    public function getAllCourses()
    {
        $args = array(
            'post_type' => 'course',
            'post_status' => 'publish',
            'posts_per_page' => 50,
            'orderby' => 'date',
            'order' => 'DESC',
            'meta_query' => array(
                array(
                    // 'key' => 'average_rating',
                    'key' => 'vibe_students',
                ),
                // array(
                //     'key' => 'vibe_product',
                //     'value'   => array(''),
                //     'compare' => 'NOT IN'
                // ),
                array(
                    'key' => 'vibe_certificate_template',
                    'compare' => '!=',
                    'value' => ''
                )
            ),
        );
        $the_query = new WP_Query($args);
        return $the_query->posts;
    }
    public function courseCount()
    {
        $user_id = get_current_user_id();

        $taken_cources = 0;
        $claimed_cources = 0;
        if ($user_id) {
            $user_certificates = get_user_meta($user_id, 'certificates', true);
            $course_ids = bp_course_get_user_courses($user_id);


            if (count($course_ids) > 0) {
                $distinct_course_ids = count(array_unique($course_ids)) > 0 ? array_unique($course_ids) : array('');
                $claimed_cources = count(array_intersect($user_certificates, $distinct_course_ids)) ?? 0;

                // get courses that has certificate
                $taken = array(
                    'post_type' => 'course',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'orderby' => 'date',
                    'order' => 'ASC',
                    'meta_query' => array(
                        array(
                            'key' => 'vibe_certificate_template',
                            'compare' => '!=',
                            'value' => ''
                        ),
                        // array(
                        //     'key' => 'vibe_product',
                        //     'value'   => array(''),
                        //     'compare' => 'NOT IN'
                        // ),
                    ),
                    'post__in' =>  $distinct_course_ids,
                    'fields' => 'ids'
                );
                $taken_cources = count(get_posts($taken));
            }
        }

        // all courses
        $allCourses = array(
            'post_type' => 'course',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'meta_query' => array(
                // array(
                //     'key' => 'vibe_product',
                //     'value'   => array(''),
                //     'compare' => 'NOT IN'
                // ),
                array(
                    'key' => 'vibe_certificate_template',
                    'compare' => '!=',
                    'value' => ''
                )
            ),
            'fields' => 'ids'
        );

        $all_courses = count(get_posts($allCourses));
        $data = array(
            'all' => $all_courses,
            'taken' =>  $taken_cources,
            'claimed' => $claimed_cources,
        );
        return $data;
    }
    public function courseLinkIdExtract($data)
    {
        // Get the course link
        $course_link = $data['course-link'];

        // Extract the path from the URL
        $path = parse_url($course_link, PHP_URL_PATH);

        // Get the last segment of the path, which should be the course slug
        $segments = explode('/', rtrim($path, '/'));
        $course_slug = end($segments);

        // Query the database to find the course ID
        global $wpdb;
        $course_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_type = 'course' AND post_name = '$course_slug'");

        if ($course_id != NULL) {

            $category = has_term('quality-licence-scheme-endorsed', 'course-cat', $course_id);
            if ($category) {
                $maxLevel = $this->getMaxLevel($course_id);
            } else {
                $maxLevel = "";
            }
            $course_type = $category == true ? 'qls' : '';
            echo "<script>window.location = 'https://uk.hfonline.org/new-certificate-2023-test/?course-id=" . $course_id . "&course-type=" . $course_type . "&course-level=" . $maxLevel . "';</script>";
        } else {
            $msg = "Sorry! Course not found!";
            return $msg;
        }
    }
    public function getClaimedCourses()
    {
        $user_id = get_current_user_id();
        $course_ids = bp_course_get_user_courses($user_id);

        if ($course_ids) {
            // get user certificates(string)
            $user_certificates = get_user_meta($user_id, 'certificates', true);
            // get the distinct course ids
            $distinct_course_ids = array_unique($course_ids);

            if ($user_certificates != NULL) {
                // Get the common element
                $common_elements = array_intersect($user_certificates, $distinct_course_ids);
            } else {
                $common_elements = array('');
            }
            // Create claimed array
            $claimed = count($common_elements) > 0 ? $common_elements : array('');
            $arg = array(
                'post_type' => 'course',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'ASC',
                'meta_query' => array(
                    array(
                        'key' => 'vibe_certificate_template',
                        'compare' => '!=',
                        'value' => ''
                    ),
                    // array(
                    //     'key' => 'vibe_product',
                    //     'value'   => array(''),
                    //     'compare' => 'NOT IN'
                    // ),
                ),
                'post__in' =>  $claimed,
            );

            $claimed_cources = new WP_Query($arg);
        } else {
            $claimed_cources = [];
        }
        return $claimed_cources;
    }
    public function proceedButtonClicked($data)
    {
        $rec_name = $data['cert-recipient-name'];
        $rec_name = $this->fm->validation($rec_name);

        $rec_email = $data['cert-recipient-email'];
        $rec_email = $this->fm->validation($rec_email);

        $option = $data['radio-group-cert-gift'];
        $option = $this->fm->validation($option);

        $course_id = $data['course-id'];
        $course_id = $this->fm->validation($course_id);

        $course_price = $data['course-price'];
        $course_price = $this->fm->validation($course_price);
        $course_price = $option == 1 ? $course_price : '';

        $course_type = $data['course-type'];
        $course_type = $this->fm->validation($course_type);
        if ($rec_name == '' ||  $rec_email == '' || $option == '' || $course_id == '') {
            $msg =  "Please check the input fields!";
            return $msg;
        } else {
            // redirect
            echo "<script>window.location = 'https://uk.hfonline.org/gift-certificate-test/?course-id=" . $course_id . "&course-price=" . $course_price . "&course-type=" . $course_type . "&recipient_name=" . $rec_name . "&recipient_email=" . $rec_email . "';</script>";
        }
    }
    public function applyButtonClicked($data)
    {
        $rec_name = $data['cert-recipient-name'];
        $rec_name = $this->fm->validation($rec_name);

        $rec_email = $data['cert-recipient-email'];
        $rec_email = $this->fm->validation($rec_email);

        $option = $data['radio-group-cert-gift'];
        $option = $this->fm->validation($option);



        if ($rec_name == '' ||  $rec_email == '' || $option == '') {
            $msg =  "Please check the input fields!";
            return $msg;
        } else {
            // Get the course link
            $course_link = $data['course-link'];

            // Extract the path from the URL
            $path = parse_url($course_link, PHP_URL_PATH);

            // Get the last segment of the path, which should be the course slug
            $segments = explode('/', rtrim($path, '/'));
            $course_slug = end($segments);

            // Query the database to find the course ID
            global $wpdb;
            $course_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_type = 'course' AND post_name = '$course_slug'");

            $product_id = get_post_meta($course_id, 'vibe_product', true);
            $reg_price = get_post_meta($product_id, '_regular_price', true);
            $sale_price = get_post_meta($product_id, '_sale_price', true);
            $price = $sale_price ?? $reg_price;

            if ($course_id != NULL) {
                $category = has_term('quality-licence-scheme-endorsed', 'course-cat', $course_id);
                $course_type = $category == true ? 'qls' : '';

                if ($category) {
                    $maxLevel = $this->getMaxLevel($course_id);
                } else {
                    $maxLevel = "";
                }
                if($option != 1){
                    $price = '';
                }
                // redirect
                echo "<script>window.location = 'https://uk.hfonline.org/gift-certificate-test/?course-id=" . $course_id . "&course-price=" . $price . "&course-type=" . $course_type . "&course-level=" . $maxLevel ."&recipient_name=" . $rec_name . "&recipient_email=" . $rec_email . "&option=" . $option . "';</script>";
            } else {
                $msg = "Sorry! Course not found!";
                return $msg;
            }
        }
    }
    public function getMaxLevel($course_id)
    {
        $levels = get_the_terms($course_id, 'level');
        // $levels = array('Level 5', 'Level 4', 'Level 7 - Certificate', 'Level8 - Certificate 6');
        $numbers = array();
        $highest_level = '';
        // Extract numbers from array using regular expression
        foreach ($levels as $level) {
            preg_match('/\d+/', $level->name, $match);
            if (isset($match[0])) {
                $numbers[] = intval($match[0]);
            }
        }
        // Get highest number and corresponding string
        if (!empty($numbers)) {
            $highest_number = max($numbers);
            $index = array_search($highest_number, $numbers);
            if ($index !== false) {
                $highest_level = $levels[$index]->name;
            }
        }
        return $highest_level;
    }
}
?>
