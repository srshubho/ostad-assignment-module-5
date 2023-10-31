<?PHP
$usersFile = 'users.json';

$users = file_exists($usersFile) ? json_decode(file_get_contents($usersFile), true) : [];
function saveUsers($users, $file)
{
    file_put_contents($file, json_encode($users, JSON_PRETTY_PRINT));
}


if (isset($_POST['update_role'])) {
    $errors = [];

    $role = $_POST['role'];
    $email = $_POST['email'];
    echo $email;

    if (empty($errors)) {
        $users[$email]['role'] = $role;

        saveUsers($users, $usersFile);
        header("Location: rolemanagement.php");
        exit();
    }
}
require "update_form.php";