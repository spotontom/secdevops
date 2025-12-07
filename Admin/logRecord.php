<?php session_start(); ?>
<!DOCTYPE html>
<!--
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Jay King
	Created:	11-25-2025
	Filename:	logRecord.php

Tables Used:

Log Table
log_ID | INT(10)
log_signin | DATETIME
log_signout | DATETIME
log_student_ID | CHAR(10
log_course_ID | CHAR(10)
log_tutor_ID | CHAR(10)
log_updated | DATETIME

Students Table
student_ID | INT(10)
student_fname | VARCHAR(50)
student_lname | VARCHAR(50)
student_email | VARCHAR(100)
student_major | VARCHAR(100)
student_updated | DATETIME

Courses Table
course_ID | INT(10)
course_number
course_number | CHAR(10)
course_updated | DATETIME

-->
<?php

include '../model/database.php';
include '../model/log_ID_db.php';
include '../model/student_ID_db.php';
include '../model/course_ID_db.php';

$log_ID = filter_input(INPUT_GET, 'log_ID', FILTER_VALIDATE_INT);

$logRecord = get_log_by_ID($log_ID);
if ($logRecord==null) {
	$log_student_ID  = 0;
	$log_course_ID = 0;
	$log_signin  = "";
	$log_signout  = "";
} else {
	$log_student_ID  = $logRecord['log_student_ID'];
	$log_course_ID = $logRecord['log_course_ID'];
	$log_signin  = $logRecord['log_signin'];
	$log_signout  = $logRecord['log_signout'];
}
$studentRecord = get_student_by_ID($log_student_ID);
if ($studentRecord==null) {
	$student_fname = "";
	$student_lname = "";
	$student_email = "";
} else {
	$student_fname = $studentRecord['student_fname'];
	$student_lname = $studentRecord['student_lname'];
	$student_email = $studentRecord['student_email'];
}
$courseRecord = get_course_by_ID($log_course_ID);
if ($courseRecord==null) {
	$course_number = "";
	$course_professor = "";
	$course_name = "";
} else {
	$course_number = $courseRecord['course_number'];
	$course_professor = $courseRecord['course_professor'];
	$course_name = $courseRecord['course_name'];
}
?>
<html lang="en">
<?php include '../views/head.php';?>
<body>
<?php include '../views/header.php';?>

<main>
<h2>LOG RECORD DISPLAY</h2>
<form>
	<fieldset>
		<label title="Display only">Log ID:</label>
		<input type="text"
			id=="log_ID"
			name="log_ID"
			size="2"
			class = "right-align"
			value="<?php echo $log_ID; ?>"
			readonly>
		<br>
		<label title="Display only">Student ID:</label>
		<input type="text"
			id=="student_ID"
			name="student_ID"
			size="2"
			class = "right-align"
			value="<?php echo $log_student_ID; ?>"
			readonly>
		<br>
		<label title="Display only">Student:</label>
		<input type="text"
			size="25"
			id="student_name"
			name="student_name"
			value="<?php echo $student_fname.' '.$student_lname; ?>"
			readonly>
		<br>
		<label title="Display only">Sign In:</label>
		<input type="text"
			id=="log_signin"
			name="log_signin"
			size="20"
			value="<?php echo $log_signin; ?>"
			readonly>
		<br>
		<label title="Display only">Sign Out:</label>
		<input type="text"
			id=="log_signout"
			name="log_signout"
			size="20"
			value="<?php echo $log_signout; ?>"
			readonly>
		<br>
		<label title="Display only">Course:</label>
		<input type="text"
			id=="course_number"
			name="course_number"
			size="5"
			value="<?php echo $course_number; ?>"
			readonly>
		<br>
		<input type="text"
			id=="course_number"
			name="course_number"
			size="30"
			value="<?php echo $course_name; ?>"
			readonly>
		<br>
		<label title="Display only">Professor:</label>
			<input type="text"
			id=="course_professor"
			name="course_professor"
			size="25"
			value="<?php echo $course_professor; ?>"
			readonly>
		<br>
	</fieldset>
	<br>
	<a class="btn2" href="logList.php">Return</a>
	<br>
</form>
</main>
<?php include '../views/footer.php';?>
</body>
</html>