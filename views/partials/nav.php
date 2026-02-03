<nav class="bg-blue-500 p-4 text-white">
    <div class="container mx-auto flex justify-between items-center">
        <a href="/" class="text-xl font-bold">
            My Website <?= isset($page) ? " - {$page}" : '' ?>
        </a>
        <div class="flex items-center space-x-4">
            <div>
                <p class="text-red-800">Hello, <?= $_SESSION['user']['email'] ?? 'Guest' ?></p>
            </div>
            <ul class="flex space-x-4">
                <li><a href="/" class="hover:underline <?= urlIs('/') ? 'text-yellow-300' : ''; ?>">Home</a></li>
                <?php if ($_SESSION['user'] ?? false)  : ?>
                <li><a href="/notes" class="hover:underline <?= urlIs('/notes') ? 'text-yellow-300' : ''; ?>">Notes</a></li>
                <?php endif; ?> 
                <li><a href="/about" class="hover:underline <?= urlIs('/about') ? 'text-yellow-300' : ''; ?>">About</a></li>
                <li><a href="/contacts" class="hover:underline <?= urlIs('/contacts') ? 'text-yellow-300' : ''; ?>">Contact</a></li>
            </ul>

            <div id="authLinks" class="flex space-x-4">
                <?php if ($_SESSION['user'] ?? false)  : ?>
                    <form method="POST" action="/login">
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="bg-white text-blue-500 px-4 py-2 rounded-lg hover:bg-gray-200">Logout</button>
                    </form>
                <?php else : ?>                       
                <a href="/login" class="bg-white text-blue-500 px-4 py-2 rounded-lg hover:bg-gray-200">Login</a>
                <a href="/register" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">Register</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>
