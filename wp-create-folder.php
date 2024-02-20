// Define the folder name
$folder_name = 'sa-transcript-pdf';

// Get the absolute path to the WordPress uploads directory
$wp_uploads_dir = wp_upload_dir();

// Define the full path for the new folder
$folder_path = $wp_uploads_dir['basedir'] . '/' . $folder_name;

// Create the folder if it doesn't already exist
if (!file_exists($folder_path)) {
	$mkdir_result = wp_mkdir_p($folder_path);

	// Check if the folder was created successfully
	if ($mkdir_result !== false) {
		echo "Folder '$folder_name' created successfully.";
	} else {
		echo "Failed to create folder '$folder_name'.";
	}
} else {
	echo "Folder '$folder_name' already exists.";
}
