<?php
$dsn = 'mysql:host=localhost;dbname=base_db';
$username = 'log_user';
$password = 'pa55word';


try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
	die('<div style="color:red;
	font-size: 4.0vw;
	font-weight: 600;
	background-color: #eeeeee;
	padding: 2rem;
	margin: 2rem auto 0 auto;
	border: 0.1rem solid red;
	width: 80%;">' . $_SERVER['HTTP_HOST'] . ' ' . $username . ' connection to database failed: ' . $e->getMessage() . '</div>');
}
?>
