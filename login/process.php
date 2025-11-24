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
include '../model/process_db.php';
if ($_SESSION['statusFlag'] == 1 ) {
	$_SESSION['statusFlag'] = 2;
}
$_SESSION['studentID'] = 0;
$_SESSION['studentFname'] = "";
$_SESSION['studentLname'] = "";
$_SESSION['selectMajor'] = "";
$studentID = 0; // if no student is found with that email
require '../model/database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailInput = $_POST['usernameInput']."@my.gulfcoast.edu";
	$_SESSION['usernameInput'] = $_POST['usernameInput'];
	$emailInput = filter_var($emailInput , FILTER_SANITIZE_EMAIL);
	$_SESSION['emailInput'] = $emailInput;
} try {
    $studentData = get_student_by_email($emailInput);
    // Check if a record was found and return the student details
    if ($studentData) {
        $studentID = (int) $studentData['student_ID'];
		$_SESSION['studentID'] = $studentID;		
		$_SESSION['studentFname'] = $studentData['student_fname'];
		$_SESSION['studentLname'] = $studentData['student_lname'];
    }
    if ($studentID > 0) {
		try {
			$existLogRecord = get_log_by_student($studentID);
			if ($existLogRecord) {
				// incomplete record found, update it with signout datetime;	
				update_log($existLogRecord);
				// Student signed out successfully
				header('Location: logout.php');
				exit;
			} else {
				// No incomplete record found, insert new record at login.php
				header('Location: login.php');
				exit;
			}
		} catch (Exception $e) {
			die('<div style="color:red;
			font-size: 4.0vw;
			font-weight: 600;
			background-color: #eeeeee;
			padding: 2rem;
			margin: 2rem auto 0 auto;
			border: 0.1rem solid red;
			width: 80%;">'
			. $_SERVER['HTTP_HOST']
			. ' Database error, log table:: '
			. $e->getMessage() . '</div>');
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
} catch (Exception $e) {
	die('<div style="color:red;
	font-size: 4.0vw;
	font-weight: 600;
	background-color: #eeeeee;
	padding: 2rem;
	margin: 2rem auto 0 auto;
	border: 0.1rem solid red;
	width: 80%;">'
	. $_SERVER['HTTP_HOST']
	. ' Database error, students table: '
	. $e->getMessage() . '</div>');
}
?>