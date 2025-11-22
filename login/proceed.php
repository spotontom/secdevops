<?php
session_start();
$selectCourseInput = 0;
$studentID = 0;
if (isset($_SESSION['student_ID'])) {
    // If it exist in the session
	$studentID = $_SESSION['student_ID'];
}
require '../model/database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// string into an integer using type casting
	$selectCourseInput = (int) $_POST['selectCourseInput'];
	$_SESSION['log_course_ID'] = $selectCourseInput;
	try {
		set_log($studentID, $selectCourseInput);
		// confirmed inserted
		header('Location: confirm.php');
		exit;
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
/**
 * Retrieves the log_ID based on the student_ID.
 */
function set_log($studentID, $selectCourseInput) {
	global $db;
	// Insert a new record with datetime example: studentID 1, email switwicky
	$sql ="INSERT INTO log (log_student_ID, log_course_ID, log_signin, log_updated) VALUES (?, ?, NOW(), NOW())";
    // Prepare the statement to prevent SQL injection
    $statement = $db->prepare($sql);

	// Bind each parameter by its indexed position
	$statement->bindParam(1, $studentID, PDO::PARAM_INT);
	$statement->bindParam(2, $selectCourseInput, PDO::PARAM_INT);

	// Execute the statement
	$statement->execute();
	// $statement->execute([$studentID, $selectCourseInput]);
}
?>
