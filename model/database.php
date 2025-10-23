<?php
$dsn = 'mysql:host=localhost;dbname=base_db';
$username = 'phpuser';
$password = 'mypassword';


try {
    $db = new PDO($dsn, $username, $password);
    echo "Connection successful!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
