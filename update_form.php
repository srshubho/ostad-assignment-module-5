<?php
include "header.php";
if (isset($_GET['email'])) {
    $email = $_GET['email'];
}
roleCheck();
?>


<div class="bg-white p-8 rounded shadow-md w-96">
    <h2 class="text-2xl font-semibold mb-4">Update User Role</h2>
    <form action="update_role.php" method="post">

        <div class="mb-6">
            <label for="role" class="block text-gray-600 font-medium">Role</label>
            <select id="role" name="role"
                class="border rounded px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
                <option value="admin">Admin</option>
                <option value="manager">Manager</option>
                <option value="user">User</option>
            </select>
            <input type="hidden" name="email" value="<?php echo $email; ?>">
        </div>
        <div>
            <button type="submit" name="update_role"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300">Update</button>
        </div>
        <?php if (!empty($errors)): ?>
            <div class="text-red-500 mt-2">
                <?php foreach ($errors as $error): ?>
                    <p>
                        <?php echo $error; ?>
                    </p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </form>
</div>
<?php
include "footer.php";
?>