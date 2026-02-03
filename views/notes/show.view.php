<?php
require base_path("views/partials/head.php");
require base_path("views/partials/nav.php");
?>
    <!-- Home Page Body -->
    <div class="container mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
        <h1 class="text-3xl font-bold text-center mb-4">Note page</h1>
        <p>
            <a href="/notes" class="text-blue-600 hover:underline">Back to note list</a>
        </p>
        <p class="text-gray-700 text-center">
            <?= htmlspecialchars($note['body'])?>
        </p>
        <p class="text-green-500">
            <a href="/note/edit?id=<?= $note['id'] ?>">Edit</a>
        </p>
    </div>

<?php
require base_path("views/partials/footer.php");
?>
