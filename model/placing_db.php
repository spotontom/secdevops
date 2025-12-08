<?php
/*
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Jay King
	Created:	11-20-2025
	Filename:	placing_db.php
	
	Add a new student record with first name, last name, email, and college major
*/
require_once '../errors/errorLog.php';
function add_new_student($student_fname, $student_lname, $student_email, $student_major) {
	try {
		global $db;
		// Insert a new student record 
		$query ="INSERT INTO students (student_fname, student_lname, student_email, student_major, student_updated) VALUES (?, ?, ?, ?, NOW())";
		
		// Prepare the statement to prevent SQL injection
		$statement = $db->prepare($query);
	
		// Bind each parameter by its indexed position
		$statement->bindParam(1, $student_fname, PDO::PARAM_STR);
		$statement->bindParam(2, $student_lname, PDO::PARAM_STR);
		$statement->bindParam(3, $student_email, PDO::PARAM_STR);
		$statement->bindParam(4, $student_major, PDO::PARAM_STR);
		
		// Execute the statement
		$statement->execute();
		
		// last inserted autocremented ID
		$_SESSION['student_ID']= $db->lastInsertId();
		
		// Close statement, release the resources and memory associated
		$statement->closeCursor();		
		
	} catch (PDOException $e) {
		errorLog('insert students',$e);
	}
}
?>