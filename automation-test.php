<?php
/* Template Name: Automation Test */
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
//ini_set('log_errors', 1);
require_once WP_PLUGIN_DIR . '/ct-automation/classes/CTController.php';
require_once WP_PLUGIN_DIR . '/ct-automation/classes/CTAssignController.php';

//global $wpdb;
//$certificate_clicked = true;
//$transcript_clicked = true;
//
//$name = "sHAH fAYEZ aLI";
//$course_id = 266764;
//
//$ct_controller = new CTController();
//$do_automation = $ct_controller->UpdateUserCT($course_id, $name, $certificate_clicked, $transcript_clicked);
//
//echo "<pre>";
//var_dump($do_automation);
//echo "</pre>";
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_DISPLAY', true );
@ini_set('display_errors', 1);
if (isset($_POST['assign_ct_submit'])) {
    $controller = new CTAssignController();
    $response = $controller->AssignCT();

   echo '<pre>';
   var_dump($response);
   echo '</pre>';
}
?>
<form method="POST" action="">
    <input type="hidden" name="course_id" value="266764">
    <input type="hidden" name="user_id" value="52311">
    <input type="hidden" name="pdf_type" value="both">
    <button type="submit" name="assign_ct_submit">Assign Certificate</button>
</form>
