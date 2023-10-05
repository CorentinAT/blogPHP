
<?php
  require("../structure/header.php");
  require("../traitement/config.php");
  require("../traitement/sql.php");

  if(!isset($_SESSION['id_user']) || $_SESSION['is_admin']==0) {
    header("Location: /index.php");
    exit(0);
  }
?>
<div class="h-full w-full flex justify-center items-center gap-7 flex-wrap">
    <div class="max-w-md w-full bg-grey-400 p-8 rounded-lg shadow-md flex flex-col justify-center items-center space-y-4">
        <h1 class="text-2xl md:text-3xl mb-4">Nouvelle catégorie</h1>
        <form method="post" lang="fr" title="categorie form" name="categorie_form" action="../traitement/traitement_forms.php" class="w-full">
            <div class="mb-4">
                <label for="categorie" class="block text-sm md:text-base font-medium text-gray-600">Nom de la catégorie :</label>
                <input id="categorie" type="text" name="categorie" alt="nom categorie" required placeholder="PHP" class="mt-1 p-2 w-full border rounded-md">
                <?php
                if(isset($_SESSION["error_pseudo"])){
                    echo "<p class='text-red-600'>". $_SESSION["error_pseudo"]. "</p>";
                    unset($_SESSION['error_pseudo']);
                }

                ?>
            </div>

            <?php
              if(isset($_SESSION["error_categorie"])){
                echo "<p class='text-red-600'>". $_SESSION["error_categorie"]. "</p>";
                unset($_SESSION['error_categorie']);
              }
            ?>

            <div class="flex justify-center">
                <button name="form_name" value="categorie_form" type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200">
                    Ajouter
                </button>
            </div>
        </form>
    </div>

    <div class="max-w-md w-full bg-grey-400 p-8 rounded-lg shadow-md flex flex-col justify-center items-center space-y-4">
        <h1 class="text-2xl md:text-3xl mb-4">Supprimer des catégories</h1>
        <form method="post" lang="fr" title="supprimer categorie form" name="supprimercate_form" action="../traitement/traitement_forms.php" class="w-full">
            
          <fieldset id="categories" class="flex flex-wrap gap-3 mb-4">
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
                  <label for='". $categorie['nom'] ."' class='border rounded-2xl p-2 select-none transition-all duration-200 flex justify-center items-center hover:bg-red-100 hover:cursor-pointer'>". $categorie['nom'] ."</label>";
                }
              } else {
                echo "<p class='text-red-500'>Erreur dans le chargement des catégories</p>";
              }
            ?>
          </fieldset>
          <style>
            #categories input:checked + label {
              background-color: rgb(248 113 113);
              color: white;
            }
          </style>

          <div class="flex justify-center">
              <button name="form_name" value="supprimercate_form" type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-700 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200">
                  Supprimer
              </button>
          </div>
        </form>
    </div>
</div>



<?php require("../structure/footer.php"); ?>