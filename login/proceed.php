<?php
session_start();
/*
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Jay King
	Created:	11-20-2025
	Filename:	proceed.php
	
	a form action from login.php
*/
require '../model/database.php';
include '../model/proceed_db.php';
$selectCourseInput = 0;
$studentID = 0;
// flag to inform confirm.php that this is new signin, an add log entry
$_SESSION['statusFlag'] = 3;
if (isset($_SESSION['studentID'])) {
    // If it exist in the session
	$studentID = $_SESSION['studentID'];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// string into an integer using type casting
	$selectCourseInput = (int) $_POST['selectCourseInput'];
	$_SESSION['logCourseID'] = $selectCourseInput;
	add_log_entry($studentID, $selectCourseInput);
	// confirmed inserted
	header('Location: confirm.php');
	exit;
}
?>