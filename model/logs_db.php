<?php
/*
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Chaz
	Created:	10-20-2025
	Updated:	11-25-2025 Jay King
	Filename:	logs_db.php

 Retrieves logs data ORDER BY log_updated
*/
require_once '../errors/errorLog.php';
function get_logs() {
    try {
        global $db;
        $query = 'SELECT * FROM log 
        ORDER BY log_updated DESC, log_ID ASC LIMIT 25';
        $statement = $db->prepare($query);
        $statement->execute();
        $logs = $statement->fetchAll();
		
		// Close statement, release the resources and memory associated
		$statement->closeCursor();
        return $logs;
    } catch (PDOException $e)  {
		errorLog('select logs',$e);
	}
}
?>