<?php session_start(); ?>
<!DOCTYPE html>
<!--
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Jay King
	Created:	12-07-2025
	Filename:	perish.php
	
	deletes log record and returns to log list
-->
<?php
include '../model/database.php';
require_once '../errors/errorLog.php';
include '../model/perish_db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		// string into an integer using type casting
	$log_ID = (int) $_POST['log_ID'];
    if ($log_ID<1) {
		// error log exit
		errorLog('perish.php, Invalid log_ID');
    }
	delete_log_by_ID($log_ID);
}
// Redirect back to the list page
header('Location: ../Admin/logList.php');
exit();
?>