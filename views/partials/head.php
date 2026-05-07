<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Finance Tracker App</title>
     <script src="https://cdn.tailwindcss.com"></script>
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="h-full bg-slate-900 text-slate-100 <?php if ($_SESSION['user'] ?? false) echo 'lg:ml-64'; ?>">
     <?php if ($_SESSION['user'] ?? false) require base_path('views/partials/sidebar.php'); ?>
