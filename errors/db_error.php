<?php
function db_error($e,$message) {
	die('<div style="color:red;
	font-size: 4.0vw;
	font-weight: 600;
	background-color: #eeeeee;
	padding: 2rem;
	margin: 2rem auto 0 auto;
	border: 0.1rem solid red;
	width: 80%;">'
	. $_SERVER['HTTP_HOST']
	. ' Database error '
	. $message
	. ' '
	. $e->getMessage() . '</div>');
}
?>