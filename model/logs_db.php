<?php
/*
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Jay King
	Created:	11-25-2025
	Filename:	logs_db.php

 Retrieves logs data based ORDER BY log_updated
*/
require_once '../errors/db_error.php';
function get_logs() {
    try {
        global $db;
        $query = 'SELECT * FROM log 
        ORDER BY log_updated DESC LIMIT 20';
        $statement = $db->prepare($query);
        $statement->execute();
        $logs = $statement->fetchAll();
		
		// Close statement, release the resources and memory associated
		$statement->closeCursor();
		
        return $logs;
    } catch (PDOException $e)  {
		db_error($e,'select logs');
	}
}
?>