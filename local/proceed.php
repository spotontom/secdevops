<?php
$firstNameInput = "";
$lastNameInput = "";		
$selectCourseInput = "";	
$emailInput = "";		
function cleanInput($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {	
	if (isset($_POST['emailInput'])) $emailInput = $_POST['emailInput'];
	if (isset($_POST['firstNameInput'])) $firstNameInput = $_POST['firstNameInput'];	
	if (isset($_POST['lastNameInput'])) $lastNameInput = $_POST['lastNameInput'];
	if (isset($_POST['selectCourseInput'])) $selectCourseInput = $_POST['selectCourseInput'];
	$emailInput = cleanInput($emailInput);
	$firstNameInput = cleanInput($firstNameInput);
	$lastNameInput = cleanInput($lastNameInput);		
	$selectCourseInput = cleanInput($selectCourseInput);	
}
session_start();
$_SESSION['emailInput'] = $emailInput;
$_SESSION['firstNameInput'] = $firstNameInput;
$_SESSION['lastNameInput'] = $lastNameInput;		
$_SESSION['selectCourseInput'] = $selectCourseInput;	

header('Location: confirm.php');
exit;
?>
