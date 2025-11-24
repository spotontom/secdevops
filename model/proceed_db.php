<?php
/*
 Add a new record with studentID, courseID, sign-in datetime, updated datetime without signout
*/
function add_log_entry($studentID, $selectCourseInput) {
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
}
?>