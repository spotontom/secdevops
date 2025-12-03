<?php
/*
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Chaz
	Created:	10-29-2025
	Updated:	11-25-2025 Jay King
	Filename:	courses_db.php
*/
require_once '../errors/db_error.php';
function get_courses() {
	try {
		global $db; 
		$query = 'SELECT * FROM courses ORDER BY course_number';
        $statement = $db->prepare($query);
        $statement->execute();
        $courses = $statement->fetchAll();
        $statement->closeCursor();
        return $courses;
	} catch (PDOException $e) {
		db_error($e,'select courses');
	}		
}
?>