<?php
session_start();
require '../model/database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailInput = $_POST['usernameInput']."@my.gulfcoast.edu";
	$_SESSION['usernameInput'] = $_POST['usernameInput'];
	$emailInput = filter_var($emailInput , FILTER_SANITIZE_EMAIL);
	$_SESSION['emailInput'] = $emailInput;
} try {
    $studentData = get_student_by_email($emailInput);
    // Check if a row was found and return the studentID
    if ($studentData) {
        $studentID = (int) $studentData['student_ID'];
    } else {
		$studentID = 0; // if no student is found with that email
    }
    if ($studentID > 0) {
		try {
			$existLogRecord = get_log_by_student($studentID);
			if ($existLogRecord) {
				// incomplete record found, update it with signout datetime
// temporary debuging, to be removed
die ('<div style="color:red;
font-size: 4.0vw;
font-weight: 600;
background-color: #eeeeee;
padding: 2rem;
margin: 2rem auto 0 auto;
border: 0.1rem solid red;
width: 80%;">'
. 'Found incomplete log record, to signout (update record) studentID '
. $studentID
. ' '
. $emailInput
. '</div>');	
				// example is studentID 30 smccoy2
				$sql = "UPDATE log SET log_signout = NOW() WHERE log_ID = ?";
				$updateStmt = $db->prepare($sql);
				$updateStmt->execute([$existLogRecord['log_ID']]);
				// Student signed out successfully
				header('Location: logout.php');
				exit;
			} else {
				// No incomplete record found, insert new record at login.php
				header('Location: login.php');
				exit;
			}
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
    } else {
        // No student found with that email
		$_SESSION['statusFlag'] = 1;
		header('Location: index.php');
		exit;
    }
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
	. ' Database error, students table: '
	. $e->getMessage() . '</div>');
}
/**
 * Retrieves the student data based on the studentEmail.
 */
function get_student_by_email($studentEmail) {
	global $db;
    // SQL query using a placeholder (?)
    $sql = "SELECT student_ID FROM students WHERE student_email = ?";
    // Prepare the statement to prevent SQL injection
    $statement = $db->prepare($sql);
    // Bind the parameter and execute the query
    $statement->execute([$studentEmail]);
	// Fetch the row as an associative array
    $studentData = $statement->fetch(PDO::FETCH_ASSOC);
    // Check if a student was found
    if ($studentData) {
        return $studentData;
    } else {
        return null; // No student found with that email
	}
}
/**
 * Retrieves the log_ID based on the studentID.
 */
function get_log_by_student($studentID) {
	global $db;
    // SQL query using a placeholder (?)
    $sql = "SELECT log_ID FROM log WHERE log_student_ID = ? AND log_signout IS NULL";
    // Prepare the statement to prevent SQL injection
    $statement = $db->prepare($sql);
    // Bind the parameter and execute the query
    $statement->execute([$studentID]);
	// Fetch the row as an associative array
    $existLogRecord = $statement->fetch(PDO::FETCH_ASSOC);
    if ($existLogRecord) {
        return $existLogRecord;
    } else {
        return null; // No student found with that email
	}
}
?>