<?php session_start(); ?>
<!DOCTYPE html>
<!--
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Jay King
	Created:	11-10-2025
	Filename:	register.php
	Updated:	11-20-2025
	
	Has two functions:
	1. Registers new student for tutoring
	2. Edits student, selected from studentList.php
-->
<?php
$majors = array(
"Accounting Applications Certificate",
"Accounting Option, AA",
"Accounting Technology, AS",
"Advertising/Public Relations Option, AA",
"Alternative Energy Systems Specialist, Certificate",
"Anthropology/Archeology Option, AA",
"Architectural Design Construction Technology, AS",
"Architecture Option, AA",
"Art Option, AA",
"Biology Education Option, AA",
"Biology Option, AA",
"Business Administration & Management, AS",
"Business Administration Option, AA",
"Business Specialist, Certificate",
"CNC Machinist, Certificate",
"Central Sterile Processing Technologist, Certificate",
"Certified Nursing Assistant Certificate",
"Chef's Apprentice, Certificate",
"Chemistry Education Option, AA",
"Chemistry Option, AA",
"Chiropractic Medicine Option, AA",
"Clinical Laboratory Sciences Option, AA",
"Composite Fabrication and Testing, CCC",
"Computer Engineering Option, AA",
"Computer Science Option, AA",
"Correctional Officer, V.C.",
"Criminal Justice Technology, AS",
"Criminology/Criminal Justice Option, AA",
"Crossover Correctional Officer to Law Enforcement Officer, V.C.",
"Culinary Arts, CCC",
"Culinary Management, AS",
"Cybersecurity, AS",
"Dental Assisting, V.C.",
"Dental Hygiene, AS",
"Dental Medicine Option, AA",
"Digital Media Technology, AS",
"Digital Media, BAS",
"Digital Media/Multimedia, Certificate",
"Early Childhood Education Liberal Arts Option, AA",
"Early Childhood Education Option, AS",
"Earth/Space Education Option, AA",
"Economics Option, AA",
"Economics for Business Option, AA",
"Elementary Teacher Education Option, AA",
"Emergency Medical Services, AS",
"Emergency Medical Technician, A.T.D.",
"Engineering Option, AA",
"Engineering Technology Support Specialist, CCC",
"Engineering Technology, AS",
"Engineering Technology/Building Construction Option, AA",
"English Option, AA",
"English Teacher Education Option, AA",
"Entomology Option, AA",
"Environmental Science, AA",
"Fire Science Technology, AS",
"Firefighting, Certificate",
"Florida Child Care Professional Credential, Certificate",
"Forestry Option, AA",
"Geology Option, AA",
"Health Education Option, AA",
"Health Services Administration Option, AA",
"History Option, AA",
"Journalism Option, AA",
"Legal Studies Option, AA",
"Leisure Services Management Option, AA",
"Marine Biology Option, AA",
"Mathematics Education Option, AA",
"Mathematics Option, AA",
"Medical Option, AA",
"Middle School Science Education Option, AA",
"Music Option, AA",
"Network Server Administration, CCC",
"Network Systems Technology, AS",
"Nursing Option, AA",
"Nursing, AS",
"Nutrition, Food, and Exercise Science Option, AA",
"Occupational Therapy Option, AA",
"Optometry Option, AA",
"Organizational Management, BAS",
"Paramedic, Certificate",
"Pharmacy Option, AA",
"Philosophy Option, AA",
"Physical Education Option, AA",
"Physical Therapist Assistant, AS",
"Physical Therapy Option, AA",
"Physics Education Option, AA",
"Physics Option, AA",
"Political Science Option, AA",
"Practical Nurse Certificate",
"Psychology Option, AA",
"RN to BSN",
"Radio/Television Broadcasting Option, AA",
"Radiography, AS",
"Rapid Prototyping Specialist",
"Registered Nurse First Assistant, A.T.C.",
"Religion Option, AA",
"Respiratory Care (Therapy), AS",
"Respiratory Care Therapy, AA",
"Select college major",
"Social Studies Education Option, AA",
"Social Work Option, AA",
"Sociology Option, AA",
"Software and Database Developer, AS",
"Sonography, Diagnostic Medical, AS",
"Spanish Language Option, AA",
"Spanish Language Teacher Education Option, AA",
"Special Education Option, AA",
"Speech Option, AA",
"Sports Medicine/Athletics Trainer Option, AA",
"Stage Technology, CCC",
"Surgical First Assisting, AS or CCC",
"Surgical Services - Surgical Technologist Option",
"Technology Management, BAS",
"The Hilton Hospitality Management and Tourism Program, AS",
"Theatre Option, AA",
"Theatre and Entertainment Technology, AS",
"Unmanned Vehicles Systems, AS or CCC",
"Veterinary Medicine Option, AA",
"Other, not listed");
$count = count($majors); // Get array size
include '../model/database.php';
if (!isset($_SESSION['statusFlag'])) {
    // If it does not exist in the session
    $_SESSION['statusFlag'] = 0;
}
if ($_SESSION['statusFlag'] == 5) {
	$student = null;
	$student_ID = filter_input(INPUT_GET, 'student_ID', FILTER_VALIDATE_INT);
	
	if (!$student_ID) {
		die("Invalid student ID.");
	}
	try {
		global $db;
		// configures to throw a PDOException whenever a database error occurs. 
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
		// Use a prepared statement to prevent SQL injection
		$query = "SELECT * FROM students WHERE student_ID = :student_ID";
		$statement = $db->prepare($query);
		$statement->bindParam(':student_ID', $student_ID, PDO::PARAM_INT);
		$statement->execute();
		$student = $statement->fetch(PDO::FETCH_ASSOC);
	
	} catch (PDOException $e) {
		die("Database connection failed: " . $e->getMessage());
	}
} else {
	$student_email = $_SESSION['student_email'];
}
?>
<html lang="en">
<?php include '../views/head.php';?>
<body>
<?php include '../views/header.php';?>
<main>
<h2>
<?php
if ($_SESSION['statusFlag'] == 5) {
	echo 'Edit Student';
} else {
	echo 'Register Student for Tutoring';
}
?>
</h2>
<form id="loginForm"
<?php
if ($_SESSION['statusFlag'] == 5) {
	echo 'action="protege.php"';
} else {
	echo 'action="placing.php"';
}
?>
autocomplete="on" method="post">

	<fieldset>
	<?php
if ($_SESSION['statusFlag'] == 5) {
	echo '<input type="hidden" name="student_ID" value="';
	echo $student['student_ID'];
	echo '">';
}
?>
		<label title="Display only">Email:</label>
			<input type="email"
			id="student_email"
			name="student_email"
			size="25"
			value="
			<?php 
			if ($_SESSION['statusFlag'] == 5) {
				echo $student['student_email'];
			} else {
				echo isset($_SESSION['student_email']) ? $_SESSION['student_email'] : '';
			}
			?>" readonly>
		<br>
		<label title="First name is a required entry">First name:</label>
			<input type="text" size="25"
			title="First name is a required entry"
			placeholder ="John-example"
			id="student_fname"
			name="student_fname"
			value="<?php if ($_SESSION['statusFlag'] == 5) { echo htmlspecialchars($student['student_fname']);} ?>"
			required>
		<p><span id="firstNameError" class="error-msg"></span></p>
		<label title="Last name is a required entry">Last name:</label>
			<input type="text"size="25"
			title="Last name is a required entry"
			placeholder ="Smith-example"
			id="student_lname"
			name="student_lname"
			value="<?php if ($_SESSION['statusFlag'] == 5) { echo htmlspecialchars($student['student_lname']);} ?>"
			required>

		<p><span id="lastNameError" class="error-msg"></span></p>
		
		<label title="College Major is a required entry">Major:</label>
<select id="student_major" name="student_major" required>
		<option value="">Select college major</option>
    <?php foreach ($majors as $major): ?>
        <option value=
		<?php 
		if (($_SESSION['statusFlag'] == 5) && ($student['student_major'] == $major) ) { 
			echo '"'.$major.'" selected>'; 
		} else {
			echo '"'.$major.'">'; 
		}
		?>
        <?php echo $major; ?>
        </option>
    <?php endforeach; ?>
</select>
	</fieldset>
	<br>
	<button type="submit" class ="btn2">
	<?php
	if ($_SESSION['statusFlag'] == 5) {
		echo 'Update Record';
	} else {
		echo 'Register';
	}
	?>
	</button>
	<?php
	if ($_SESSION['statusFlag'] == 5) {
		echo '<a class="btn2" href="../Admin/studentsList.php">Cancel</a>';
	}
	?>
</form>
</main>
<?php include '../views/footer.php';?>
<script>
"use strict";
const charList ="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
// Get the input element and the display element
const firstElement = document.getElementById('student_fname');
const lastElement = document.getElementById('student_lname');
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
	// no message for undefineds	
	} else if (lastChar == null) {	
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
	// no message for undefineds
	} else if (lastChar == null) {
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
</body>
</html>
