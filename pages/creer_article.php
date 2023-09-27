<?php require("../structure/header.php");
require "../traitement/require_auth.php";
require_once "../traitement/config.php"; ?>

<div class="w-full flex justify-center items-center my-5">
  <div class="w-10/12 bg-grey-400 p-8 rounded-lg shadow-md flex flex-col justify-center items-center space-y-4">
    <h1 class="text-2xl md:text-3xl mb-4">Publier un nouvel article</h1>
    <?php
      if(isset($_SESSION["error_article"])){
        echo "<p class='text-red-600'>". $_SESSION["error_article"]. "</p>";
        unset($_SESSION['error_article']);
      }
    ?>
    <form method="POST" lang="fr" action="../traitement/traitement_forms.php" class="w-full">
      <div class="mb-4">
        <label for="titre" class="block text-sm md:text-base font-medium text-gray-600">Titre</label>
        <input type="text" name="titre" alt="titre article" id="titre" class="mt-1 p-2 w-full border rounded-md" autofocus required/>
      </div>
      <div class="mb-4">
        <label for="categories" class="block text-sm md:text-base font-medium text-gray-600">Catégories</label>
        <fieldset id="categories" class="flex gap-3">
          <?php
            require "../traitement/sql.php";
            $categories = get_categories();
            if($categories!==false) {
              foreach($categories as $categorie) {
                echo "<input type='checkbox' name='categories[]' value='". $categorie['id'] ."' id='". $categorie['nom'] ."' class='hidden'/>
                <label for='". $categorie['nom'] ."' class='border rounded-2xl p-2 select-none transition-all duration-200 flex justify-center items-center hover:bg-blue-100'>". $categorie['nom'] ."</label>";
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
      </div>
      <div class="mb-4">
        <label for="article" class="block text-sm md:text-base font-medium text-gray-600">Article</label>
        <textarea class="border w-full resize-none" alt="contenu article" name="description" rows="20" id="article" required></textarea>
      </div>
      <div class="flex justify-center">
        <button type="submit" name="form_name" value="nvarticle" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200">
          Publier
        </button>
      </div>
    </form>
  </div>
</div>

<?php require("../structure/footer.php"); ?>