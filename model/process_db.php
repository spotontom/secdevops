<?php
/*
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Jay King
	Created:	11-20-2025
	Filename:	process_db.php
	
	Incomplete record found, update it with signout datetime
*/
require_once '../errors/db_error.php';
function update_log($existLogRecord) {
	try {
		global $db;
		// example is student_ID 30 Sheila McCoy smccoy2
		$query= "UPDATE log SET log_signout = NOW() WHERE log_ID = ?";
		$statement = $db->prepare($query);
		$statement->execute([$existLogRecord['log_ID']]);
	} catch (PDOException $e) {
		db_error($e,'update log');
	}
}
/*
 Retrieves the student data based on the student email.
*/
function get_student_by_email($student_email) {
	try {
		global $db;
		// SQL query using a placeholder (?)
		$query = "SELECT student_ID, student_fname, student_lname FROM students WHERE student_email = ?";
		// Prepare the statement to prevent SQL injection
		$statement = $db->prepare($query);
		// Bind the parameter and execute the query
		$statement->execute([$student_email]);
		// Fetch the row as an associative array
		$studentData = $statement->fetch(PDO::FETCH_ASSOC);
		// Check if a student was found
		if ($studentData) {
			return $studentData;
		} else {
			return null; // No student found with that email
		}
	} catch (PDOException $e) {
		db_error($e,'select students');
	}		
}
/*
 Retrieves the log_ID based on the student_ID.
*/
function get_log_by_student($student_ID) {
	try {
		global $db;
		// SQL query using a placeholder (?)
		$query = "SELECT log_ID FROM log WHERE log_student_ID = ? AND log_signout IS NULL";
		// Prepare the statement to prevent SQL injection
		$statement = $db->prepare($query);
		// Bind the parameter and execute the query
		$statement->execute([$student_ID]);
		// Fetch the row as an associative array
		$existLogRecord = $statement->fetch(PDO::FETCH_ASSOC);
		if ($existLogRecord) {
			return $existLogRecord;
		} else {
			return null; // No student found with that email
		}
	} catch (PDOException $e) {
		db_error($e,'select log');
	}
}
?>