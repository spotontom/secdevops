<?php
session_start();
$emailInput = $_SESSION['emailInput'];
?>
<!DOCTYPE html>
<!--
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Jay King
	Updated:	11-10-2025
	Filename:	register.php
	registers new student for tutoring
-->
<html lang="en">
<?php include '../views/head.php';?>
<body>
<?php include '../views/header.php';?>
<main>
<h2>Register Student for Tutoring</h2>
<form id="loginForm"autocomplete="on"method="post"action="placing.php">

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
			<input type="text"size="25"
			title="First name is a required entry"
			placeholder ="John-example"id="firstNameInput"name="firstNameInput"required>
		<p><span id="firstNameError"class="error-msg"></span></p>
		<label title="Last name is a required entry">Last name:</label>
			<input type="text"size="25"
			title="Last name is a required entry"
			placeholder ="Smith-example"id="lastNameInput"name="lastNameInput"required>
		<p><span id="lastNameError"class="error-msg"></span></p>
		<label title="College Major is a required entry">Major:</label>
		<select id="selectMajor" name="selectMajor" required>
			<option value="">Select college major</option>
			<option value="Other">Other</option>
			<option value="Accounting Applications Certificate">Accounting Applications Certificate</option>
			<option value="Accounting Option, AA">Accounting Option, AA</option>
			<option value="Accounting Technology, AS">Accounting Technology, AS</option>
			<option value="Advertising/Public Relations Option, AA">Advertising/Public Relations Option, AA</option>
			<option value="Alternative Energy Systems Specialist, Certificate">Alternative Energy Systems Specialist, Certificate</option>
			<option value="Anthropology/Archeology Option, AA">Anthropology/Archeology Option, AA</option>
			<option value="Architectural Design Construction Technology, AS">Architectural Design Construction Technology, AS</option>
			<option value="Architecture Option, AA">Architecture Option, AA</option>
			<option value="Art Option, AA">Art Option, AA</option>
			<option value="Biology Education Option, AA">Biology Education Option, AA</option>
			<option value="Biology Option, AA">Biology Option, AA</option>
			<option value="Business Administration & Management, AS">Business Administration & Management, AS</option>
			<option value="Business Administration Option, AA">Business Administration Option, AA</option>
			<option value="Business Specialist, Certificate">Business Specialist, Certificate</option>
			<option value="CNC Machinist, Certificate">CNC Machinist, Certificate</option>
			<option value="Central Sterile Processing Technologist, Certificate">Central Sterile Processing Technologist, Certificate</option>
			<option value="Certified Nursing Assistant Certificate">Certified Nursing Assistant Certificate</option>
			<option value="Chef's Apprentice, Certificate">Chef's Apprentice, Certificate</option>
			<option value="Chemistry Education Option, AA">Chemistry Education Option, AA</option>
			<option value="Chemistry Option, AA">Chemistry Option, AA</option>
			<option value="Chiropractic Medicine Option, AA">Chiropractic Medicine Option, AA</option>
			<option value="Clinical Laboratory Sciences Option, AA">Clinical Laboratory Sciences Option, AA</option>
			<option value="Composite Fabrication and Testing, CCC">Composite Fabrication and Testing, CCC</option>
			<option value="Computer Engineering Option, AA">Computer Engineering Option, AA</option>
			<option value="Computer Science Option, AA">Computer Science Option, AA</option>
			<option value="Correctional Officer, V.C.">Correctional Officer, V.C.</option>
			<option value="Criminal Justice Technology, AS">Criminal Justice Technology, AS</option>
			<option value="Criminology/Criminal Justice Option, AA">Criminology/Criminal Justice Option, AA</option>
			<option value="Crossover Correctional Officer to Law Enforcement Officer, V.C.">Crossover Correctional Officer to Law Enforcement Officer, V.C.</option>
			<option value="Culinary Arts, CCC">Culinary Arts, CCC</option>
			<option value="Culinary Management, AS">Culinary Management, AS</option>
			<option value="Cybersecurity, AS">Cybersecurity, AS</option>
			<option value="Dental Assisting, V.C.">Dental Assisting, V.C.</option>
			<option value="Dental Hygiene, AS">Dental Hygiene, AS</option>
			<option value="Dental Medicine Option, AA">Dental Medicine Option, AA</option>
			<option value="Digital Media Technology, AS">Digital Media Technology, AS</option>
			<option value="Digital Media, BAS">Digital Media, BAS</option>
			<option value="Digital Media/Multimedia, Certificate">Digital Media/Multimedia, Certificate</option>
			<option value="Early Childhood Education Liberal Arts Option, AA">Early Childhood Education Liberal Arts Option, AA</option>
			<option value="Early Childhood Education Option, AS">Early Childhood Education Option, AS</option>
			<option value="Earth/Space Education Option, AA">Earth/Space Education Option, AA</option>
			<option value="Economics Option, AA">Economics Option, AA</option>
			<option value="Economics for Business Option, AA">Economics for Business Option, AA</option>
			<option value="Elementary Teacher Education Option, AA">Elementary Teacher Education Option, AA</option>
			<option value="Emergency Medical Services, AS">Emergency Medical Services, AS</option>
			<option value="Emergency Medical Technician, A.T.D.">Emergency Medical Technician, A.T.D.</option>
			<option value="Engineering Option, AA">Engineering Option, AA</option>
			<option value="Engineering Technology Support Specialist, CCC">Engineering Technology Support Specialist, CCC</option>
			<option value="Engineering Technology, AS">Engineering Technology, AS</option>
			<option value="Engineering Technology/Building Construction Option, AA">Engineering Technology/Building Construction Option, AA</option>
			<option value="English Option, AA">English Option, AA</option>
			<option value="English Teacher Education Option, AA">English Teacher Education Option, AA</option>
			<option value="Entomology Option, AA">Entomology Option, AA</option>
			<option value="Environmental Science, AA">Environmental Science, AA</option>
			<option value="Fire Science Technology, AS">Fire Science Technology, AS</option>
			<option value="Firefighting, Certificate">Firefighting, Certificate</option>
			<option value="Florida Child Care Professional Credential, Certificate">Florida Child Care Professional Credential, Certificate</option>
			<option value="Forestry Option, AA">Forestry Option, AA</option>
			<option value="Geology Option, AA">Geology Option, AA</option>
			<option value="Health Education Option, AA">Health Education Option, AA</option>
			<option value="Health Services Administration Option, AA">Health Services Administration Option, AA</option>
			<option value="History Option, AA">History Option, AA</option>
			<option value="Journalism Option, AA">Journalism Option, AA</option>
			<option value="Legal Studies Option, AA">Legal Studies Option, AA</option>
			<option value="Leisure Services Management Option, AA">Leisure Services Management Option, AA</option>
			<option value="Marine Biology Option, AA">Marine Biology Option, AA</option>
			<option value="Mathematics Education Option, AA">Mathematics Education Option, AA</option>
			<option value="Mathematics Option, AA">Mathematics Option, AA</option>
			<option value="Medical Option, AA">Medical Option, AA</option>
			<option value="Middle School Science Education Option, AA">Middle School Science Education Option, AA</option>
			<option value="Music Option, AA">Music Option, AA</option>
			<option value="Network Server Administration, CCC">Network Server Administration, CCC</option>
			<option value="Network Systems Technology, AS">Network Systems Technology, AS</option>
			<option value="Nursing Option, AA">Nursing Option, AA</option>
			<option value="Nursing, AS">Nursing, AS</option>
			<option value="Nutrition, Food, and Exercise Science Option, AA">Nutrition, Food, and Exercise Science Option, AA</option>
			<option value="Occupational Therapy Option, AA">Occupational Therapy Option, AA</option>
			<option value="Optometry Option, AA">Optometry Option, AA</option>
			<option value="Organizational Management, BAS">Organizational Management, BAS</option>
			<option value="Paramedic, Certificate">Paramedic, Certificate</option>
			<option value="Pharmacy Option, AA">Pharmacy Option, AA</option>
			<option value="Philosophy Option, AA">Philosophy Option, AA</option>
			<option value="Physical Education Option, AA">Physical Education Option, AA</option>
			<option value="Physical Therapist Assistant, AS">Physical Therapist Assistant, AS</option>
			<option value="Physical Therapy Option, AA">Physical Therapy Option, AA</option>
			<option value="Physics Education Option, AA">Physics Education Option, AA</option>
			<option value="Physics Option, AA">Physics Option, AA</option>
			<option value="Political Science Option, AA">Political Science Option, AA</option>
			<option value="Practical Nurse Certificate">Practical Nurse Certificate</option>
			<option value="Psychology Option, AA">Psychology Option, AA</option>
			<option value="RN to BSN">RN to BSN</option>
			<option value="Radio/Television Broadcasting Option, AA">Radio/Television Broadcasting Option, AA</option>
			<option value="Radiography, AS">Radiography, AS</option>
			<option value="Rapid Prototyping Specialist">Rapid Prototyping Specialist</option>
			<option value="Registered Nurse First Assistant, A.T.C.">Registered Nurse First Assistant, A.T.C.</option>
			<option value="Religion Option, AA">Religion Option, AA</option>
			<option value="Respiratory Care (Therapy), AS">Respiratory Care (Therapy), AS</option>
			<option value="Respiratory Care Therapy, AA">Respiratory Care Therapy, AA</option>
			<option value="Social Studies Education Option, AA">Social Studies Education Option, AA</option>
			<option value="Social Work Option, AA">Social Work Option, AA</option>
			<option value="Sociology Option, AA">Sociology Option, AA</option>
			<option value="Software and Database Developer, AS">Software and Database Developer, AS</option>
			<option value="Sonography, Diagnostic Medical, AS">Sonography, Diagnostic Medical, AS</option>
			<option value="Spanish Language Option, AA">Spanish Language Option, AA</option>
			<option value="Spanish Language Teacher Education Option, AA">Spanish Language Teacher Education Option, AA</option>
			<option value="Special Education Option, AA">Special Education Option, AA</option>
			<option value="Speech Option, AA">Speech Option, AA</option>
			<option value="Sports Medicine/Athletics Trainer Option, AA">Sports Medicine/Athletics Trainer Option, AA</option>
			<option value="Stage Technology, CCC">Stage Technology, CCC</option>
			<option value="Surgical First Assisting, AS or CCC">Surgical First Assisting, AS or CCC</option>
			<option value="Surgical Services - Surgical Technologist Option">Surgical Services - Surgical Technologist Option</option>
			<option value="Technology Management, BAS">Technology Management, BAS</option>
			<option value="The Hilton Hospitality Management and Tourism Program, AS">The Hilton Hospitality Management and Tourism Program, AS</option>
			<option value="Theatre Option, AA">Theatre Option, AA</option>
			<option value="Theatre and Entertainment Technology, AS">Theatre and Entertainment Technology, AS</option>
			<option value="Unmanned Vehicles Systems, AS or CCC">Unmanned Vehicles Systems, AS or CCC</option>
			<option value="Veterinary Medicine Option, AA">Veterinary Medicine Option, AA</option>
		</select>	
	</fieldset>
	<br>
	<button type="submit"class ="btn1">Register</button>
</form>
</main>
<?php include '../views/footer.php';?>
<script>
"use strict";
const charList ="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
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
	let errorDisplay ="";
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
	let errorDisplay ="";
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