<!--
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Jay King
	Created:	10-15-2025
	Updated:	11-20-2025 Jay King
	Filename:	head.php
-->
<head>
<link rel="icon" href="../assets/favicon.ico" type="image/png">
<meta name="robots" content="noindex,nofollow">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ACE Tutoring Lab</title>
<!-- <link rel="stylesheet" href="../assets/stylevw.css" /> -->
<link rel="stylesheet" href="../assets/table.css" />
<style>
/*
    Class:		cis4433
    Author:		Jay King
    Updated:	10-15-2025
    Filename	stylevw.css
    Updated:	10-29-2025 Thomas Scott
	Updated:	11-25-2025 Jay King
*/
.btn2 {
	display:block;
	font-size: clamp(1rem,4vw,3.8rem); 
	padding-top: 1.5vh;
	padding-bottom: 1.5vh;
	width:28vw;
	background-color: #2840a0;
	color: #fff;
	font-family: "Segoe UI", Arial, sans-serif;
	font-weight: 600;
	box-shadow: .18vw .10vw .09vw #111111;
	color: white; /* White text for contrast */
	margin: 1.2vw auto 0.4vw auto;
	border:medium outset rgb(50,60,140);
	border-radius:1vw;
	cursor: pointer;
}
label, input, fieldset {
	font-size: clamp(1.5rem,3.8vw,2.8rem); 
	font-family: "Segoe UI", Arial, sans-serif;
}
.select-major {
	font-size: clamp(1.5rem,3.8vw,2.8rem); 
	width: 80vw;
	margin-left: 1vw;
}
fieldset {
	font-size: clamp(1rem,4vw,3.8rem); 
    text-align: left;
    width: 100%;
    padding:0;
    border: none;
	/* top, right, bottom, left */
    margin:0 0.2vw 0 1vw;
}
/* Thomas styling for login form spacing */
#loginForm fieldset {
    padding-left: 1.5rem;      /* gentle left gap for labels */
    margin: 0;
    padding-top: 0.25rem;
    padding-bottom: 0.25rem;
    border: none;
}
body {
    line-height:1.2;
    font-family:Arial, Helvetica, FreeSans, sans-serif;
    font-size:3vw;
    text-align:center;
    margin:0;
    padding:0;
    background-color:#000011;
    color:black;
}
main {
    flex: 1;                          /* makes main expand to fill vertical space */
    display: flex;
    justify-content: center;          /* centers form horizontally */
    align-items: center;              /* centers form vertically */
    align-items: center;              /* centers form vertically */
    flex-direction: column;
	background-color: #2fafeb;
    width: 100%;
	margin:0;
    /* top, right, bottom, left */
	padding:0 0 1vw 0;
}
.frame {
    text-align: center;
    background-color: #f3f3f3;
    width: 70%;
    /* top, right, bottom, left */
    padding: 0.5vw 0.5vw 0.5vw 0.5vw;
    margin:5vh auto 10vh auto;
}
form {
	width: clamp(30rem,85vw,80rem);
    /* Changes made by Thomas */
    background-color: #f3f3f3;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
	border: none;
}
#loginForm form {
    /*Changes made by Thomas */
    background-color: #f3f3f3;
    border-radius: 1rem;          /* smooth corners */
    border: .1rem solid #ccc;       /* subtle outline */
    box-shadow: 0 .6rem 1.2rem rgba(0, 0, 0, 0.15); /* soft shadow */
}
label {
	width: 24vw;
	text-align: right;
	padding-right: 1vw;
    display:inline-block;

    /* Thomas below changed label */
    font-family: "Segoe UI", Arial, sans-serif;
    font-weight: 600;                 /* semi-bold for clarity */
    color: #0e2a47;                   /* same deep navy as headers */
    vertical-align: middle;
}
input[readonly] {
	background-color: #f0f0f0; /* Light gray background */
	background-color: #DBE8EB;
	border: none;
}
input[type="text"]:valid,
select:valid {
	border: none;
    background-color: #DBE9FA;
}
input[type="text"]:invalid,
select:invalid {
    border: none;
    background: white;
    /*  Horizontal offset, Vertical offset, Blur radius, color */
    box-shadow: .2vw .2vw .4vw blue;
}
input[type="text"]:focus,
select:focus {
    border: .1vw solid blue;
    background: white;
}
/* Thomas Changed Input Styling */
input[type="text"]:focus, 
select:focus {
  outline: none;
  border-color: #2840a0;              /* Gulf Coast blue focus highlight */
  box-shadow: 0 0 5px rgba(40, 64, 160, 0.3);
  background-color: #f9fbff;          /* slight tint when active */
}
input[type="text"]:hover,  
select:hover {
  border-color: #8fa4d4;              /* soft hover cue */
}
</style>
</head>