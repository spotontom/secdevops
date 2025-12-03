<?php
/*
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Chaz
	Created:	10-20-2025
	Filename:	database.php
*/
$dsn = 'mysql:host=localhost;dbname=base_db';
$username = 'log_user';
$password = 'pa55word';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
	//Create an error log function in the future to capture the error
    header("Location: ../errors/error.php");
	exit();
}
?>
