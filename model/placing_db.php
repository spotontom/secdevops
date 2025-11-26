<?php
/*
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Jay King
	Created:	11-20-2025
	Filename:	placing_db.php
	
	Add a new student record with first name, last name, email, and college major
*/
require_once '../errors/db_error.php';
function add_new_student($studentFname, $studentLname, $studentEmail, $selectMajor) {
	try {
		global $db;
		// Insert a new student record 
		$query ="INSERT INTO students (student_fname, student_lname, student_email, student_major, student_updated) VALUES (?, ?, ?, ?, NOW())";
		
		// Prepare the statement to prevent SQL injection
		$statement = $db->prepare($query);
	
		// Bind each parameter by its indexed position
		$statement->bindParam(1, $studentFname, PDO::PARAM_STR);
		$statement->bindParam(2, $studentLname, PDO::PARAM_STR);
		$statement->bindParam(3, $studentEmail, PDO::PARAM_STR);
		$statement->bindParam(4, $selectMajor, PDO::PARAM_STR);
		
		// Execute the statement
		$statement->execute();
	} catch (PDOException $e) {
		db_error($e,'insert students');
	}
}
?>