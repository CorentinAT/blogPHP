<?php

  function nvarticle($titre, $description, $id_user, $categories) {
    require "config.php";
    $sql = $connexion->prepare("INSERT INTO article (titre, description, id_user) VALUES (?, ?, ?)");
    $sql->execute([$titre, $description, $id_user]);
    $id_article = $connexion->lastInsertId();

    foreach($categories as $categorie) {
      $sql = $connexion->prepare("INSERT INTO lien_categorie_article (id_article, id_categorie) VALUES (?, ?)");
      $sql->execute([$id_article, $categorie]);
    }
  }

function get_user_by_email($email) {
    require "config.php";
    $sql = $connexion->prepare("SELECT * from user where email=? LIMIT 1");
    $sql->execute([$email]);
    $row = $sql->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        return $row;
    } else {
        return false;
    }
}

function create_user($email, $hashed_password, $admin) {
    require "config.php";
    $sql = $connexion->prepare("INSERT INTO user (email, mdp, admin) VALUES (?, ?, ?)");
    $sql->execute([$email, $hashed_password, $admin]);
    return $connexion->lastInsertId();
}

?>