<?php

require "header.php";
if (isset($_COOKIE['user'])) {
    $auth = unserialize($_COOKIE['user']);
}
?>
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-semibold mb-6 text-center">User Profile</h1>
    <div class="bg-white p-6 rounded shadow-md">
        <div class="mb-4">
            <label for="username" class="block text-gray-600 font-medium">Username:</label>
            <span id="username" class="text-lg font-semibold">
                <?php echo $auth["username"]; ?>
            </span>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-600 font-medium">Email:</label>
            <span id="email" class="text-lg">
                <?php echo $auth["email"]; ?>
            </span>
        </div>
        <div>
            <label for="role" class="block text-gray-600 font-medium">User Role:</label>
            <span id="role" class="text-lg text-blue-500">
                <?php echo $auth["role"]; ?>
            </span>
        </div>
    </div>
</div>
</body>

</html>