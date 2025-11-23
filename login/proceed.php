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
$selectCourseInput = 0;
$studentID = 0;
// flag to inform confirm.php that this is new signin, an add log entry
$_SESSION['statusFlag'] = 3;
if (isset($_SESSION['studentID'])) {
    // If it exist in the session
	$studentID = $_SESSION['studentID'];
}
require '../model/database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// string into an integer using type casting
	$selectCourseInput = (int) $_POST['selectCourseInput'];
	$_SESSION['logCourseID'] = $selectCourseInput;
	try {
		add_log_entry($studentID, $selectCourseInput);
		// confirmed inserted
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
function add_log_entry($studentID, $selectCourseInput) {
	global $db;
	// Insert a new record with datetime example: studentID 1, email switwicky
	$sql ="INSERT INTO log (log_student_ID, log_course_ID, log_signin, log_updated) VALUES (?, ?, NOW(), NOW())";
    // Prepare the statement to prevent SQL injection
    $statement = $db->prepare($sql);

	// Bind each parameter by its indexed position
	$statement->bindParam(1, $studentID, PDO::PARAM_INT);
	$statement->bindParam(2, $selectCourseInput, PDO::PARAM_INT);

	// Execute the statement
	$statement->execute();
	// $statement->execute([$studentID, $selectCourseInput]);
}
?>