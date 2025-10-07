<!DOCTYPE html>
<!--
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Jay King
	Due:		10-3-2025
	Filename:	index.php
	https://gvsda.net/ace/local/
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
		onkeyup="format(this);"
		required>@my.gulfcoast.edu
		</fieldset>
	<button type="submit" class ="btn1">Continue</button>
</form>
</main>
<?php include '../views/footer.php';?>
<script>
function format(inputElement) {
  inputElement.value = removeJunk(inputElement.value);
}
function removeJunk(str) {
	const charList = "abcdefghijklmnopqrstuvwxyz1234567890-_.";
	let strReturn;
	str=str.toLowerCase();
	for (let i = 0; i < str.length;) {
		if (charList.indexOf(str.charAt(i)) < 0) {
			str = str.substring(0,i) + str.substring(i+1, str.length);
		} else {
			i++;
		}
	}
	return str;
}
</script>
</body>
</html>