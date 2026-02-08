<nav>
    <header class="border-b border-slate-800 bg-slate-900/60 backdrop-blur">
        <div class="py-4 container mx-auto max-w-6xl flex justify-between items-center">
            <a href="/" class="text-xl font-bold">
                <span class="text-cyan-400">Finance</span> Tracker
                <span class="text-slate-400">App</span>
                <?= isset($page) ? " - {$page}" : '' ?>
            </a>
            <div class="flex items-center space-x-4">
                <div>
                    <p class="text-slate-100"><?= $_SESSION['user']['email'] ?? '' ?></p>
                </div>
                <ul class="flex space-x-4">
                    <?php if ($_SESSION['user'] ?? false) : ?>
                    <li><a href="/" class="hover:bg-slate-700 <?= urlIs('/') ? 'bg-slate-700' : 'bg-slate-800'; ?> w-full rounded-xl  border border-slate-700 px-3 py-2 text-slate-100">Homepage</a></li>
                    <li><a href="/account" class="hover:bg-slate-700 <?= urlIs('/account') ? 'bg-slate-700' : 'bg-slate-800'; ?> w-full rounded-xl bg-slate-800 border border-slate-700 px-3 py-2 text-slate-100">Account</a></li>
                    <?php endif; ?>
                </ul>
                <div id="authLinks" class="flex space-x-4">
                    <?php if ($_SESSION['user'] ?? false)  : ?>
                        <form method="POST" action="/login">
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="bg-red-950 w-full rounded-xl  border border-slate-700 px-3 py-2 text-slate-100 hover:bg-red-900">Logout</button>
                        </form>
                    <?php else : ?>
                    <a href="/login" class="hover:bg-slate-700 <?= urlIs('/login') ? 'bg-slate-700' : 'bg-slate-800'; ?> w-full rounded-xl  border border-slate-700 px-3 py-2 text-slate-100">Login</a>
                    <a href="/register" class="hover:bg-green-900 <?= urlIs('/register') ? 'bg-green-900' : 'bg-green-950'; ?> w-full rounded-xl  border border-slate-700 px-3 py-2 text-slate-100 ">Register</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>
</nav>