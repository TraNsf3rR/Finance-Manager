<?php

require base_path("views/partials/head.php");
require base_path("views/partials/nav.php");

?>
    <div class="flex justify-center items-center mt-6">
        <div class="text-slate-100 border border-slate-700 p-8 rounded-lg shadow-lg w-96">
        <h2 class="text-2x1 font-bold mb-6 text-center text-slate-100">Register</h2>
            <form method="POST" action="/register">
                <div class="mb-4">
                    <label class="block text-slate-100">E-mail</label>
                    <input type="text" require name="email" placeholder="Enter your e-mail!" value="<?= $_POST['email'] ?? '' ?>" class="text-black w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
                    <?php if (isset($errors['email'])) : ?>
                        <p class="text-red-400 text-sm"><?= $errors['email'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="mb-4">
                    <label class="block text-slate-100">Password</label>
                    <input type="password" require name="password" placeholder="Enter your password!" class="text-black w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
                    <?php if (isset($errors['password'])) : ?>
                        <p class="text-red-400 text-sm"><?= $errors['password'] ?></p>
                    <?php endif; ?>
                </div>
                <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-600">Register</button>
            </form>
        </div>
</div>
<?php
require base_path("views/partials/footer.php");
?>