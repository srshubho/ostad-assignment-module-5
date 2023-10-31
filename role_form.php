<?php include 'header.php'; ?>
<div class="mt-6">
    <h2 class="text-xl font-semibold mb-2">Create New Role</h2>
    <form action="create_role.php" method="post" class="w-96">
        <div class="mb-4">
            <label for="role" class="block text-gray-600 font-medium">Role Name</label>
            <input type="text" name="role" id="role"
                class="border rounded px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300" required>
        </div>
        <div class="">
            <button type="submit" name="create_role"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300">Create
                Role</button>
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