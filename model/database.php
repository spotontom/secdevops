<?php
$dsn = 'mysql:host=localhost;dbname=base_db';
$username = 'log_user';
$password = 'pa55word';


try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo "Connection to database failed: " . $e->getMessage();
}
?>
