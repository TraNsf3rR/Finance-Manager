<?php
require base_path("views/partials/head.php");
require base_path("views/partials/nav.php");
?>
    <!-- Home Page Body -->
    <div class="w-full px-4 md:px-6 py-6">
        <div class="mx-auto">
        <?php if (($_SESSION['user']) ?? false)  : ?>

        <!-- Flash Message -->
        <div class="rounded-xl text-sm">
            <?php if (isset($_SESSION['errors'])) : ?>
                <p class="rounded-xl px-4 py-3 text-sm bg-rose-500/10 text-rose-300 border border-rose-400/20"><?= $_SESSION['errors'] ?></p>
            <?php elseif (isset($_SESSION['success'])) : ?>
                <p class="rounded-xl px-4 py-3 text-sm bg-emerald-500/10 text-emerald-300 border border-emerald-400/20"><?= $_SESSION['success'] ?></p>
            <?php endif; unset($_SESSION['errors'], $_SESSION['success']); ?>
        </div>

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
                    <span class="mb-1 block text-slate-300">Source</span>
                    <div class="flex gap-2">
                        <select
                            id="incomeSourceSelect"
                            name="source"
                            class="flex-1 rounded-xl bg-slate-800 border border-slate-700 px-3 py-2 text-slate-100">
                            <option value="">Select or add a source...</option>
                        </select>
                        <button
                            type="button"
                            id="addSourceBtn"
                            class="rounded-xl bg-slate-700 hover:bg-slate-600 text-slate-300 px-3 py-2 border border-slate-600 transition"
                            title="Add new income source">
                            +
                        </button>
                    </div>
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

        <!-- SEPARATOR -->
        <div class="mt-6 mb-6 border-t border-slate-700"></div>

        <!-- SHOW EXPENSES AND INCOME SIDE-BY-SIDE -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mt-4">
            <!-- SHOW EXPENSES -->
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
                                    href="/expenses/edit?id=<?= $expense['id'] ?>">EDIT</a>

                                    <form method="POST" action="/expenses" onsubmit="return confirm('Are you sure you want to delete?')">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="id" value="<?=  $expense['id'] ?>">
                                        <button class="text-rose-300 hover:text-rose-200 text-xs border border-rose-400/30 px-3 py-1 rounded-lg">
                                            Delete
                                        </button>
                                    </form>  
                                </div>
                                
                                </td>
                            </tr>
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

            <!-- SHOW INCOME -->
            <section class="rounded-2xl border border-slate-800 bg-slate-900">
                <div class="px-4 py-3 border-b border-slate-800">
                <h2 class="text-lg font-semibold">Income</h2>
                </div>
                <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="text-slate-300 bg-slate-800/50">
                    <tr>
                        <th class="text-left px-4 py-3">Date</th>
                        <th class="text-left px-4 py-3">Description</th>
                        <th class="text-left px-4 py-3">Source</th>
                        <th class="text-right px-4 py-3">Amount</th>
                        <th class="px-4 py-3"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($incomes)) : ?>

                        <?php foreach ($incomes as $income) : ?>
                            <tr class="border-t border-slate-800 hover:bg-slate-800/30">
                                <td class="px-4 py-2"><?= $income['date']; ?></td>
                                <td class="px-4 py-2"><?= $income['description']; ?></td>
                                <td class="px-4 py-2"><?= $income['source']; ?></td>
                                <td class="px-4 py-2 text-right"><?= $income['amount']; ?> €</td>
                                <td class="px-4 py-2 text-right">
                                
                                <div class="inline-flex gap-2">
                                    <a class="text-sky-300 hover:text-sky-200 text-xs border border-sky-400/30 px-3 py-1 rounded-lg" 
                                    href="/income/edit?id=<?= $income['id'] ?>">EDIT</a>

                                    <form method="POST" action="/income" onsubmit="return confirm('Are you sure you want to delete?')">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="id" value="<?=  $income['id'] ?>">
                                        <button class="text-rose-300 hover:text-rose-200 text-xs border border-rose-400/30 px-3 py-1 rounded-lg">
                                            Delete
                                        </button>
                                    </form>  
                                </div>
                                
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    
                    <?php else : ?>
                        <tr class="border-t border-slate-800 hover:bg-slate-800/30">
                            <td colspan="5" class="px-4 py-6 text-center text-slate-400">
                            No income yet — add your first one above.
                            </td>
                        </tr>
                    <?php endif ?>
                    </tbody>
                </table>
                </div>
            </section>
        </div>
        </div>
    </div>

    <!-- Add Income Source Modal -->
    <div id="addSourceModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 max-w-sm w-full mx-4">
            <h3 class="text-lg font-semibold mb-4 text-slate-100">Add New Income Source</h3>
            
            <input
                type="text"
                id="newSourceInput"
                placeholder="e.g., Freelance Work, Side Hustle, Investments"
                class="w-full rounded-xl bg-slate-800 border border-slate-700 px-3 py-2 text-slate-100 mb-4"
                maxlength="100">
            
            <div id="sourceError" class="text-rose-300 text-sm mb-4 hidden"></div>
            
            <div class="flex gap-2">
                <button
                    type="button"
                    id="cancelSourceBtn"
                    class="flex-1 rounded-xl bg-slate-700 hover:bg-slate-600 text-slate-300 px-4 py-2 border border-slate-600 transition">
                    Cancel
                </button>
                <button
                    type="button"
                    id="confirmSourceBtn"
                    class="flex-1 rounded-xl bg-brand/20 hover:bg-brand/30 text-brand px-4 py-2 border border-brand/30 transition">
                    Add Source
                </button>
            </div>
        </div>
    </div>

        <?php else : ?>
            <div class="flex flex-col items-center justify-center py-10 text-center">
                <h1 class="text-4xl font-bold mb-4 text-slate-100">Welcome to Finance Manager</h1>
                <p class="text-slate-400 mb-8 max-w-md">
                    Take control of your finances. Track your income and expenses, and gain insights into your spending habits.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="/login" class="rounded-xl bg-brand/20 hover:bg-brand/30 text-brand px-6 py-3 border border-brand/30 transition">
                        Sign In
                    </a>
                    <a href="/register" class="rounded-xl bg-slate-700 hover:bg-slate-600 text-slate-100 px-6 py-3 border border-slate-600 transition">
                        Create Account
                    </a>
                </div>
            </div>
        <?php endif ?>
<?php
require base_path("views/partials/footer.php");
?>

<script>
    // Load income sources on page load
    async function loadIncomeSources() {
        try {
            const response = await fetch('/income-sources');
            const sources = await response.json();
            const select = document.getElementById('incomeSourceSelect');
            
            // Keep the first option
            const firstOption = select.options[0];
            select.innerHTML = '';
            select.appendChild(firstOption);
            
            // Add sources from database
            sources.forEach(source => {
                const option = document.createElement('option');
                option.value = source.source_name;
                option.textContent = source.source_name;
                select.appendChild(option);
            });
        } catch (error) {
            console.error('Error loading income sources:', error);
        }
    }

    // Modal management
    const modal = document.getElementById('addSourceModal');
    const addSourceBtn = document.getElementById('addSourceBtn');
    const cancelSourceBtn = document.getElementById('cancelSourceBtn');
    const confirmSourceBtn = document.getElementById('confirmSourceBtn');
    const newSourceInput = document.getElementById('newSourceInput');
    const sourceError = document.getElementById('sourceError');
    const select = document.getElementById('incomeSourceSelect');

    // Open modal
    addSourceBtn.addEventListener('click', () => {
        modal.classList.remove('hidden');
        newSourceInput.focus();
        newSourceInput.value = '';
        sourceError.classList.add('hidden');
    });

    // Close modal
    cancelSourceBtn.addEventListener('click', () => {
        modal.classList.add('hidden');
    });

    // Close modal on outside click
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.classList.add('hidden');
        }
    });

    // Add new source
    confirmSourceBtn.addEventListener('click', async () => {
        const sourceName = newSourceInput.value.trim();
        
        if (!sourceName) {
            sourceError.textContent = 'Please enter a source name';
            sourceError.classList.remove('hidden');
            return;
        }

        try {
            const response = await fetch('/income-sources', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ source_name: sourceName })
            });

            if (response.ok) {
                const newSource = await response.json();
                
                // Add new option to select
                const option = document.createElement('option');
                option.value = newSource.source_name;
                option.textContent = newSource.source_name;
                option.selected = true;
                select.appendChild(option);
                
                // Close modal
                modal.classList.add('hidden');
                newSourceInput.value = '';
                sourceError.classList.add('hidden');
            } else if (response.status === 409) {
                sourceError.textContent = 'This income source already exists';
                sourceError.classList.remove('hidden');
            } else {
                const error = await response.json();
                sourceError.textContent = error.error || 'Error adding source';
                sourceError.classList.remove('hidden');
            }
        } catch (error) {
            sourceError.textContent = 'Error adding source: ' + error.message;
            sourceError.classList.remove('hidden');
        }
    });

    // Allow Enter key to submit
    newSourceInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            confirmSourceBtn.click();
        }
    });

    // Load sources when page loads
    document.addEventListener('DOMContentLoaded', loadIncomeSources);
</script>
