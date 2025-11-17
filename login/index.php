<?php
session_start(); 
if (!isset($_SESSION['statusFlag'])) {
    // If 'statusFlag' does not exist in the session
    $_SESSION['statusFlag'] = 0;
}
?>
<!DOCTYPE html>
<!--
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Jay King
	Updated:	11-7-2025
	Filename:	index.php
--> 
<!--  Thomas cleared username label, added div for css -->
<html lang="en">
<?php include '../views/head.php';?>
<body>
<?php include '../views/header.php';?>
<main>
<form id="indexForm" autocomplete="on" method="post" action="process.php">
	<h2>Login/Logout</h2>
	<h3>Student Email:</h3>
	<fieldset>
	<div class="username-row">
		<input type="text"
		id="usernameInput"
		name="usernameInput"
		size="10"
		placeholder = "jsmith"
		maxlength="20" 
		required>
		<span>@my.gulfcoast.edu</span>
	</div>
	<p><span id="usernameError" class="error-msg">
	<?php
	if ($_SESSION['statusFlag'] == 1) {
		echo 'Not registered! Contact Admins.';
	}
	?>
	</span></p>
	</fieldset>
	<button type="submit" class ="btn1">Continue</button>
</form>
</main>
<?php include '../views/footer.php';?>
<script>
// Get the input element and the display element
const inputElement = document.getElementById('usernameInput');
const charList = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890-_.";
const usernameErrorDisplay  = document.getElementById("usernameError");
// Add an 'input' event listener
inputElement.addEventListener('input', function(e) {
    const cursorPosition = this.selectionStart;
    // Get the character that was just added/is at the position before the caret
    // We get the character right before the current cursor position
    const lastChar = this.value[cursorPosition - 1];
	let errorDisplay = "";
	if (lastChar ==" ") {
	    this.value = this.value.trim();
		errorDisplay = 'No spaces allowed';
    // Check if the last typed character and remove it if not allowed
    } else if (lastChar == "@") {
        // Update the input value to exclude the not allowed character
        this.value = this.value.slice(0, cursorPosition - 1) + this.value.slice(cursorPosition);
        // Reposition the cursor correctly after removal
        this.selectionStart = this.selectionEnd = cursorPosition - 1;
		errorDisplay = 'Removed @. Enter the part before @';
    // Check if the last typed character and remove it if not allowed
    } else if (charList.indexOf(lastChar) < 0) {
        // Update the input value to exclude the not allowed character
        this.value = this.value.slice(0, cursorPosition - 1) + this.value.slice(cursorPosition);
        // Reposition the cursor correctly after removal
        this.selectionStart = this.selectionEnd = cursorPosition - 1;
		errorDisplay = 'Removed '+lastChar+'. It is not allowed.';
    }
	usernameErrorDisplay.textContent=errorDisplay; // display message
});
</script>
</body>
</html>