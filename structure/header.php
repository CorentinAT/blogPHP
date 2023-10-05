<!doctype html>
<html lang="fr">
<head>
    <title><\?php blog?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen">
  <div class="w-screen flex justify-between bg-gray-100 py-2 px-4 items-center mb-4">
    <a href="/index.php"><h1 class="text-2xl"><\?php BLOG?></h1></a>
    <div class="flex gap-4">
      <a href="/pages/creer_article.php" class="text-blue-500 hover:underline">Nouvel article</a>
      <?php
        session_start();
        if(isset($_SESSION['id_user']) && $_SESSION['is_admin']==1) {
          echo "<a href='/traitement/deconnexion.php' class='text-blue-500 hover:underline'>Nouvelle catégorie</a>";
        }
        if(isset($_SESSION['id_user'])) {
          echo "<a href='/traitement/deconnexion.php' class='text-blue-500 hover:underline'>Déconnexion</a>";
        } else {
          echo "<a href='/pages/login.php' class='text-blue-500 hover:underline'>Connexion</a>";
        }
      ?>
    </div>
  </div>