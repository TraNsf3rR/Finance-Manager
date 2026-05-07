<?php
/** @var array $expense */
require base_path("views/partials/head.php");
require base_path("views/partials/nav.php");
?>
<div class="w-full px-4 md:px-6 py-6">
    <div class="mx-auto max-w-3xl">
    <section class="rounded-2xl border border-slate-800 bg-slate-900 p-6">
        <h1 class="text-3xl font-semibold mb-4">Edit Expense</h1>

        <?php if (isset($_SESSION['errors'])) : ?>
            <div class="rounded-xl px-4 py-3 mb-4 text-sm bg-rose-500/10 text-rose-300 border border-rose-400/20">
                <?= $_SESSION['errors'] ?>
            </div>
            <?php unset($_SESSION['errors']); ?>
        <?php endif; ?>

        <form method="POST" action="/expenses/update" class="space-y-4">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" value="<?= $expense['id'] ?>">

            <label class="block text-sm">
                <span class="mb-1 block text-slate-300">Description</span>
                <input
                    name="description"
                    value="<?= htmlspecialchars($expense['description']) ?>"
                    class="w-full rounded-xl bg-slate-800 border border-slate-700 px-3 py-2 text-slate-100">
            </label>

            <div class="grid grid-cols-2 gap-3">
                <label class="block text-sm">
                    <span class="mb-1 block text-slate-300">Amount</span>
                    <input
                        name="amount"
                        type="number"
                        step="0.01"
                        min="0.01"
                        value="<?= htmlspecialchars($expense['amount']) ?>"
                        class="w-full rounded-xl bg-slate-800 border border-slate-700 px-3 py-2 text-slate-100">
                </label>
                <label class="block text-sm">
                    <span class="mb-1 block text-slate-300">Date</span>
                    <input
                        name="date"
                        type="date"
                        value="<?= htmlspecialchars($expense['date']) ?>"
                        class="w-full rounded-xl bg-slate-800 border border-slate-700 px-3 py-2 text-slate-100">
                </label>
            </div>

            <label class="block text-sm">
                <span class="mb-1 block text-slate-300">Category</span>
                <input
                    name="category"
                    value="<?= htmlspecialchars($expense['category']) ?>"
                    class="w-full rounded-xl bg-slate-800 border border-slate-700 px-3 py-2 text-slate-100">
            </label>

            <div class="flex flex-col gap-3 sm:flex-row">
                <button type="submit" class="rounded-xl bg-brand/20 hover:bg-brand/30 text-brand px-4 py-2 border border-brand/30">
                    Update Expense
                </button>
                <a href="/" class="rounded-xl bg-slate-700 hover:bg-slate-600 text-slate-100 px-4 py-2 border border-slate-800 text-center">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
<?php
require base_path("views/partials/footer.php");
?>
