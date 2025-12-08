<?php
/*
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Chaz
	Created:	10-20-2025
	Updated:	12-05-2025 Jay King
	Filename:	database.php
*/
$dsn = 'mysql:host=localhost;dbname=base_db';
$username = 'log_user';
$password = 'pa55word';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
	errorLog('database login', $e);
}
?>
