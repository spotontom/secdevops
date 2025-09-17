# Data Organization: Tables/fields

## Data
| Field             | Description                                                   |
|-------------------|---------------------------------------------------------------|
| UserName/email    | First part of email                                           |
| StudentID         | key to identify student not A## or email                      |
| firstName         | Student info                                                  |
| LastName          | Student info                                                  |
| Passwords         | For admin logins                                              |
| Sign-in date/time | Logged for data visualization                                 |
| Sign-out date/time| Logged for data visualization                                 |
| Class Numbers (CRN)| Indicate what class they are getting/have gotten tutoring for |
| Professor         | For data visualization                                        |
| Tutor names       | Are we collecting what Tutor they see?                        |
| TutorID           | Unique identifier (key)                                       |


---

## Tables

### Student
| Field         |
|---------------|
| firstName     |
| lastName      |
| StudentID     |
| Student-Email |
|Student courses|

### Tutors
| Field    |
|----------|
| Name     |
| Schedule | 
| TutorID  | 
| Courses  |
| Email    | Not sure we need 
| Phone    | Not sure we need 

### Courses
| Field        |
|--------------|
| CourseName   |
| Professor(s) |
| CourseNumber |
| courseID     |

### Log
| Field        |
|--------------|
| studentID    |
| courseID     |
| tutorID      |
| Date/time in |
| Date/time out|

--- 

## Privacy and Security Requirements
| Requirement | Notes     |
|-------------|-----------|
| FERPA       |No PII display|
| Anonymous?  | Name N/R  |

---

## Compliance
| Requirement | Notes |
|-------------|-------|
| ADA         |       |





# Example Table
### Not Perfect as we have not confirmed the use of all columns

## Data
| Field              | Description                                                   | Example                  |
|--------------------|---------------------------------------------------------------|--------------------------|
| UserName/email     | First part of email                                           | jsmith                   |
| StudentID          | Key to identify student (not A## or email)                    | S1001                    |
| firstName          | Student info                                                  | John                     |
| LastName           | Student info                                                  | Smith                    |
| Passwords          | For admin logins                                              | ********                 |
| Sign-in date/time  | Logged for data visualization                                 | 2025-09-12 10:05 AM      |
| Sign-out date/time | Logged for data visualization                                 | 2025-09-12 11:00 AM      |
| Class Numbers (CRN)| Indicate what class they are getting/have gotten tutoring for | 12345 (MAC1105)          |
| Professor          | For data visualization                                        | Dr. Brown                |
| Tutor names        | Are we collecting what Tutor they see?                        | Sarah Lee                |
| TutorID            | Unique identifier (key)                                       | T203                     |

---

## Tables

### Student
| firstName | lastName | StudentID | Student-Email               | Student courses     |
|-----------|----------|-----------|-----------------------------|---------------------|
| John      | Smith    | S1001     | jsmith@my.gulfcoast.edu     | MAC1105, COP1000    |
| Maria     | Lopez    | S1002     | mlopez@my.gulfcoast.edu     | BSC2085, PSY2012    |

---

### Tutors
| Name      | Schedule               | TutorID | Courses          | Email            | Phone        |
|-----------|------------------------|---------|------------------|------------------|--------------|
| Sarah Lee | Mon/Wed 9-12, Fri 1-4 | T203     | Math, Statistics | slee@gcsc.edu    | (850) 555-1000 |
| John Doe  | Tue/Thu 10-2           | T204    | English, Writing | jdoe@gcsc.edu    | (850) 555-2000 |

---

### Courses
| CourseName             | Professor(s) | CourseNumber | courseID |
|-------------------------|--------------|--------------|----------|
| College Algebra         | Dr. Brown    | MAC1105      | C101     |
| Intro to Programming    | Prof. Miller | COP1000      | C102     |
| Human Anatomy & Phys I  | Dr. Carter   | BSC2085      | C103     |

---

### Log
| studentID | courseID | tutorID | Date/time in       | Date/time out      |
|-----------|----------|---------|--------------------|--------------------|
| S1001     | C101     | T203    | 2025-09-12 10:05AM | 2025-09-12 11:00AM |
| S1002     | C103     | T204    | 2025-09-12 1:15PM  | 2025-09-12 2:05PM  |

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


