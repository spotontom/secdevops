<?php
/*
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Jay King
	Created:	11-25-2025
	Filename:	protege_db.php

*/
require_once '../errors/errorLog.php';
function updateStudent($student_fname,$student_lname,$student_email,$student_major,$student_ID) {
	try {
		global $db;
		// configures to throw a PDOException whenever a database error occurs.
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		// using named placeholders
		$query = "UPDATE students SET
		student_fname = :student_fname,
		student_lname = :student_lname,
		student_email = :student_email,
		student_major = :student_major,
		student_updated = NOW()
		WHERE student_ID = :student_ID";
		
		// Prepare the statement to prevent SQL injection
		$statement = $db->prepare($query);   
  
        // Bind the parameters
        $statement->bindParam(':student_fname', $student_fname, PDO::PARAM_STR);
        $statement->bindParam(':student_lname', $student_lname, PDO::PARAM_STR);
		$statement->bindParam(':student_email', $student_email, PDO::PARAM_STR);
        $statement->bindParam(':student_major', $student_major, PDO::PARAM_STR);		
        $statement->bindParam(':student_ID', $student_ID, PDO::PARAM_INT);

        // Execute the statement
        $statement->execute();
		
		// Close statement, release the resources and memory associated
		$statement->closeCursor();
		
    } catch (PDOException $e) {
			// error log exit
			errorLog('protege_db.php, update failed',$e);
    }
}
?>