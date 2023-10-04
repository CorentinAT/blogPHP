<?php

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
    $sql = "SELECT * FROM article";
    $rows = $connexion->query($sql);

    if($rows) {
      return $rows;
    } else {
      return false;
    }
  }

function get_article($id) {
    require "config.php";
    $sql = $connexion->prepare("SELECT * FROM article where id = ?");
    $sql->execute([$id]);
    $row = $sql->fetch(PDO::FETCH_ASSOC);

    if($row) {
        return $row;
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

function create_user($email, $hashed_password, $admin) {
    require "config.php";
    $sql = $connexion->prepare("INSERT INTO user (email, mdp, admin) VALUES (?, ?, ?)");
    $sql->execute([$email, $hashed_password, $admin]);
    return $connexion->lastInsertId();
}

function ajout_commentaire($description, $article_id, $user_id) {
    require "config.php";
    $sql = $connexion->prepare("INSERT INTO commentaire (description, id_user, id_article) VALUES (?, ?, ?)");
    $sql->execute([$description, $user_id, $article_id]);
    return $connexion->lastInsertId();
}

function get_commentaires_article($id_article) {
    require "config.php";

    $sql = "SELECT * FROM commentaire 
            JOIN user ON commentaire.id_user = user.id 
            WHERE commentaire.id_article = ?
            ORDER BY commentaire.id desc";

    $stmt = $connexion->prepare($sql);
    $stmt->execute([$id_article]);

    $commentaires = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $commentaires;
}


function set_pseudo($user_id, $pseudo) {
    require "config.php";
    $sql = $connexion->prepare("UPDATE user set pseudo = ? where id = ?");
    $sql->execute([$pseudo, intval($user_id)]);
    return $connexion->lastInsertId();
}

?>