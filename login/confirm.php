<?php session_start();?>
<!DOCTYPE html>
<!--
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Jay King
	Created:	10-15-2025
	Updated:	11-20-2025
	Filename:	confirm.php
	
	Confirms in two actions
	1. add a log entry with signout as null: login.php -> proceed.php -> confirm.php
	2. add a new student: register.php -> placing.php -> confirm.php -> login.php
-->
<?php
require_once '../errors/debugLog.php';

$student_email = $_SESSION['student_email'];
$student_fname = $_SESSION['student_fname'];
$student_lname = $_SESSION['student_lname'];
$student_major = $_SESSION['student_major'];

// debugLog("3 confirm.php");
?>
<html lang="en">
<?php include '../views/head.php';?>
<?php 
if ($_SESSION['statusFlag'] == 4) {
	// debugLog("4 flag 4 confirm.php");
	include '../views/delayLogin.php';
	
} else {
	include '../views/delay.php';
}
?>
<body>
<?php include '../views/header.php';?>
<main>
<h2>CONFIRMED</h2>
<div class="frame">
	<?php echo $student_fname." ".$student_lname; ?>
	<br>
	<?php echo $student_email; ?>
	<br>
	<?php
		if ($_SESSION['statusFlag'] == 4) {
			echo $student_major .'<br>';
			echo 'New student added.';
		} else {
			echo 'You are signed in.';
		}	
	?>
</div>
</main>
<?php include '../views/footer.php';?>
</body>
</html>