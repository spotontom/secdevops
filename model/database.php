<?php
$dsn = 'mysql:host=localhost;dbname=base_db';
$username = 'phpuser';
$password = 'mypassword';


try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo "Connection to database failed: " . $e->getMessage();
}
?>
