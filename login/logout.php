<?php
session_start();
$_SESSION = array();	// Unset all session variables
session_destroy();		// Destroy the session	
?>
<!DOCTYPE html>
<!--
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Jay King
	Created:	10-15-2025
	Updated:	11-20-2025 Jay King
	Filename:	logout.php
-->
<html lang="en">
<?php include '../views/head.php';?>
<?php include '../views/delay.php';?>
<body>
<?php include '../views/header.php';?>
<main>
<h2>Logging Out</h2>
<div class="frame">
	Thank you for using the tutoring lab.<br>Have a nice day.
</div>
</main>
<?php include '../views/footer.php';?>
</body>
</html>
