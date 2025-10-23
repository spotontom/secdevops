<?php
// Thomas Scott - Index.php (CONTROLLER)

$action = filter_input(INPUT_POST, 'action');
if ($action === null) {
    $action = filter_input(INPUT_GET, 'action');
}
//This currently is doing nothing so I am forcing it to load login
header("Location: login/");
exit();
// Switch to handle different actions
switch ($action) {
    case 'login':
        echo "Login action here";
        include('sign_in_form.php');
        break;

    case 'confirm':
        echo "confirm login here";
        include('confirm.php');
        break;

    default:
        echo "Default action";
        include('sign_in_form.php');
        break;
}
?>


