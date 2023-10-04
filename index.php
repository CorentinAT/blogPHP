<?php
  require "./structure/header.php";
  require "./traitement/sql.php";
?>

<h1 class="text-2xl ">BLOG</h1>
<a href="http://localhost/pages/creer_article.php" class="text-blue-500 hover:underline">creer article</a>

<div class="flex flex-col gap-3 items-center">
  <div class="w-8/12">
    <form class="flex justify-between gap-2">
      
      <fieldset id="categories" class="flex flex-wrap gap-3">
        <?php
          $categories = get_categories();
          if($categories!==false) {
            foreach($categories as $categorie) {
              echo "<input type='checkbox' name='categories[]' value='". $categorie['id'] ."' id='". $categorie['nom'] ."' class='hidden'/>
              <label for='". $categorie['nom'] ."' class='border rounded-2xl p-2 select-none transition-all duration-200 flex justify-center items-center hover:bg-blue-100 hover:cursor-pointer'>". $categorie['nom'] ."</label>";
            }
          } else {
            echo "<p class='text-red-500'>Erreur dans le chargement des catégories</p>";
          }
        ?>
      </fieldset>
      <style>
        #categories input:checked + label {
          background-color: rgb(59 130 246);
          color: white;
        }
      </style>

      <div class="flex justify-end gap-2 w-1/2">
        <input type="text" class="border w-full rounded h-fit p-2 self-center" placeholder="Recherche"/>
        <button type="submit" class="border h-fit p-2 self-center rounded">Trier</button>
      </div>
    </form>
  </div>

  <?php
    $articles = get_articles();
    foreach($articles as $article) {
      echo "<a href='google.com' class='w-8/12 rounded border p-3 flex flex-col gap-1'>
        <div class='flex justify-between'>
        <h2 class='text-2xl'>".$article['titre']."</h2>";

      if(isset($_SESSION['id_user'])) {
        $visiteur = get_user_by_id($_SESSION['id_user']);
        if($visiteur['admin']=="1" || $article['id_user']==$visiteur['id']) {
          echo "<button class='text-red-500 self-end hover:underline'>Supprimer</button>";
        }
      }

      echo "</div><p class='italic text-sm'>Par ";
      $user = get_user_by_id($article['id_user']);
      if(!empty($user['pseudo'])) {
        echo $user['pseudo'];
      } else {
        echo $user['email'];
      }
      echo "</p>
        <p class='overflow-hidden whitespace-nowrap text-ellipsis'>".$article['description']."</p>";

      $categories = get_categories_from_article($article['id']);
      if($categories!==false) {
        echo "<div class='flex gap-1'>";
        foreach($categories as $categorie) {
          echo "<div class='border text-sm w-fit p-1 rounded'>".$categorie['nom']."</div>";
        }
        echo "</div>";
      }

      echo "</a>";
    }
  ?>
</div>
<a href="/pages/creer_article.php">creer article</a>