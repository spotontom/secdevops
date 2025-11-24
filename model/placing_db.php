<?php
/*
 Add a new atudent record with first name, last name, email, and college major
*/
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
?>