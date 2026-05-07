<nav>
    <header class="border-b border-slate-800 bg-slate-900/60 backdrop-blur sticky top-0 z-20 w-full">
        <div class="py-4 px-4 md:px-6 flex justify-between items-center">
            <div>
                <?php if (!($_SESSION['user'] ?? false)) : ?>
                    <h1 class="text-3xl font-bold text-slate-100">
                        <span class="text-cyan-400">Finance</span> Tracker
                    </h1>
                <?php else : ?>
                    <?php
                        $pageTitle = 'Dashboard';
                        if (urlIs('/account')) {
                            $pageTitle = 'Account';
                        } elseif (urlIs('/login')) {
                            $pageTitle = 'Login';
                        } elseif (urlIs('/register')) {
                            $pageTitle = 'Register';
                        }
                    ?>
                    <h1 class="text-3xl font-bold text-slate-100"><?= $pageTitle ?></h1>
                <?php endif; ?>
            </div>
        </div>
    </header>
</nav>
