<?php
$isActive = function($path) {
    return $_SERVER['REQUEST_URI'] === $path ? 'bg-slate-700 border-l-4 border-cyan-400' : '';
};
?>

<!-- Sidebar -->
<div id="sidebar" class="fixed inset-y-0 left-0 z-40 w-64 bg-slate-900 border-r border-slate-800 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out overflow-y-auto">
    <!-- Sidebar Header -->
    <div class="p-4 border-b border-slate-800">
        <h2 class="text-xl font-bold">
            <span class="text-cyan-400">Finance</span> Tracker
        </h2>
        <p class="text-xs text-slate-400 mt-1"><?= $_SESSION['user']['email'] ?? '' ?></p>
    </div>

    <!-- Sidebar Navigation -->
    <nav class="p-4 space-y-2">
        <!-- Dashboard Tab -->
        <a href="/" class="block px-4 py-3 rounded-lg text-slate-100 hover:bg-slate-800 transition <?= $isActive('/') ?>">
            <svg class="inline-block w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 16l9-5V9m-9 16L3 14m9 5v-5m9-10L9 4"></path>
            </svg>
            Dashboard
        </a>

        <!-- Account Tab -->
        <a href="/account" class="block px-4 py-3 rounded-lg text-slate-100 hover:bg-slate-800 transition <?= $isActive('/account') ?>">
            <svg class="inline-block w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            Account
        </a>

        <!-- Divider -->
        <div class="my-4 border-t border-slate-700"></div>

        <!-- Logout -->
        <?php if ($_SESSION['user'] ?? false) : ?>
            <form method="POST" action="/login">
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="w-full text-left px-4 py-3 rounded-lg text-red-400 hover:bg-red-950/30 transition">
                    <svg class="inline-block w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    Logout
                </button>
            </form>
        <?php endif; ?>
    </nav>
</div>

<!-- Sidebar Overlay (Mobile) -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-30 hidden lg:hidden" onclick="toggleSidebar()"></div>

<!-- Sidebar Toggle Button -->
<button id="sidebarToggle" onclick="toggleSidebar()" class="fixed top-4 left-4 z-50 lg:hidden p-2 rounded-lg bg-slate-800 hover:bg-slate-700 border border-slate-700">
    <svg id="hamburgerIcon" class="w-6 h-6 text-slate-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
    </svg>
</button>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        
        sidebar.classList.toggle('-translate-x-full');
        overlay.classList.toggle('hidden');
        
        // Persist sidebar state
        const isOpen = !sidebar.classList.contains('-translate-x-full');
        localStorage.setItem('sidebarOpen', isOpen);
    }

    // Restore sidebar state on page load
    window.addEventListener('load', () => {
        const sidebar = document.getElementById('sidebar');
        const isOpen = localStorage.getItem('sidebarOpen') === 'true';
        
        // On mobile, keep sidebar hidden by default unless explicitly opened
        const isMobile = window.innerWidth < 1024;
        if (!isMobile && isOpen) {
            sidebar.classList.remove('-translate-x-full');
        }
    });

    // Close sidebar when clicking on a link (mobile)
    document.addEventListener('click', (e) => {
        const sidebar = document.getElementById('sidebar');
        const toggle = document.getElementById('sidebarToggle');
        
        if (e.target.closest('nav a') && window.innerWidth < 1024) {
            sidebar.classList.add('-translate-x-full');
            document.getElementById('sidebarOverlay').classList.add('hidden');
            localStorage.setItem('sidebarOpen', false);
        }
    });
</script>
