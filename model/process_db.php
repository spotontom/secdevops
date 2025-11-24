<?php
/*
 incomplete record found, update it with signout datetime
*/
function update_log($existLogRecord) {
	global $db;
	// example is studentID 30 Sheila McCoy smccoy2
	$query= "UPDATE log SET log_signout = NOW() WHERE log_ID = ?";
	$statement = $db->prepare($query);
	$statement->execute([$existLogRecord['log_ID']]);
}
/*
 Retrieves the student data based on the student email.
*/
function get_student_by_email($studentEmail) {
	global $db;
    // SQL query using a placeholder (?)
    $query = "SELECT student_ID, student_fname, student_lname FROM students WHERE student_email = ?";
    // Prepare the statement to prevent SQL injection
    $statement = $db->prepare($query);
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
/*
 Retrieves the log_ID based on the student_ID.
*/
function get_log_by_student($studentID) {
	global $db;
    // SQL query using a placeholder (?)
    $query = "SELECT log_ID FROM log WHERE log_student_ID = ? AND log_signout IS NULL";
    // Prepare the statement to prevent SQL injection
    $statement = $db->prepare($query);
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