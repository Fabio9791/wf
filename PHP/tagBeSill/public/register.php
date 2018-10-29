<?php
$config = include __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../model/User.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (! isset($_POST['username'])) {
        $errors['username'] = [
            'A username must be provided'
        ];
    }
    if (! isset($_POST['password1'])) {
        $errors['password1'] = [
            'A password must be provided'
        ];
    }
    if (! isset($_POST['password2'])) {
        $errors['password2'] = [
            'You need to confirm your password'
        ];
    }
    if (empty($_POST['username'])) {
        if (! isset($errors['username'])) {
            $errors['username'] = [];
        }
        $errors['username'][] = 'Please, provide a username with at least 1 character';
    }
    if (empty($_POST['password1'])) {
        if (! isset($errors['password1'])) {
            $errors['password1'] = [];
        }
        $errors['password1'][] = 'Please, provide a password with at least 1 character';
    }
    if ($_POST['password1'] !== $_POST['password2']) {
        if (! isset($errors['password2'])) {
            $errors['password2'] = [];
        }
        $errors['password2'][] = 'Please, enter the same password';
    }
    if (empty($errors)) {
        try {
            createUser($_POST['username'], $_POST['password1']);
            $success = true;
        } catch (Exception $e) {
            echo 'An error occured with code : ' . $e->getMessage();
            exit();
        }
    }
}

include __DIR__ . '/../view/registerpage.html.php';