<?php
/*
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Jay King
	Created:	11-25-2025
	Filename:	log_ID_db.php

	Retrieves the log data based on the log ID.
*/
require_once '../errors/db_error.php';
function get_log_by_ID($log_ID) {
	try {
		global $db;

		// configures to throw a PDOException whenever a database error occurs.
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// Use a prepared statement to prevent SQL injection
		$query = "SELECT * FROM log WHERE log_ID = :log_ID";

		// Prepare the statement to prevent SQL injection
		$statement = $db->prepare($query);

		// Bind the parameter
		$statement ->bindParam(':log_ID', $log_ID, PDO::PARAM_INT);

		// execute the query
		$statement->execute();

		// Fetch the row as an associative array
		$logData = $statement->fetch(PDO::FETCH_ASSOC);

		// Close statement, release the resources and memory associated
		$statement->closeCursor();

		// Check if a log was found
		if ($logData) {
			return $logData;
		} else {
			return null; // No log found with that ID
		}
	} catch (PDOException $e) {
		db_error($e,'select log');
	}
}