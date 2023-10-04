<?php

  function delete_article_from_id($id) {
    require "config.php";
    $sql = $connexion->prepare("DELETE FROM article WHERE id=?");
    $sql->execute([$id]);
    return true;
  }

  function get_user_by_id($id) {
    require "config.php";
    $sql = $connexion->prepare("SELECT * FROM user WHERE id=?");
    $sql->execute([$id]);
    $row = $sql->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        return $row;
    } else {
        return false;
    }
  }

  function get_articles() {
    require "config.php";
    $sql = "SELECT * FROM article ORDER BY id DESC";
    $rows = $connexion->query($sql);

    if($rows) {
      return $rows;
    } else {
      return false;
    }
  }

  function get_articles_from_categories($categories) {
    require "config.php";
    $sql = "SELECT a.* FROM article a JOIN lien_categorie_article l ON a.id=l.id_article WHERE id_categorie=".$categories[0];
    for($i=1; $i<count($categories); $i++) {
      $sql .= " OR id_categorie=".$categories[$i];
    }
    $rows = $connexion->query($sql);

    if($rows) {
      return $rows;
    } else {
      return false;
    }
  }

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

function get_categories() {
  require "config.php";
  $sql = "SELECT * FROM categorie";
  $rows = $connexion->query($sql);

  if($rows) {
    return $rows;
  } else {
    return false;
  }
}

function get_categories_from_article($id_article) {
  require "config.php";
  $sql = "SELECT c.* FROM categorie c JOIN lien_categorie_article l ON c.id=l.id_categorie WHERE l.id_article=".$id_article;
  $rows = $connexion->query($sql);

  if($rows) {
    return $rows;
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

function set_pseudo($user_id, $pseudo) {
    require "config.php";
    $sql = $connexion->prepare("UPDATE user set pseudo = ? where id = ?");
    $sql->execute([$pseudo, intval($user_id)]);
    return $connexion->lastInsertId();
}

?>