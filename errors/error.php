<?php session_start(); ?>
<!DOCTYPE html>
<!--
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Chaz
	Created:	11-19-2025
	Updated:	12-07-2025 Jay King
	Filename:	error.php
--> 
<html lang="en">
<?php include '../views/head.php';?>
<body>
<?php include '../views/header.php';?>
<main>
    <h2>Error<h2>
	<?php if (isset($_SESSION['errorLog'])) {echo "<h5>".$_SESSION['errorLog']."<h5>";}?>
	<div class="frame">
		There was an error connecting to the database.
		<br>
		Please refresh and try again.
		<br><br>
		The error.log has captured this error.
	</div>

</main>
<?php include '../views/footer.php';?>
</html>
