<?php

$usersFile = 'users.json';

$users = file_exists($usersFile) ? json_decode(file_get_contents($usersFile), true) : [];

function saveUsers($users, $file)
{
    file_put_contents($file, json_encode($users, JSON_PRETTY_PRINT));
}

// Check if the form is submitted
if (isset($_POST['register'])) {
    $errors = [];

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    if (empty($username)) {
        $errors[] = "Username is required.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required.";
    }

    if (strlen($password) < 6) {
        $errors[] = "Password should be at least 6 characters long.";
    }
    if (isset($users[$email])) {
        $errors[] = "Email already exists.";
    }

    if (empty($errors)) {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $users[$email] = [
            'username' => $username,
            'password' => $hashedPassword,
            'role' => 'user',
        ];
        saveUsers($users, $usersFile);
        $_SESSION['user'] = $email;
        header("Location: login.php");
        exit();
    }
}
include 'registration_form.php';
?>