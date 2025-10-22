<?php
// Thomas Scott - Index.php (CONTROLLER)

$action = filter_input(INPUT_POST, 'action');
if ($action === null) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === null) {
        $action = 'login'; // ✅ Default to login page
    }
}
//This currently is doing nothing so I am forcing it to load login
header("Location: login/");
exit();
// Switch to handle different actions
switch ($action) {
    case 'login':
        echo "Login action here";
        include('login/index.php');
        break;

    case 'confirm':
        echo "confirm login here";
        include('confirm.php');
        break;

    default:
        echo "Default action";
        include('login/index.php');
        break;
}
?>


