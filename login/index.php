<!DOCTYPE html>
<!--
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Jay King
	Updated:	10-3-2025
	Filename:	index.php
-->
<html lang="en">
<?php include '../views/head.php';?>
<body>
<?php include '../views/header.php';?>
<main>
<?php include '../views/commodore.php';?>
<h2>Login/Logout</h2>
<form id="indexForm" autocomplete="on" method="post" action="process.php">
	<h3>Email: Enter the first part before the @.</h3>
	<fieldset>
		<label title="Required entry">Username:</label>
		<input type="text"
		id="usernameInput"
		name="usernameInput"
		size="10"
		placeholder = "johnsmith"
		maxlength="20" 
		onkeyup="validateUsername(this);"
		required>@my.gulfcoast.edu
		<span id="usernameError" class="errorMsg"></span>
		</fieldset>
	<button type="submit" class ="btn1">Continue</button>
</form>
</main>
<?php include '../views/footer.php';?>
<script>
var errorNumber = 0;
function validateUsername(inputElement) {
	const usernameErrorDisplay  = document.getElementById("usernameError");
	const usernameElement = document.getElementById("usernameInput");
	errorNumber = 0;
	let errorDisplay = "";
	inputElement.value = removeJunk(inputElement.value);
	errorDisplay = errorMsg();
	usernameErrorDisplay.textContent=errorDisplay; // display message
}
function removeJunk(str) {
	const charList = "abcdefghijklmnopqrstuvwxyz1234567890-_.";
	let charn = "";
	let len = 0;
	str=str.toLowerCase();
	len = str.length;
	charn = str.substring(str.length-1, str.length);
	if (charn == " ") {
		errorNumber = 1;
		str= str.trim();
	} else if (charList.indexOf(charn) < 0) {
		str = str.substring(0,len-1);
		errorNumber = 2;
	} else {
		errorNumber = 0;
	}
	return str;
}
function errorMsg() {
	let errorDisplay ="";
	if (errorNumber == 1) {
		errorDisplay = "No spaces allowed";
	} else if (errorNumber == 2) {
		errorDisplay = "character not allowed";
	}
	return errorDisplay;
}
</script>
</body>
</html>