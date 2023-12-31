<?php
  require "./structure/header.php";
  require "./traitement/sql.php";
?>

<div class="flex flex-col gap-3 items-center">
  <div class="w-8/12">
    <form class="flex justify-between gap-2" method="GET" role="search" aria-label="formulaire de recherche">

        <fieldset id="categories" class="flex flex-wrap gap-3" aria-labelledby="category-label">
            <legend class="hidden" id="category-label">Categories</legend>
            <?php
            $categories = get_categories();
            if($categories!==false) {
                foreach($categories as $categorie) {
                    if(isset($_GET['categories']) && in_array($categorie['id'], $_GET['categories'])) {
                        $checked = "checked";
                    } else {
                        $checked = "";
                    }
                    echo "<input type='checkbox' name='categories[]' value='". $categorie['id'] ."' id='". $categorie['nom'] ."' class='hidden' ".$checked." aria-labelledby='category-label'/>
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
            if(isset($_GET['recherche'])) {
                $titre = $_GET['recherche'];
            } else {
                $titre = "";
            }
            ?>
            <input type="text" name="recherche" class="border w-full rounded h-fit p-2 self-center" placeholder="Auteur, titre" value="<?php echo $titre ?>" aria-label="Recherche par auteur, titre, contenu..."/>
            <button type="submit" class="border h-fit p-2 self-center rounded" aria-label="Submit button">Trier</button>
        </div>
    </form>
</div>

  <?php
    if(isset($_GET['categories']) && isset($_GET['titre'])) {
      $articles = get_articles_from_categories_and_titre_and_auteur($_GET['categories'], $_GET['recherche']);
    } else if(isset($_GET['categories'])) {
      $articles = get_articles_from_categories_and_titre_and_auteur($_GET['categories'], "");
    } else if(isset($_GET['titre'])) {
      $articles = get_articles_from_categories_and_titre_and_auteur([], $_GET['titre']);
    } else {
      $articles = get_articles();
    }
    $compteur = 0;
    foreach($articles as $article) {
      $compteur++;
      $url = "/pages/article.php?id=".$article['id'];
      echo "<a href=$url class='w-8/12 rounded border p-3 flex flex-col gap-1 hover:border-blue-500'>
        <div class='flex justify-between'>
        <h2 class='text-2xl'>".$article['titre']."</h2>";

      if(isset($_SESSION['id_user'])) {
        if($_SESSION['is_admin']=="1" || $article['id_user']==$_SESSION['id_user']) {
          echo "<form method='POST' action='./traitement/traitement_forms.php'><input type='hidden' name='id' value='".$article['id']."'/><button type='submit' name='form_name' value='supprimerarticle_form' class='text-red-500 self-end hover:underline'>Supprimer</button></form>";
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
    if($compteur===0) {
      echo "<p class='text-gray-500'>Aucun résultat</p>";
    }
  ?>
</div>

<?php require("./structure/footer.php"); ?>
