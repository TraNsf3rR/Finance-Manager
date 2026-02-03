<?php
    require base_path("views/partials/head.php");
    require base_path("views/partials/nav.php");
?>
    <div class="container mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg w-96">
        <h2 class="text-2xl font-bold mb-4 text-center">Edit a Note</h2>
            <form method="POST" action="/note">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                    <div class="mb-4">
                        <div class=""></div>
                        <label class="block text-gray-700"  for="body">Edit note</label>
                            <textarea
                                class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                id="body" 
                                name="body" 
                                rows="6" 
                                cols="40" 
                                autofocus><?= $note['body'] ?? '' ?></textarea>
                            <?php if (isset($errors['body'])) : ?>
                                <p class="text-red-500 text-sm"><?= $errors['body'] ?> </p>
                            <?php endif; ?>
                    </div>
                        <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-600 mb-2">
                        Update Note
                        </button>
            </form>
                    <a href="/notes"
                        class="block w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 text-center">
                        Cancel
                    </a>

                    <form method="POST" action="/note">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id" value="<?=  $note['id'] ?>">
                        <button type="submit" class="w-full bg-red-500 text-white py-2 rounded-lg hover:bg-red-600 mt-2">Delete</button>
                    </form>
    </div>
    <div class="bg-red"></div>
<?php
    require base_path("views/partials/footer.php");
?>
