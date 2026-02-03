<?php
require base_path("views/partials/head.php");
require base_path("views/partials/nav.php");
?>

    <!-- Login Page Body -->
    <div class="flex justify-center items-center mt-6">
        <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <h2 class="text-2x1 font-bold mb-6 text-center">Login</h2>
            <form method="POST" action="/login">
                <div class="mb-4">
                    <label class="block text-gray-700">E-mail</label>
                    <input type="text" require name="email" placeholder="Enter your e-mail!" value="<?= $_POST['email'] ?? '' ?>" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
                    <?php if (isset($errors['email'])) : ?>
                        <p class="text-red-400 text-sm"><?= $errors['email'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Password</label>
                    <input type="password" require name="password" placeholder="Enter your password!" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
                    <?php if (isset($errors['password'])) : ?>
                        <p class="text-red-400 text-sm"><?= $errors['password'] ?></p>
                    <?php endif; ?>
                </div>
                <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-600">Log In</button>
            </form>
        </div>
</div>
<?php
require base_path("views/partials/footer.php");
?>
