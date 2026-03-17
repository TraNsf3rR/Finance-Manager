<?php
require base_path("views/partials/head.php");
require base_path("views/partials/nav.php");
?>
    <!-- Home Page Body -->
    <div class="container mx-auto max-w-6xl mt-4 mb-4">
        <?php if ($_SESSION['user'] ?? false)  : ?>

        <!-- Flash Message -->
        <div class="rounded-xl text-sm">
            <?php if (isset($_SESSION['errors'])) : ?>
                <p class="rounded-xl px-4 py-3 text-sm bg-rose-500/10 text-rose-300 border border-rose-400/20"><?= $_SESSION['errors'] ?></p>
            <?php elseif (isset($_SESSION['success'])) : ?>
                <p class="rounded-xl px-4 py-3 text-sm bg-emerald-500/10 text-emerald-300 border border-emerald-400/20"><?= $_SESSION['success'] ?></p>
            <?php endif; unset($_SESSION['errors'], $_SESSION['success']); ?>
        </div>
        <h1 class="text-3xl font-semibold mb-2 mt-2">Dashboard</h1>
        
        <p class="text-slate-400 mb-4">
            Track spending, filter by date/category, and visualize instantly.
        </p>

        <!-- INCOME / EXPENSE DIV -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">

            <!-- ADD INCOME -->
            <section class="rounded-2xl border border-slate-800 bg-slate-900 p-4">
                <h2 class="text-lg font-semibold mb-3">Add Income</h2>
                <form action="/income" method="POST" class="space-y-3">
                    <label class="block text-sm">
                    <span class="mb-1 block text-slate-300">Description</span>
                    <input
                        name="description"
                        placeholder="Wage"
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
                        placeholder="25.33"
                        class="w-full rounded-xl bg-slate-800 border border-slate-700 px-3 py-2 text-slate-100">
                    </label>
                    <label class="block text-sm">
                        <span class="mb-1 block text-slate-300">Date</span>
                        <input
                        name="date"
                        value="<?= date("Y-m-d", time()) ?>"
                        type="date"
                        class="w-full rounded-xl bg-slate-800 border border-slate-700 px-3 py-2 text-slate-100">
                    </label>
                    </div>
                    <label class="block text-sm">
                    <span class="mb-1 block text-slate-300">Category</span>
                    <select
                        name="source"
                        class="w-full rounded-xl bg-slate-800 border border-slate-700 px-3 py-2 text-slate-100">
                        <option value="Current Workplace">Current Workplace</option>
                    </select>
                    </label>
                    <button
                    class="w-full rounded-xl bg-brand/20 hover:bg-brand/30 text-brand px-4 py-2 border border-brand/30"
                    type="submit">
                    Add Income
                    </button>
                </form>
            </section>

            <!-- ADD EXPENSES -->
            <section class="rounded-2xl border border-slate-800 bg-slate-900 p-4">
                <h2 class="text-lg font-semibold mb-3">Add Expense</h2>
                <form action="/expenses" method="POST" class="space-y-3">
                    <label class="block text-sm">
                    <span class="mb-1 block text-slate-300">Description</span>
                    <input
                        name="description"
                        placeholder="Groceries"
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
                        placeholder="25.33"
                        class="w-full rounded-xl bg-slate-800 border border-slate-700 px-3 py-2 text-slate-100">
                    </label>
                    <label class="block text-sm">
                        <span class="mb-1 block text-slate-300">Date</span>
                        <input
                        name="date"
                        value="<?= date("Y-m-d", time()) ?>"
                        type="date"
                        class="w-full rounded-xl bg-slate-800 border border-slate-700 px-3 py-2 text-slate-100">
                    </label>
                    </div>
                    <label class="block text-sm">
                    <span class="mb-1 block text-slate-300">Category</span>
                    <select
                        name="category"
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

        <!-- SHOW EXPENSES -->
        <div class="grid grid-cols-1 gap-4 mt-4">
            <section class="rounded-2xl border border-slate-800 bg-slate-900">
                <div class="px-4 py-3 border-b border-slate-800">
                <h2 class="text-lg font-semibold">Expenses</h2>
                </div>
                <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="text-slate-300 bg-slate-800/50">
                    <tr>
                        <th class="text-left px-4 py-3">Date</th>
                        <th class="text-left px-4 py-3">Description</th>
                        <th class="text-left px-4 py-3">Category</th>
                        <th class="text-right px-4 py-3">Amount</th>
                        <th class="px-4 py-3"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($expenses)) : ?>

                    <?php foreach ($expenses as $expense) : ?>
                        <tr class="border-t border-slate-800 hover:bg-slate-800/30">
                            <td class="px-4 py-2"><?= $expense['date']; ?></td>
                            <td class="px-4 py-2"><?= $expense['description']; ?></td>
                            <td class="px-4 py-2"><?= $expense['category']; ?></td>
                            <td class="px-4 py-2 text-right"><?= $expense['amount']; ?> €</td>
                            <td class="px-4 py-2 text-right">
                            
                            <div class="inline-flex gap-2">
                                <a class="text-sky-300 hover:text-sky-200 text-xs border border-sky-400/30 px-3 py-1 rounded-lg" 
                                href="{{url_for('edit', expense_id=e.id)}}">EDIT</a>

                                <form method="POST" action="/expenses" onsubmit="return confirm('Are you sure you want to delete?')">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="id" value="<?=  $expense['id'] ?>">
                                    <button class="text-rose-300 hover:text-rose-200 text-xs border border-rose-400/30 px-3 py-1 rounded-lg">
                                        Delete
                                    </button>
                                </form>  
                            </div>
                            
                            </td>
                        </tr
                    <?php endforeach; ?>
                    
                    <?php else : ?>
                        <tr class="border-t border-slate-800 hover:bg-slate-800/30">
                            <td colspan="5" class="px-4 py-6 text-center text-slate-400">
                            No expenses yet — add your first one above.
                            </td>
                        </tr>
                    <?php endif ?>
                    </tbody>
                </table>
                </div>
            </section>
        </div>
    </div>
        <?php else : ?>
            <h1 class="text-3xl font-bold text-center mb-4">Home Page</h1>
            <p class="text-slate-400 text-center">
                Please log in to use app.
            </p>
        <?php endif ?>
<?php
require base_path("views/partials/footer.php");
?>
