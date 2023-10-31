<?PHP
$auth = null;
if (isset($_COOKIE['user'])) {
    $auth = unserialize($_COOKIE['user']);
}
function roleCheck()
{
    if (isset($_COOKIE['user'])) {
        $auth = unserialize($_COOKIE['user']);
        if ($auth['role'] != 'admin') {
            header("Location: 401.php");
        }
    }
}