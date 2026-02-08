<?php
require base_path("views/partials/head.php");
require base_path("views/partials/nav.php");
?>
    <!-- Home Page Body -->
    <div class="container mx-auto max-w-6xl mt-6 mb-6">
        <?php if ($_SESSION['user'] ?? false)  : ?>
            <h1 class="text-3xl font-semibold mb-2">Dashboard</h1>
            <p class="text-slate-400 mb-6">
                Track spending, filter by date/category, and visualize instantly.
            </p>
        <?php else : ?>
            <h1 class="text-3xl font-bold text-center mb-4">Home Page</h1>
            <p class="text-slate-400 text-center">
                Please log in to use app.
            </p>
        <?php endif ?>
    </div>
<?php
require base_path("views/partials/footer.php");
?>
