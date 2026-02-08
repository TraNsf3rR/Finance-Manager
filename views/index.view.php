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

            <!-- ADD EXPENSES -->
            <section class="rounded-2xl border border-slate-800 bg-slate-900 p-4">
                <h2 class="text-lg font-semibold mb-3">Add Expense</h2>
                <form method="POST" class="space-y-3">
                    <label class="block text-sm">
                    <span class="mb-1 block text-slate-300">Description</span>
                    <input
                        name="add_description"
                        placeholder="Groceries"
                        class="w-full rounded-xl bg-slate-800 border border-slate-700 px-3 py-2 text-slate-100">
                    </label>
                    <div class="grid grid-cols-2 gap-3">
                    <label class="block text-sm">
                        <span class="mb-1 block text-slate-300">Amount</span>
                        <input
                        name="add_amount"
                        type="number"
                        step="0.01"
                        min="0.01"
                        placeholder="25.33"
                        class="w-full rounded-xl bg-slate-800 border border-slate-700 px-3 py-2 text-slate-100">
                    </label>
                    <label class="block text-sm">
                        <span class="mb-1 block text-slate-300">Date</span>
                        <input
                        name="add_date"
                        value="<?= date("Y-d-m") ?>"
                        type="date"
                        class="w-full rounded-xl bg-slate-800 border border-slate-700 px-3 py-2 text-slate-100">
                    </label>
                    </div>
                    <label class="block text-sm">
                    <span class="mb-1 block text-slate-300">Category</span>
                    <select
                        name="add_category"
                        class="w-full rounded-xl bg-slate-800 border border-slate-700 px-3 py-2 text-slate-100">
                        <option value="Food">Food</option>
                    </select>
                    </label>
                    <button
                    class="w-full rounded-xl bg-brand/20 hover:bg-brand/30 text-brand px-4 py-2 border border-brand/30"
                    type="submit">
                    Add Expense
                    </button>
                </form>
                </section>
            </div>
        
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
