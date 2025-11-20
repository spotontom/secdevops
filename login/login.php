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
	Updated:	11-20-2025 by Jay King
	-->
<html lang="en">
<?php include '../views/head.php';?>
<?php include '../model/database.php';?>
<?php include '../model/courses_db.php';?>
<body>
<?php include '../views/header.php';?>
<main>
<h2>Welcome</h2>
<form id="loginForm"autocomplete="on"method="post"action="proceed.php">
	<fieldset>
		<label title="Display only">Email:</label>
			<input type="email"
			id="emailInput"
			name="emailInput"
			size="25"
			value="<?php echo isset($_SESSION['emailInput']) ? $_SESSION['emailInput'] : ''; ?>"
			readonly>
		<br><br>
		<label>First name:</label>
			<input type="text"size="25"
			value="<?php echo isset($_SESSION['student_fname']) ? $_SESSION['student_fname'] : ''; ?>"
			readonly>
		<br><br>
		<label>Last name:</label>
			<input type="text"size="25"
			value="<?php echo isset($_SESSION['student_lname']) ? $_SESSION['student_lname'] : ''; ?>"
			readonly>
		<br><br>
		<label title="Requires a selection">Course:</label>
		<?php
			$courses = get_courses();
		?>
		<select id="selectCourseInput"name="selectCourseInput"required>
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
	<button type="submit"class ="btn1">Confirm</button>
</form>
</main>
<?php include '../views/footer.php';?>
</html>