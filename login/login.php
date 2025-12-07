<?php
session_start();
?>
<!DOCTYPE html>
<!--
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Jay King
	Created:	10-15-2025
	Filename:	login.php
	Updated:	11-20-2025
-->
<html lang="en">
<?php include '../views/head.php';?>
<?php include '../model/database.php';?>
<?php include '../model/courses_db.php';?>
<?php require_once '../errors/debugLog.php';?>
<body>
<?php include '../views/header.php';?>
<main>
<h2>WELCOME TO SIGN-IN</h2>
<form id="loginForm" autocomplete="on" method="post" action="proceed.php">
	<fieldset>
		<input type="hidden" name="student_ID" 
		value="<?php echo isset($_SESSION['student_ID']) ? $_SESSION['student_ID'] : ''; ?>">
		<label title="Display only">Email:</label>
		<input type="email"
			id="student_email"
			name="student_email"
			size="25"
			value="<?php echo isset($_SESSION['student_email']) ? $_SESSION['student_email'] : ''; ?>"
			readonly>
		<br>
		<label>First name:</label>
		<input type="text"size="25"
			value="<?php echo isset($_SESSION['student_fname']) ? $_SESSION['student_fname'] : ''; ?>"
			readonly>
		<br>
		<label>Last name:</label>
		<input type="text" size="25"
			value="<?php echo isset($_SESSION['student_lname']) ? $_SESSION['student_lname'] : ''; ?>"
			readonly>
		<br><br>
		<?php
			$courses = get_courses();
		?>
		<select id="course_ID" name="course_ID" required class="select-course">
			<option value="">Select course with professor</option>
			<?php foreach ($courses as $course): ?>
				<option value="<?php echo htmlspecialchars($course['course_ID']); ?>">
					<?php 
						echo htmlspecialchars($course['course_number']. ' ' .$course['course_name']. ' - ' .$course['course_professor']);
					?>
				</option>
			<?php endforeach; ?>
 		</select>
	</fieldset>
	<br>
	<button type="submit"class ="btn2">Confirm</button>
</form>
</main>
<?php include '../views/footer.php';?>
</html>