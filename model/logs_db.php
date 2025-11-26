<?php
require_once '../errors/db_error.php';
function get_logs() {
    try {
        global $db;
        $query = 'SELECT * FROM log 
        ORDER BY log_updated DESC LIMIT 10';
        $statement = $db->prepare($query);
        $statement->execute();
        $logs = $statement->fetchAll();
        $statement->closeCursor();
        return $logs;
    } catch (PDOException $e)  {
		db_error($e,'select log');
	}
}
?>