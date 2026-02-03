<?php

require base_path("views/partials/head.php");

require base_path("views/partials/nav.php");
?>

    <!-- Create Note Page Body -->
    <div class="container mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg w-96">
        <h2 class="text-2xl font-bold mb-4 text-center">Create note</h2>
            <form method="POST">
                <div class="mb-4">
                    <label class="block text-gray-700"  for="body">Note</label>
                        <?php if (!empty($ok)) : ?>
                            <p class="text-green-400 text-sl">
                                <?= htmlspecialchars($ok) ?>
                            </p>
                        <?php endif; ?>
                        <textarea class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" id="body" name="body" rows="6" cols="40" autofocus><?= $_POST['body'] ?? '' ?></textarea>
                            <?= $_POST['body'] ?? '' ?>
                            <?= htmlspecialchars($_POST['body'] ?? '') ?>
                        <?php if (isset($errors['body'])) : ?>
                            <p class="text-red-400 text-sm">
                                <?= htmlspecialchars($errors['body']) ?> 
                            </p>
                        <?php endif; ?>
                    </div>
                    <p>
                        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Create A Note</button>
                    </p>
                </div>
            </form>
    </div>

<?php
require base_path("views/partials/footer.php");
?>
