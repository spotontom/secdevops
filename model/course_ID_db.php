<?php
/*
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Jay King
	Created:	11-25-2025
	Filename:	course_ID_db.php

 Retrieves the course data based on the course ID.
*/
require_once '../errors/db_error.php';
function get_course_by_ID($course_ID) {
	try {
		global $db;

		// configures to throw a PDOException whenever a database error occurs.
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// Use a prepared statement to prevent SQL injection
		$query = "SELECT * FROM courses WHERE course_ID = :course_ID";

		// Prepare the statement to prevent SQL injection
		$statement = $db->prepare($query);

		// Bind the parameter
		$statement ->bindParam(':course_ID', $course_ID, PDO::PARAM_INT);

		// execute the query
		$statement->execute();

		// Fetch the row as an associative array
		$courseData = $statement->fetch(PDO::FETCH_ASSOC);
		
		// Close statement, release the resources and memory associated
		$statement->closeCursor();
		
		// Check if a course was found
		if ($courseData) {
			return $courseData;
		} else {
			return null; // No course found with that ID
		}
	} catch (PDOException $e) {
		db_error($e,'select course');
	}
}
?>