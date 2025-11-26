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
	die('<div style="color:red;
	font-size: 4.0vw;
	font-weight: 600;
	background-color: #eeeeee;
	padding: 2rem;
	margin: 2rem auto 0 auto;
	border: 0.1rem solid red;
	width: 80%;">'
	. $_SERVER['HTTP_HOST']
	. ' Database error '
	. $message
	. ' '
	. $e->getMessage() . '</div>');
}
?>