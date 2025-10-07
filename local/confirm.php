<?php
	$firstNameInput = cleanInput($_POST['firstNameInput']);
	$lastNameInput = cleanInput($_POST['lastNameInput']);		
	$selectCourseInput = cleanInput($_POST['selectCourseInput']);	
	$emailInput = cleanInput($_POST['emailInput']);		
	function cleanInput($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>
<!DOCTYPE html>
<!--
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Jay King
	Due:		10-3-2025
	Filename:	confirm.php
-->
<html lang="en">
<?php include '../views/head.php';?>
<?php include '../views/delay.php';?>
<body>
<?php include '../views/header.php';?>
<main>
<?php include '../views/commodore.php';?>
<h2>Confirmed</h2>
<p>
<?php echo $firstNameInput ?>, information has been logged with email: <?php echo $emailInput ?>.
</p>
</main>
<?php include '../views/footer.php';?>
</body>
</html>

