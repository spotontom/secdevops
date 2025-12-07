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
require_once '../errors/debugLog.php';
require '../model/database.php';
include '../model/proceed_db.php';
$student_ID = $_SESSION['student_ID'];
$course_ID = 0;
// debugLog("4 before proceed post");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// string into an integer using type casting
	$course_ID = (int) $_POST['course_ID'];
	$student_ID = (int) $_POST['student_ID'];	
	$_SESSION['course_ID'] = $course_ID;
	$_SESSION['student_ID'] = $student_ID;
	// debugLog("5 inside proceed post");
	add_log_entry($student_ID, $course_ID);
	// confirmed inserted
	$_SESSION['statusFlag'] = 0;
	header('Location: confirm.php');
	exit;
}
?>