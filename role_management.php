<?php
$usersFile = 'users.json';

$users = file_exists($usersFile) ? json_decode(file_get_contents($usersFile), true) : [];
require 'header.php';
if (!$auth["role"] === "admin") {
    header("Location: 401.php");
}
?>

<div class="bg-white p-8 rounded shadow-md w-full max-w-4xl flex-col alignself-center">
    <h1 class="text-3xl font-semibold mb-6 text-center">Role Management</h1>
    <!-- Role List Table -->

    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Username</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Role</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Email</th>
                                <th scope="col"
                                    class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            <?php if (!empty($users)): ?>
                                <?php foreach ($users as $user => $value): ?>
                                    <tr>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                            <?php echo $value['username']; ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                            <?php echo $value['role']; ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                            <?php echo $user; ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a class="text-blue-500 hover:text-blue-700 mx-2"
                                                href="update_form.php?email=<?php echo $user; ?>">Update</a>
                                            <a class="text-red-500 hover:text-blue-700" href="#">Delete</a>
                                        </td>
                                    </tr>




                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Role Creation Form -->
    <div class="text-center mt-6">
        <a class="text-blue-500 hover:text-blue-700 mx-2 border border-blue-500 hover:border-blue-700 rounded px-4 py-2 "
            href="role_form.php">Add New Role</a>
    </div>
</div>
<?php require 'footer.php'; ?>