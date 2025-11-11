<?php
session_start();
?>
<!DOCTYPE html>
<!--
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Jay King
	Updated:	10-15-2025
	Filename:	login.php
-->
<html lang="en">
<?php include '../views/head.php';?>
<?php include '../model/database.php';?>
<?php include '../model/courses_db.php';?>
<body>
<?php include '../views/header.php';?>
<main>
<form id="loginForm" autocomplete="on" method="post" action="proceed.php">
	<h2>Welcome</h2>
	<fieldset>
		<label title="Display only">Email:</label>
			<input type="email"
			id="emailInput"
			name="emailInput"
			size="25"
			value="<?php echo isset($_SESSION['emailInput']) ? $_SESSION['emailInput'] : ''; ?>"
			readonly>
		<br>
		<label title="First name is a required entry">First name:</label>
			<input type="text" size="25" onkeyup="validateFirstname(this)"
			title="First name is a required entry"
			placeholder = "John-example" id="firstNameInput" name="firstNameInput" required>
		<p><span id="firstNameError" class="error-msg"></span></P>
		<label title="Last name is a required entry">Last name:</label>
			<input type="text" size="25" onkeyup="validateLastname(this)"
			title="Last name is a required entry"
			placeholder = "Smith-example" id="lastNameInput" name="lastNameInput" required>
		<p><span id="lastNameError" class="error-msg"></span><p>
		<label title="Requires a selection">Course:</label>
		<?php
		$courses = get_courses();?>
		<select id="selectCourseInput" name="selectCourseInput" required>
			<option value="">Select course with professor</option>
			<?php foreach ($courses as $course): ?>
				<option value="<?php echo htmlspecialchars($course['course_ID']); ?>">
					<?php 
						echo htmlspecialchars($course['course_number'] . ' ' . 
											$course['course_name'] . ' - ' . 
											$course['course_professor']);
					?>
				</option>
			<?php endforeach; ?>
		</select>
	</fieldset>
	<br>
	<button type="submit" class ="btn1">Confirm</button>
</form>
</main>
<?php include '../views/footer.php';?>
<script>
"use strict";
const charList = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
// Get the input element and the display element
const firstElement = document.getElementById('firstNameInput');
const lastElement = document.getElementById('lastNameInput');
const firstNameErrorDisplay  = document.getElementById("firstNameError");
const lastNameErrorDisplay  = document.getElementById("lastNameError");
// Add an 'input' event listener
firstElement.addEventListener('input', function(e) {
    const cursorPosition = this.selectionStart;
    // Get the character that was just added/is at the position before the caret
    // We get the character right before the current cursor position
    const lastChar = this.value[cursorPosition - 1];
	let errorDisplay = "";
	if (lastChar ==" ") {
	    this.value = this.value.trim();
		errorDisplay = 'No spaces allowed';
    // Check if the last typed character and remove it if not allowed
    } else if (charList.indexOf(lastChar) < 0) {
        // Update the input value to exclude the not allowed character
        this.value = this.value.slice(0, cursorPosition - 1) + this.value.slice(cursorPosition);
        // Reposition the cursor correctly after removal
        this.selectionStart = this.selectionEnd = cursorPosition - 1;
		errorDisplay = 'Removed '+lastChar+'. It is not allowed.';
    }
	firstNameErrorDisplay.textContent=errorDisplay; // display message
});
// Add an 'input' event listener
lastElement.addEventListener('input', function(e) {
    const cursorPosition = this.selectionStart;
    // Get the character that was just added/is at the position before the caret
    // We get the character right before the current cursor position
    const lastChar = this.value[cursorPosition - 1];
	let errorDisplay = "";
	if (lastChar ==" ") {
	    this.value = this.value.trim();
		errorDisplay = 'No spaces allowed';
    // Check if the last typed character and remove it if not allowed
    } else if (charList.indexOf(lastChar) < 0) {
        // Update the input value to exclude the not allowed character
        this.value = this.value.slice(0, cursorPosition - 1) + this.value.slice(cursorPosition);
        // Reposition the cursor correctly after removal
        this.selectionStart = this.selectionEnd = cursorPosition - 1;
		errorDisplay = 'Removed '+lastChar+'. It is not allowed.';
    }
	lastNameErrorDisplay.textContent=errorDisplay; // display message
});
</script>
</html>