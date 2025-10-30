<?php
session_start();
?>
<!DOCTYPE html>
<!--
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Jay King
	Updated:	10-15-2025
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
<?php echo isset($_SESSION['firstNameInput']) ? $_SESSION['firstNameInput'] : ''; ?>
, your information has been logged with email:
<?php echo isset($_SESSION['emailInput']) ? $_SESSION['emailInput'] : ''; ?>
</p>
</main>
<?php include '../views/footer.php';?>
</body>
</html>

