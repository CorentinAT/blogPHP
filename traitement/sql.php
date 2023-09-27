<?php
  if(empty($_POST) || empty($_POST['form_sql'])) {
    session_unset();
    header('Location: index.php');
    exit();
  }

  function nvarticle($titre, $description, $id_user) {
    require "config.php";
    $sql = $connexion->prepare("INSERT INTO article (titre, description, id_user) VALUES (?, ?, ?)");
    $sql->execute([$titre, $description, $id_user]);
    $id_article = $connexion->lastInsertId();

    // foreach($categories as $categorie) {
    //   $sql = $connexion->prepare("INSERT INTO lien_categorie_article (id_article, id_categorie) VALUES (?, ?)");
    //   $sql->execute([$id_article, $categorie]);
    // }
  }
?>