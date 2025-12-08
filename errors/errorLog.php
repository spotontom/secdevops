<?php
/*
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Jay King
	Created:	11-20-2025
	Filename:	errorLog.php
*/
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
function errorLog($errorMsg, $e=null) {
	// The message to log, including a timestamp for better context
	if ($e==null) {
		$log_message = "[".date("Y-m-d H:i:s")."] ".$errorMsg.PHP_EOL;
		error_log($log_message, 3, "../errors/error.log");
	} else {
		$log_message = "[".date("Y-m-d H:i:s"). "] ".$e->getMessage().PHP_EOL;
		error_log($log_message, 3, "../errors/error.log");
		error_log($e->getTraceAsString().PHP_EOL,3, "../errors/error.log");
	}
	$_SESSION['errorLog'] = $errorMsg;
	header("Location: ../errors/error.php");
	exit();
}
?>