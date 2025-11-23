<?php
session_start();
// flag to inform confirm.php that new student added
$_SESSION['statusFlag'] = 4;
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
require '../model/database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$studentFname = $_POST['firstNameInput'];
	$studentLname = $_POST['lastNameInput'];
	$studentEmail = $_POST['emailInput'];
	$selectMajor = $_POST['selectMajor'];

	$_SESSION['studentFname'] = $studentFname;
	$_SESSION['studentLname'] = $studentLname;
	$_SESSION['studentEmail'] = $studentEmail;
	$_SESSION['selectMajor'] = $selectMajor;
	
	try {
		add_new_student($studentFname, $studentLname, $studentEmail, $selectMajor);
		header('Location: confirm.php');
		exit;
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
}
/*
 Add a new record with studentID, courseID, sign-in datetime, updated datetime without signout
*/
function add_new_student($studentFname, $studentLname, $studentEmail, $selectMajor) {
	global $db;
	// Insert a new student record 
	$sql ="INSERT INTO students (student_fname, student_lname, student_email, student_major, student_updated) VALUES (?, ?, ?, ?, NOW())";
	
	// Prepare the statement to prevent SQL injection
    $statement = $db->prepare($sql);

	// Bind each parameter by its indexed position
	$statement->bindParam(1, $studentFname, PDO::PARAM_STR);
	$statement->bindParam(2, $studentLname, PDO::PARAM_STR);
	$statement->bindParam(3, $studentEmail, PDO::PARAM_STR);
	$statement->bindParam(4, $selectMajor, PDO::PARAM_STR);
	
	// Execute the statement
	$statement->execute();
}
?>