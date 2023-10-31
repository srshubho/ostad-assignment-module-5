<?PHP
$auth = null;
if (isset($_COOKIE['user'])) {
    $auth = unserialize($_COOKIE['user']);
}
