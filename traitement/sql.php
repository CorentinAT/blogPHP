<?php
  if(empty($_POST) || empty($_POST['form_name'])) {
    session_unset();
    header('Location: index.php');
    exit();
  }

  function nvarticle($titre, $description, $categories, $id_user) {
    $sql = $connexion->prepare("INSERT INTO article (titre, description, id_user) VALUES (?, ?, ?)");
    $sql->execute([$titre, $description, $id_user]);
    $id_article = $connexion->lastInsertId();

    foreach($categories as $categorie) {
      $sql = $connexion->prepare("INSERT INTO lien_categorie_article (id_article, id_categorie) VALUES (?, ?)");
      $sql->execute([$id_article, $categorie]);
    }
  }

  switch($_POST['form_sql']) {
    case "nvarticle":
      nvarticle($_POST['titre'], $_POST['description'], $_SESSION['id_user'], $_POST['categories']);
  }
?>