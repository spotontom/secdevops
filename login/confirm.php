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
	1. add a log entry with signout as null - from login.php via proceed.php
	2. add a new student - from register.php via placing.php
-->
<?php
$student_email = "";
$student_fname = "";
$student_lname = "";
$student_major = "";
if (isset($_SESSION['student_email'])) {
	$student_email = $_SESSION['student_email'];
}
if (isset($_SESSION['student_fname'])) {
	$student_fname = $_SESSION['student_fname'];
}
if (isset($_SESSION['student_lname'])) {
	$student_lname = $_SESSION['student_lname'];
}
if (isset($_SESSION['student_major'])) {
	$student_major = $_SESSION['student_major'];
}
?>
<html lang="en">
<?php include '../views/head.php';?>
<?php include '../views/delay.php';?>
<body>
<?php include '../views/header.php';?>
<main>
<h2>Confirmed</h2>
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

