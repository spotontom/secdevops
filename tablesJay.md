## ➜ SQL Tables

This is the core table that stores user profile information and login credentials.<br>
The use of VARCHAR over VARCHAR2, gives empty string and NULL being different.

### ✓ Students

Table Field Name | Data Type & Length | Description
:--- | :--- | :---
studentID | CHAR(10) | Unique primary key
studentFname | VARCHAR(50) | verifies student at sign-in
studentLname | VARCHAR(50) | verifies student at sign-in
studentEmail | VARCHAR(100) | username part can be unique studentID
studentMajor | VARCHAR(100) | student degree program
studentUpdated | DATETIME | Timestamp of when the user account was last updated.

### ✓ Admins

Table Field Name | Data Type & Length | Description
:--- | :--- | :---
adminID | CHAR(10) | unique primary key |
adminFname | VARCHAR(50) | verifies admin sign-in
adminLname | VARCHAR(50) | verifies admin sign-in
adminEmail | VARCHAR(100) | username part can be unique ID
adminPhone | CHAR(15) | (890)123-4567
adminFERPA | BINERY(4) | True or False to allow admins to see records
adminPassword | VARCHAR(100) | securely hashed
adminUpdated | DATETIME | timestamp date and time of when the record was last updated.

### ✓ Tutors

Table Field Name | Data Type & Length | Description
:--- | :--- | :---
tutorID | CHAR(10) | unique primary key |
tutorFname | VARCHAR(50) | verifies tutor sign-in
tutorLname | VARCHAR(50) | verifies tutor sign-in
tutorEmail | VARCHAR(100) | username part can be unique ID
tutorPhone | CHAR(15) | (890)123-4567
tutorCourses | VARCHAR(255) | list of cources
tutorSchedule | VARCHAR(255) | list of schedules
tutorUpdated | DATETIME | timestamp date and time of when the record was last updated.

### ✓ Courses
Table Field Name | Data Type & Length | Description
:--- | :--- | :---
courseID | INT(10) | auto increment
courseProfessor | CHAR(50) | unique name IDentifying the professor
courseName | VARCHAR(100) | name of the course
courseNumber | CHAR(10) |  unique three-letter prefix and a three-digit number, cis4433
courseUpdated | DATETIME | timestamp date and time of when the record was last updated.

### ✓ Log
Table Field Name | Data Type & Length | Description
:--- | :--- | :---
logSignIn | DATETIME | unique primary key, timestamp date and time when the student signs in
logSignOut | DATETIME | timestamp date and time at sign out
logStudentID | CHAR(10) |  foreign key
logCourseID | CHAR(10) |  foreign key
logTutorID | CHAR(10) |  foreign key
logUpdated | DATETIME | timestamp date and time of when the record was last updated.


Can be used by both Tutor or Student

