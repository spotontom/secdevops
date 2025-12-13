<?php
/*
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Jay King
	Created:	11-25-2025
	Filename:	perish_db.php
	
	Deletes the log record based on the log ID.
*/
require_once '../errors/errorLog.php';
function delete_log_by_ID($log_ID) {
	try {
		global $db;
		
		// configures to throw a PDOException whenever a database error occurs. 
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		// Use a prepared statement to prevent SQL injection
		$query = "DELETE FROM log WHERE log_ID = :log_ID";

		// Prepare the statement to prevent SQL injection
		$statement = $db->prepare($query);		

		// Bind the parameter
		$statement ->bindParam(':log_ID', $log_ID, PDO::PARAM_INT);

		// execute the query
		$statement->execute();

		// Close statement, release the resources and memory associated
		$statement->closeCursor();
	} catch (PDOException $e) {
		errorLog('delete log',$e);
	}
}
?>