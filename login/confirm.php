<?php
session_start();
$emailInput = "";
$studentFname = "";
$studentLname = "";
if (isset($_SESSION['emailInput'])) {
	$emailInput = $_SESSION['emailInput'];
}
if (isset($_SESSION['studentFname'])) {
	$studentFname = $_SESSION['studentFname'];
}
if (isset($_SESSION['$studentLname'])) {
	$$studentLname = $_SESSION['$studentLname'];
}
$_SESSION = array();	// Unset all session variables
session_destroy();		// Destroy the session	
?>
<!DOCTYPE html>
<!--
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Jay King
	Created:	10-15-2025
	Updated:	11-20-2025
	Filename:	confirm.php
-->
<html lang="en">
<?php include '../views/head.php';?>
<?php include '../views/delay.php';?>
<body>
<?php include '../views/header.php';?>
<main>
<h2>Confirmed</h2>
<p>
<?php echo $studentFname." ".$studentLname." ".$emailInput; ?>
<br>
You are signed in.
</p>
</main>
<?php include '../views/footer.php';?>
</body>
</html>