<?php
require "auth.php";
$rolesFile = 'roles.json';
is_admin($auth['role']);

$roles = file_exists($rolesFile) ? json_decode(file_get_contents($rolesFile), true) : [];

function saveRoles($roles, $file)
{
    file_put_contents($file, json_encode($roles, JSON_PRETTY_PRINT));
}

// Check if the form is submitted
if (isset($_POST['create_role'])) {
    $errors = [];

    $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);


    if (empty($role)) {
        $errors[] = "role is required.";
    }


    if (isset($roles[$role])) {
        $errors[] = "role already exists.";
    }

    if (empty($errors)) {


        $roles[$role] = [
            'role' => $role,
        ];
        saveRoles($roles, $rolesFile);

        header("Location: dashboard.php");
        exit();
    }
}

include 'role_form.php';
?>