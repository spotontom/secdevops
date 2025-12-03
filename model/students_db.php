<?php
/*
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Jay King
	Created:	11-25-2025
	Filename:	students_db.php
	
	Retrieves the student data based on the student last name
*/
require_once '../errors/db_error.php';
function get_students() {
	try {
		global $db; 
		// Prepare and execute the SQL query
		$query = "SELECT * FROM students ORDER BY student_lname";
		// to prevent SQL injection vulnerabilities
		$statement = $db->prepare($query);
		// execute the prepared statement
		$statement->execute();
		$students = $statement->fetchAll(PDO::FETCH_ASSOC);
		$statement->closeCursor();
		return $students;
	} catch (PDOException $e) {
		db_error($e,'select students');
	}
}
?>
