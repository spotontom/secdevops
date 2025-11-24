<?php
session_start();
$studentEmail = "";
$studentFname = "";
$studentLname = "";
$selectMajor = "";
if (isset($_SESSION['studentEmail'])) {
	$studentEmail = $_SESSION['studentEmail'];
}
if (isset($_SESSION['studentFname'])) {
	$studentFname = $_SESSION['studentFname'];
}
if (isset($_SESSION['studentLname'])) {
	$studentLname = $_SESSION['studentLname'];
}
if (isset($_SESSION['selectMajor'])) {
	$selectMajor = $_SESSION['selectMajor'];
}
?>
<!DOCTYPE html>
<!--
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Jay King
	Created:	10-15-2025
	Updated:	11-20-2025
	Filename:	confirm.php
	
	Confirms in two actions
	1. update a log entry to signout - from login.php via proceed.php
	2. add a new student - from register.php via placing.php
-->
<html lang="en">
<?php include '../views/head.php';?>
<?php include '../views/delay.php';?>
<body>
<?php include '../views/header.php';?>
<main>
<h2>CONFIRMED</h2>
<p>
<?php echo $studentFname." ".$studentLname." ".$studentEmail; ?>
<br>
<?php
if ($_SESSION['statusFlag'] == 4) {
	echo $selectMajor .'<br>';
	echo 'New student added.';
} else {
	echo 'You are signed in.';
}	
?>
</p>
</main>
<?php include '../views/footer.php';?>
</body>
</html>

