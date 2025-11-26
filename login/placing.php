<?php
session_start();
/*
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Jay King
	Created:	11-20-2025
	Filename:	placing.php
	
	places new student into stundents file
	form action from register.php
	goes to confirm.php
*/
// flag to inform confirm.php that new student added
$_SESSION['statusFlag'] = 4;
require '../model/database.php';
include '../model/placing_db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$student_fname = $_POST['student_fname'];
	$student_lname = $_POST['student_lname'];
	$student_email = $_POST['student_email'];
	$student_major = $_POST['student_major'];

	$_SESSION['student_fname'] = $student_fname;
	$_SESSION['student_lname'] = $student_lname;
	$_SESSION['student_email'] = $student_email;
	$_SESSION['student_major'] = $student_major;
	
	add_new_student($student_fname, $student_lname, $student_email, $student_major);
	header('Location: confirm.php');
	exit;
}
?>