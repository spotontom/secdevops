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
	Updated:	11-20-2025
	Filename:	placing.php
	inserts new student, a form action from register.php
-->
<html lang="en">
<?php include '../views/head.php';?>
<?php include '../views/delay.php';?>
<body>
<?php include '../views/header.php';?>
<main>

<?php
die ('<div style="color:red;
font-size: 4.0vw;
font-weight: 600;
background-color: #eeeeee;
padding: 2rem;
margin: 2rem auto 0 auto;
border: 0.1rem solid red;
width: 80%;">'
. 'Under construction to add new student '
. '</div>');
?>
</body>
</main>
</html>