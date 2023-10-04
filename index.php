<?php
  require "./structure/header.php";
  require "./traitement/sql.php";
?>

<h1 class="text-2xl ">BLOG</h1>
<a href="http://localhost/pages/creer_article.php" class="text-blue-500 hover:underline">creer article</a>

<div class="flex flex-col gap-3 items-center">
  <?php
    $articles = get_articles();
    foreach($articles as $article) {
      echo "<a href='google.com' class='w-8/12 rounded border p-3'>
        <h2 class='text-2xl'>".$article['titre']."</h2>
        <p class='italic text-sm'>Par ";
        $user = get_user_by_id($article['id_user']);
        if(!empty($user['pseudo'])) {
          echo $user['pseudo'];
        } else {
          echo $user['email'];
        }
        echo "</p>
        <p class='overflow-hidden whitespace-nowrap text-ellipsis'>".$article['description']."</p>
      </a>";
    }
  ?>
</div>
<a href="/pages/creer_article.php">creer article</a>