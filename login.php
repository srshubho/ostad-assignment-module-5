<?php
$usersFile = 'users.json';
$users = file_exists($usersFile) ? json_decode(file_get_contents($usersFile), true) : [];
if (isset($_POST['login'])) {
    $errors = [];
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required.";
    }
    if (strlen($password) < 6) {
        $errors[] = "Password should be at least 6 characters long.";
    }
    if (!isset($users[$email])) {
        $errors[] = "user doesn't exist";
    } else {
        $hashedPassword = $users[$email]["password"];
        if (!password_verify($password, $hashedPassword)) {
            $errors[] = "Incorrect password.";
        }
    }
    if (empty($errors)) {
        $users[$email]["email"] = $email;

        // $_SESSION['user'] = serialize($users[$email]);
        setcookie("user", serialize($users[$email]), time() + 3600);

        header("Location: profile.php");
        exit();

    }
}
include 'login_form.php';
?>