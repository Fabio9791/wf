<?php
require_once __DIR__ . '/../model/User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (! isset($_POST['username']) || empty($_POST['username']) || ! isset($_POST['password'])) {
        $success = false;
    }

    try {
        $user = findUser($_POST['username']);
    } catch (Exception $e) {
        $success = false;
        echo 'An error occured with code : ' . $e->getMessage();
        exit();
    }

    if ($user && $_POST['password'] == $user['password']) {
        $success = true;
        logInUser($user);
    } else {
        $success = false;
    }
}
include __DIR__ . '/../view/loginpage.html.php';
