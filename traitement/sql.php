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

  function get_articles_from_categories_and_titre_and_auteur($categories, $titre) {
    require "config.php";
    $sql = "SELECT DISTINCT a.* FROM (SELECT a.* FROM article a JOIN user u ON a.id_user=u.id WHERE LOWER(a.titre) LIKE '%".trim(strtolower($titre))."%' OR LOWER(u.pseudo) LIKE '%".trim(strtolower($titre))."%') a LEFT JOIN lien_categorie_article l ON a.id=l.id_article";
    for($i=0; $i<count($categories); $i++) {
      if($i==0) {
        $sql .= " WHERE id_categorie=".$categories[$i];
      } else {
        $sql .= " OR id_categorie=".$categories[$i];
      }
    }
    $sql .= " ORDER BY a.id DESC";
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
    $email = trim(strtolower($email));
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

function get_categorie_by_name($nom) {
  require "config.php";
  $sql = "SELECT * FROM categorie WHERE LOWER(nom) LIKE '%".trim(strtolower($nom))."%'";
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
    $email = trim(strtolower($email));
    $sql = $connexion->prepare("INSERT INTO user (email, mdp, admin) VALUES (?, ?, ?)");
    $sql->execute([$email, $hashed_password, $admin]);
    return $connexion->lastInsertId();
}

function create_categorie($categorie) {
  require "config.php";
  $sql = $connexion->prepare("INSERT INTO categorie (nom) VALUES (?)");
  $sql->execute([$categorie]);
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

function delete_categorie($id) {
  require "config.php";
  $sql = $connexion->prepare("DELETE FROM categorie WHERE id=?");
  $sql->execute([$id]);
  $sql = $connexion->prepare("DELETE FROM lien_categorie_article WHERE id_categorie=?");
  $sql->execute([$id]);
  return true;
}

?>