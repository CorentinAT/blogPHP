<?php require("../structure/header.php");
require "../traitement/require_auth.php";
require_once "../traitement/config.php" ?>

<div class="w-full flex justify-center items-center my-5">
  <div class="w-10/12 bg-grey-400 p-8 rounded-lg shadow-md flex flex-col justify-center items-center space-y-4">
    <h1 class="text-2xl md:text-3xl mb-4">Ajouter un nouvel article</h1>
    <form method="POST" lang="fr" title="article form" action="../traitement/traitement_forms.php" class="w-full">
      <div class="mb-4">
        <label for="titre" class="block text-sm md:text-base font-medium text-gray-600">Titre</label>
        <input type="text" name="titre" alt="titre article" id="titre" class="mt-1 p-2 w-full border rounded-md" autofocus required/>
      </div>
      <div class="mb-4">
        <label for="categories" class="block text-sm md:text-base font-medium text-gray-600">Catégories</label>
        <fieldset id="categories">
          <?php
            $sql = "SELECT * FROM categorie";
            foreach($connexion->query($sql) as $categorie) {
              echo "<label for='". $categorie['nom'] ."'>". $categorie['nom'] ."</label>
              <input type='checkbox' name='categories[]' value='". $categorie['id'] ."' id='". $categorie['nom'] ."'/>";
            }
          ?>
        </fieldset>
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