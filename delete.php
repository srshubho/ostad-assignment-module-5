<?php
if (isset($_GET['email'])) {
    $email = $_GET['email'];
}
$usersFile = 'users.json';

$users = file_exists($usersFile) ? json_decode(file_get_contents($usersFile), true) : [];

function saveUsers($users, $file)
{
    file_put_contents($file, json_encode($users, JSON_PRETTY_PRINT));
}
unset($users[$email]);
saveUsers($users, $usersFile);
header("Location: role_management.php");