<?php
/*
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Jay King
	Created:	11-20-2025
	Filename:	protege.php
	
	updates student record and returns to student list
*/
include '../model/database.php';
include '../model/protege_db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_ID = filter_input(INPUT_POST, 'student_ID', FILTER_VALIDATE_INT);
    $student_fname = filter_input(INPUT_POST, 'student_fname', FILTER_SANITIZE_STRING);
    $student_lname = filter_input(INPUT_POST, 'student_lname', FILTER_SANITIZE_STRING);
    $student_email = filter_input(INPUT_POST, 'student_email', FILTER_SANITIZE_EMAIL);
    $student_major = filter_input(INPUT_POST, 'student_major', FILTER_SANITIZE_STRING);
    if (!$student_ID || !$student_fname || !$student_lname || !$student_email || !$student_major) {
		if (!$student_ID) {
			$_SESSION['errorLog'] = "protege.php, Invalid input data.";
			// error log captures error
			header("Location: ../errors/error.php");
			exit();
		}
    }
	updateStudent($student_fname,$student_lname,$student_email,$student_major,$student_ID);
	// Redirect back to the list page after update
    header('Location: ../Admin/studentsList.php?status=updated');
    exit();
} else {
    // If accessed directly without POST, redirect to list page
    header('Location: ../Admin/studentsList.php');
    exit();
}
?>
