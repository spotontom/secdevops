<?php
/*
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Chaz
	Created:	10-20-2025
	Updated:	11-25-2025 Jay King
	Updated:	12-05-2025 Jay King
	Filename:	logs_db.php

Retrieves logs data ORDER BY log_updated
 
TABLE log
	log_ID
	log_signin
	log_signout
	log_student_ID
	log_course_ID
	log_updated
 
TABLE courses
	course_ID
	course_professor
	course_name
	course_number
	course_updated

TABLE students
	student_ID
	student_fname
	student_lname
	student_email
	student_major
	student_updated

LEFT Join
Inner Query (Subquery)	
Outer Query (Main Query)

*/
include '../errors/errorLog.php';
function get_logs() {
	if (!isset($_SESSION['orderBy'])) {$_SESSION['orderBy'] = "";}
	$orderBy = $_SESSION['orderBy'];
    try {
        global $db;
			switch ($orderBy) {
			case "Student":
				$query = 
					"SELECT temp.*
					FROM ( 
						select
							log.log_ID,
							log.log_signin,
							log.log_signout,
							log.log_student_ID,
							log.log_course_ID,
							log.log_updated,
							courses.course_number,
							students.student_email
						FROM log
							LEFT JOIN courses ON log.log_course_ID = courses.course_ID
							LEFT JOIN students ON log.log_student_ID = students.student_ID
						ORDER BY log_updated DESC, log_ID ASC LIMIT 25
					) temp
					ORDER BY log_student_ID ASC";
				break;
			case "Course":
				$query = 
					"SELECT temp.*
					FROM ( 
						select
							log.log_ID,
							log.log_signin,
							log.log_signout,
							log.log_student_ID,
							log.log_course_ID,
							log.log_updated,
							courses.course_number,
							students.student_email
						FROM log
							LEFT JOIN courses ON log.log_course_ID = courses.course_ID
							LEFT JOIN students ON log.log_student_ID = students.student_ID
						ORDER BY log_updated DESC, log_ID ASC LIMIT 25
					) temp
					ORDER BY log_course_ID ASC";
				break;
			default:
				$_SESSION['orderBy'] = "DateTime";
				$query = 
					"SELECT 
						log.log_ID,
						log.log_signin,
						log.log_signout,
						log.log_student_ID,
						log.log_course_ID,
						log.log_updated,
						courses.course_number,
						students.student_email
					FROM log
					LEFT JOIN courses ON log.log_course_ID = courses.course_ID
					LEFT JOIN students ON log.log_student_ID = students.student_ID
					ORDER BY log_updated DESC, log_ID ASC LIMIT 25";
		}

        $statement = $db->prepare($query);
        $statement->execute();
        $logs = $statement->fetchAll();
		
		// Close statement, release the resources and memory associated
		$statement->closeCursor();
        return $logs;
    } catch (PDOException $e)  {
		errorLog('select logs',$e);
	}
}
?>
