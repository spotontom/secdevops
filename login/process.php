<?php
session_start();
/*
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Jay King
	Created:	11-20-2025
	Filename:	process.php
	
	a form action from index.php
*/

if ($_SESSION['statusFlag'] == 1 ) {
	$_SESSION['statusFlag'] = 2;
}
$_SESSION['student_ID'] = 0;
$_SESSION['student_fname'] = "";
$_SESSION['student_lname'] = "";
$_SESSION['student_major'] = "";
$student_ID = 0; // if no student is found with that email
require '../model/database.php';
include '../model/process_db.php';
require_once '../errors/debugLog.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_email = $_POST['usernameInput']."@my.gulfcoast.edu";
	$_SESSION['usernameInput'] = $_POST['usernameInput'];
	$student_email = filter_var($student_email , FILTER_SANITIZE_EMAIL);
	$_SESSION['student_email'] = $student_email;

    $studentData = get_student_by_email($student_email);
    // Check if a record was found and return the student details
    if ($studentData) {
        $student_ID = (int) $studentData['student_ID'];
		$_SESSION['student_ID'] = $student_ID;		
		$_SESSION['student_fname'] = $studentData['student_fname'];
		$_SESSION['student_lname'] = $studentData['student_lname'];
    }
	
    if ($student_ID > 0) {
		$existLogRecord = get_log_by_student($student_ID);
		if ($existLogRecord) {
			// incomplete record found, update it with signout datetime;	
			update_log($existLogRecord);
			// Student signed out successfully
			header('Location: logout.php');
			exit;
		} else {
			// debugLog("1-process.php");	
			// No incomplete record found, insert new record at login.php
			header('Location: login.php');
			exit;
		}
    } else {
		// To register new student for tutoring
		if ($_SESSION['statusFlag'] == 2 ) {
			$_SESSION['statusFlag'] = 0;
			// To register new student for tutoring
			header('Location: register.php');
			exit;
		}
		// No student found with that email
		$_SESSION['statusFlag'] = 1;
		header('Location: index.php');
		exit;
    }
}
?>

