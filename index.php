<?php
  require "./structure/header.php";
  require "./traitement/sql.php";
?>

<div class="flex flex-col gap-3 items-center">
  <div class="w-8/12">
    <form class="flex justify-between gap-2" method="GET">
      
      <fieldset id="categories" class="flex flex-wrap gap-3">
        <?php
          $categories = get_categories();
          if($categories!==false) {
            foreach($categories as $categorie) {
              if(isset($_GET['categories']) && in_array($categorie['id'], $_GET['categories'])) {
                $checked = "checked";
              } else {
                $checked = "";
              }
              echo "<input type='checkbox' name='categories[]' value='". $categorie['id'] ."' id='". $categorie['nom'] ."' class='hidden' ".$checked."/>
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
        <?php
          if(isset($_GET['titre'])) {
            $titre = $_GET['titre'];
          } else {
            $titre = "";
          }
        ?>
        <input type="text" name="titre" class="border w-full rounded h-fit p-2 self-center" placeholder="Recherche" value="<?php echo $titre ?>"/>
        <button type="submit" class="border h-fit p-2 self-center rounded">Trier</button>
      </div>
    </form>
  </div>

  <?php
    if(isset($_GET['categories']) && isset($_GET['titre'])) {
      $articles = get_articles_from_categories_and_titre($_GET['categories'], $_GET['titre']);
    } else if(isset($_GET['categories'])) {
      $articles = get_articles_from_categories_and_titre($_GET['categories'], "");
    } else if(isset($_GET['titre'])) {
      $articles = get_articles_from_categories_and_titre([], $_GET['titre']);
    } else {
      $articles = get_articles();
    }
    foreach($articles as $article) {
      $url = "/pages/article.php?id=".$article['id'];
      echo "<a href=$url class='w-8/12 rounded border p-3 flex flex-col gap-1'>
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