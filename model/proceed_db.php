<?php
/*
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Jay King
	Created:	11-20-2025
	Filename:	proceed_db.php
	
	Add a new log record with studentID, courseID, sign-in datetime, updated datetime without signout
*/
require_once '../errors/db_error.php';
function add_log_entry($studentID, $selectCourseInput) {
	try {
		global $db;
		// Insert a new record with datetime example: studentID 1, email switwicky
		$query ="INSERT INTO log (log_student_ID, log_course_ID, log_signin, log_updated) VALUES (?, ?, NOW(), NOW())";
		
		// Prepare the statement to prevent SQL injection
		$statement = $db->prepare($query);
		
		// Bind each parameter by its indexed position
		$statement->bindParam(1, $studentID, PDO::PARAM_INT);
		$statement->bindParam(2, $selectCourseInput, PDO::PARAM_INT);
		
		// Execute the statement
		$statement->execute();
	// $statement->execute([$studentID, $selectCourseInput]);
	} catch (PDOException $e) {
		db_error($e,'insert log');
	}
}
?>