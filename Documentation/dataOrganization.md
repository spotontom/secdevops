# Data Organization: Tables/fields

### Students
Table Field Name | Data Type & Length | Description
:--- | :--- | :---
studentID | INT(10) | auto increment
studentFname | VARCHAR(50) | verifies student at sign-in
studentLname | VARCHAR(50) | verifies student at sign-in
studentEmail | VARCHAR(100) | username part can be unique studentID
studentMajor | VARCHAR(100) | student degree program
studentUpdated | DATETIME | Timestamp of when the user account was last updated.

---

### Courses
Table Field Name | Data Type & Length | Description
:--- | :--- | :---
courseID | INT(10) | auto increment
courseProfessor | CHAR(50) | unique name IDentifying the professor
courseName | VARCHAR(100) | name of the course
courseNumber | CHAR(10) |  unique three-letter prefix and a three-digit number, cis4433
courseUpdated | DATETIME | timestamp date and time of when the record was last updated.

---

<br>
<br>
<br>

# **------------CURRENTLY OUT OF SCOPE------------**



### Admins
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

---

### Tutors
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

---

### Log
Table Field Name | Data Type & Length | Description
:--- | :--- | :---
logSignIn | DATETIME | unique primary key, timestamp date and time when the student signs in
logSignOut | DATETIME | timestamp date and time at sign out
logStudentID | CHAR(10) |  foreign key
logCourseID | CHAR(10) |  foreign key
logTutorID | CHAR(10) |  foreign key
logUpdated | DATETIME | timestamp date and time of when the record was last updated.



---

## Privacy and Security Requirements
| Requirement | Notes          |
|-------------|----------------|
| FERPA       | No PII display |
| Anonymous?  | Name N/R       |

---

## Compliance
| Requirement | Notes                                 |
|-------------|---------------------------------------|
| ADA         | Ensure accessibility accommodations   |


