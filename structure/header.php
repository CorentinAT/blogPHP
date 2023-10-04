<!doctype html>
<html lang="fr">
<head>
    <title><\?php blog?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen">
  <div class="w-screen flex justify-between bg-gray-100 p-2 items-center mb-4">
    <h1 class="text-2xl"><\?php BLOG?></h1>
    <div>
      <a href="/pages/creer_article.php" class="text-blue-500 hover:underline">creer article</a>
      <?php
        session_start();
        if(isset($_SESSION['id_user'])) {
          echo "<a class='text-blue-500 hover:underline'>Déconnexion</a>";
        } else {
          echo "<a class='text-blue-500 hover:underline'>Connexion</a>";
        }
      ?>
    </div>
  </div>