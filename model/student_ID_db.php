<?php
/*
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Jay King
	Created:	11-25-2025
	Filename:	student_ID_db.php
	
	Retrieves the student data based on the student ID.
*/
require_once '../errors/errorLog.php';
function get_student_by_ID($student_ID) {
	try {
		global $db;
		
		// configures to throw a PDOException whenever a database error occurs. 
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		// Use a prepared statement to prevent SQL injection
		$query = "SELECT * FROM students WHERE student_ID = :student_ID";

		// Prepare the statement to prevent SQL injection
		$statement = $db->prepare($query);		

		// Bind the parameter
		$statement ->bindParam(':student_ID', $student_ID, PDO::PARAM_INT);

		// execute the query
		$statement->execute();
		
		// Fetch the row as an associative array
		$studentData = $statement->fetch(PDO::FETCH_ASSOC);

		// Close statement, release the resources and memory associated
		$statement->closeCursor();

		// Check if a student was found
		if ($studentData) {
			return $studentData;
		} else {
			return null; // No student found with that ID
		}
	} catch (PDOException $e) {
		errorLog('select student',$e);
	}
}
?>
