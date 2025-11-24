<?php
session_start();
/*
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Jay King
	Created:	11-20-2025
	Filename:	placing.php
	
	places new student into stundents file
	form action from register.php
	goes to confirm.php
*/
// flag to inform confirm.php that new student added
$_SESSION['statusFlag'] = 4;
require '../model/database.php';
include '../model/placing_db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$studentFname = $_POST['firstNameInput'];
	$studentLname = $_POST['lastNameInput'];
	$studentEmail = $_POST['emailInput'];
	$selectMajor = $_POST['selectMajor'];

	$_SESSION['studentFname'] = $studentFname;
	$_SESSION['studentLname'] = $studentLname;
	$_SESSION['studentEmail'] = $studentEmail;
	$_SESSION['selectMajor'] = $selectMajor;
	
	try {
		add_new_student($studentFname, $studentLname, $studentEmail, $selectMajor);
		header('Location: confirm.php');
		exit;
	} catch (Exception $e) {
		die('<div style="color:red;
		font-size: 4.0vw;
		font-weight: 600;
		background-color: #eeeeee;
		padding: 2rem;
		margin: 2rem auto 0 auto;
		border: 0.1rem solid red;
		width: 80%;">'
		. $_SERVER['HTTP_HOST']
		. ' Database error, log table:: '
		. $e->getMessage() . '</div>');
	}
}
?>