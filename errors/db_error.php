<?php
/*
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Jay King
	Created:	11-20-2025
	Filename:	db_error.php
	
	Temporary file, to be used to display database errors during debugging.
	Will be replaced by error.php or database_error.php with its logging and error display
*/
function db_error($e,$message) {
	$_SESSION['errorLog'] = $message;

    // The message to log, including a timestamp for better context
    $log_message = "[" . date("Y-m-d H:i:s") . "] " . $e->getMessage() . PHP_EOL;

    // second argument '3' tells PHP to send the message to a file destination
    // third argument specifies error.log file
    error_log($log_message, 3, "../errors/error.log");
    // log the full trace for debugging
    error_log($e->getTraceAsString() . PHP_EOL, 3, "../errors/error.log");
	header("Location: ../errors/error.php");
	exit();
}
?>