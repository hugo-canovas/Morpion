<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
    <title>Morpion</title>
</head>
<body class="flex flex-col justify-evenly bg-slate-900 min-h-screen">
<div class="min-h-full px-6 pb-8">
    <h1 class="text-red-600 text-4xl text-center pt-12 sm:text-5xl">Morpion</h1>

<?php
    include 'connexion.php';
    include 'tableau.php';
?>
</div>
<footer class="w-full bottom-0">
    <div class="w-full text-center font-mono text-red-600">Site réalisé par <span class="text-sky-600">Hugo Canovas</span></div>
</footer>
</body>
</html>