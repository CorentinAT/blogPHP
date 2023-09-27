<?php require("../structure/header.php"); ?>
<h1>Ajouter un nouvel article</h1>
<form method="POST" action="../traitement/sql.php">
  <label>
    Titre
    <input type="text" name="titre_article" class="border"/>
  </label>
  <label>
    Catégories
    <fieldset>
      
    </fieldset>
  </label>
  <label>
    Article
    <textarea class="border"></textarea>
  </label>
  <button type="submit" name="form_sql" value="nvarticle" class="border">Publier</button>
</form>
<?php require("../structure/footer.php"); ?>