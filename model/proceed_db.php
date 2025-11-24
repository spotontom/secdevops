<?php
/*
 Add a new record with studentID, courseID, sign-in datetime, updated datetime without signout
*/
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