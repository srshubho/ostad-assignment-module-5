<?php
include "header.php";
?>
<div class="bg-white p-8 rounded shadow-md w-96">
    <h2 class="text-2xl font-semibold mb-4">Login</h2>
    <form action="login.php" method="post">
        <div class="mb-4">
            <label for="email" class="block text-gray-600 font-medium">Email</label>
            <input type="email" name="email" id="email" placeholder="email" value=" "
                class="border rounded px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300" required>
        </div>
        <div class="mb-6">
            <label for="password" class="block text-gray-600 font-medium">Password</label>
            <input type="password" name="password" id="password" value=""
                class="border rounded px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300"
                placeholder="password" required>
        </div>
        <div class="text-center">
            <button type="submit" name="login"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300">Login</button>
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