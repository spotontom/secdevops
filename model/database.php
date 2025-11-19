<?php
$dsn = 'mysql:host=localhost;dbname=base_db';
$username = 'log_user';
$password = 'pa55word';


try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
	//Create an error log function in the future to capture the error
    header("Location: ../errors/error.php");
	exit();
}
?>
