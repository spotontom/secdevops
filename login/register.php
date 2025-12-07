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
	"Accounting Applications Cert.",
	"Accounting, AA",
	"Accounting Technology, AS",
	"Advertising/Public Relations, AA",
	"Alternative Energy Systems Specialist, Cert.",
	"Anthropology/Archeology, AA",
	"Architectural Design Construction Tech., AS",
	"Architecture, AA",
	"Art, AA",
	"Biology Education, AA",
	"Biology, AA",
	"Business Administration & Management, AS",
	"Business Administration, AA",
	"Business Specialist, Cert.",
	"CNC Machinist, Cert.",
	"Central Sterile Processing Technologist, Cert.",
	"Certified Nursing Assistant Cert.",
	"Chef's Apprentice, Cert.",
	"Chemistry Education, AA",
	"Chemistry, AA",
	"Chiropractic Medicine, AA",
	"Clinical Laboratory Sciences, AA",
	"Composite Fabrication and Testing, CCC",
	"Computer Engineering, AA",
	"Computer Science, AA",
	"Correctional Officer, VC",
	"Criminal Justice Technology, AS",
	"Criminology/Criminal Justice, AA",
	"Crossover Correctional to LEO, VC",
	"Culinary Arts, CCC",
	"Culinary Management, AS",
	"Cybersecurity, AS",
	"Dental Assisting, VC",
	"Dental Hygiene, AS",
	"Dental Medicine, AA",
	"Digital Media Technology, AS",
	"Digital Media, BAS",
	"Digital Media/Multimedia, Cert.",
	"Early Childhood Education Liberal Arts, AA",
	"Early Childhood Education, AS",
	"Earth/Space Education, AA",
	"Economics, AA",
	"Economics for Business, AA",
	"Elementary Teacher Education, AA",
	"Emergency Medical Services, AS",
	"Emergency Medical Technician, ATD",
	"Engineering, AA",
	"Engineering Tech. Support Specialist, CCC",
	"Engineering Technology, AS",
	"Engineering Tech./Building Construction, AA",
	"English, AA",
	"English Teacher Education, AA",
	"Entomology, AA",
	"Environmental Science, AA",
	"Fire Science Technology, AS",
	"Firefighting, Cert.",
	"Florida Child Care Professional, Cert.",
	"Forestry, AA",
	"Geology, AA",
	"Health Education, AA",
	"Health Services Administration, AA",
	"Hilton Hospitality Mgmt and Tourism, AS",
	"History, AA",
	"Journalism, AA",
	"Legal Studies, AA",
	"Leisure Services Management, AA",
	"Marine Biology, AA",
	"Mathematics Education, AA",
	"Mathematics, AA",
	"Medical, AA",
	"Middle School Science Education, AA",
	"Music, AA",
	"Network Server Administration, CCC",
	"Network Systems Technology, AS",
	"Nursing, AA or AS",
	"Nutrition, Food, and Exercise Science, AA",
	"Occupational Therapy, AA",
	"Optometry, AA",
	"Organizational Management, BAS",
	"Paramedic, Cert.",
	"Pharmacy, AA",
	"Philosophy, AA",
	"Physical Education, AA",
	"Physical Therapist Assistant, AS",
	"Physical Therapy, AA",
	"Physics Education, AA",
	"Physics, AA",
	"Political Science, AA",
	"Practical Nurse Cert.",
	"Psychology, AA",
	"RN to BSN",
	"Radio/Television Broadcasting, AA",
	"Radiography, AS",
	"Rapid Prototyping Specialist",
	"Registered Nurse First Assistant, ATC",
	"Religion, AA",
	"Respiratory Care (Therapy), AS",
	"Respiratory Care Therapy, AA",
	"Social Studies Education, AA",
	"Social Work, AA",
	"Sociology, AA",
	"Software and Database Developer, AS",
	"Sonography, Diagnostic Medical, AS",
	"Spanish Language, AA",
	"Spanish Language Teacher Education, AA",
	"Special Education, AA",
	"Speech, AA",
	"Sports Medicine/Athletics Trainer, AA",
	"Stage Technology, CCC",
	"Surgical First Assisting, AS or CCC",
	"Surgical Services - Surgical Technologist",
	"Technology Management, BAS",
	"Theatre, AA",
	"Theatre and Entertainment Technology, AS",
	"Unmanned Vehicles Systems, AS or CCC",
	"Veterinary Medicine, AA",
	"Other, Not Listed");
	$count = count($majors); // Get array size
	
	if (!isset($_SESSION['statusFlag'])) {
		// If it does not exist in the session
		$_SESSION['statusFlag'] = 0;
	}
	if ($_SESSION['statusFlag'] == 5) {
		include '../model/database.php';
		include '../model/student_ID_db.php';
		
		$studentRecord = null;
		$student_ID = filter_input(INPUT_GET, 'student_ID', FILTER_VALIDATE_INT);
		if (!$student_ID) {
			$_SESSION['errorLog'] = "register.php, Invalid student ID.";
			// error log captures error
			header("Location: ../errors/error.php");
			exit();
		}
		$studentRecord = get_student_by_ID($student_ID);
		$student_email = $studentRecord['student_email'];
		$student_fname = htmlspecialchars($studentRecord['student_fname']);
		$student_lname = htmlspecialchars($studentRecord['student_lname']);
		$student_major = $studentRecord['student_major'];
	} else {
		$student_email = $_SESSION['student_email'];
		$student_fname = "";
		$student_lname = "";
		$student_major = "";
	}
?>
<?php include '../views/head.php';?>
<html lang="en">
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
<?php
	if ($_SESSION['statusFlag'] == 5) {
		echo '<form id="registerForm" action="protege.php" autocomplete="on" method="post">';
	} else {
		echo '<form id="editForm" action="placing.php" autocomplete="on" method="post">';
	}
?>
<fieldset>
	<?php
		if ($_SESSION['statusFlag'] == 5) {
			echo '<input type="hidden" name="student_ID" value="';
			echo $student_ID;
			echo '">';
		}
	?>
	<label title="Display only">Email:</label>
	<input type="email"
		id="student_email"
		name="student_email"
		size="25"
		value="<?php echo $student_email; ?>"
		readonly>
	<br>
	<label title="First name is a required entry">First name:</label>
	<input type="text" size="20"
		title="First name is a required entry"
		placeholder ="John-example"
		id="student_fname"
		name="student_fname"
		value="<?php echo $student_fname; ?>"
		required>
	<div class="msg-container">
		<p><span id="firstNameError" class="error-msg"></span></p>
	</div>
	<label title="Last name is a required entry">Last name:</label>
	<input type="text" size="20"
		title="Last name is a required entry"
		placeholder ="Smith-example"
		id="student_lname"
		name="student_lname"
		value="<?php echo $student_lname; ?>"
		required>
	<div class="msg-container">
		<p><span id="lastNameError" class="error-msg"></span></p>
	</div>
	<?php
	if ($_SESSION['statusFlag'] == 5) {
		echo '<label class="label-major" title="College Major is a required entry">College major:</label>';
	}
	?>
	<select id="student_major" name="student_major" class="select-major" required>
		<option value="">Select college major</option>
			<?php foreach ($majors as $major): ?>
		<option value=
			<?php 
				if ($student_major == $major) { 
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
			echo 'Update';
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