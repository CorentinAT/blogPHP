<?php
  require_once("config.php");
  require 'sql.php';

  if(empty($_POST) || empty($_POST['form_name'])) {
    session_unset();
    header('Location: index.php');
    exit();
  }

  switch($_POST['form_name']) {
    case 'nvarticle':

      if(!empty($_POST['titre']) && !empty($_POST['description']) && isset($_SESSION['id_user'])) {
        if(!isset($_POST['categories'])) {
          nvarticle($_POST['titre'], $_POST['description'], $_SESSION['id_user'], []);
        } else {
          nvarticle($_POST['titre'], $_POST['description'], $_SESSION['id_user'], $_POST['categories']);
        }
        header("Location: /index.php");
        exit(0);
      } else {
        if(empty($_POST['titre'])) {
          $_SESSION['error_article'] = "Veuillez mettre un titre";
        } else if(empty($_POST['description'])) {
          $_SESSION['error_article'] = "Veuillez entrer un article valide";
        } else {
          $_SESSION['error_article'] = "Erreur dans la publication de l'article";
        }
        header("Location: /pages/creer_article.php");
        exit(0);
      }

    case 'pseudo_form':
        if (isset($_POST["pseudo"]) && isset($_SESSION["id_user"])) {
            set_pseudo($_SESSION["id_user"], $_POST["pseudo"]);
            header("Location: /index.php");
            exit(0);
        } else {
            header("Location: /index.php");
            exit(0);
        }

    case 'commentaire_form':
      if (isset($_POST['commentaire']) && isset($_SESSION['id_user']) && isset($_SESSION["id_article"])) {
          $id = $_SESSION["id_article"];
          unset($_SESSION["id_article"]);
          ajout_commentaire($_POST['commentaire'], $id, $_SESSION['id_user']);
          header('Location: /pages/article.php?id=' . $id);
          exit(0);
      }
    
    case 'categorie_form':
      if(isset($_SESSION['id_user']) && $_SESSION['is_admin']==1 && isset($_POST['categorie'])) {
        if(trim($_POST['categorie'])!=="") {
          $compteur = 0;
          $categories = get_categorie_by_name($_POST['categorie']);
          foreach($categories as $categorie) {
            $compteur++;
          }
          if($compteur===0) {
            create_categorie(trim($_POST['categorie']));
          } else {
            $_SESSION['error_categorie'] = "La catégorie existe déjà";
          }
        } else {
          $_SESSION['error_categorie'] = "Veuillez entrer une catégorie";
        }
        header('Location: /pages/admin.php');
        exit(0);
      }
      header('Location: /index.php');
      exit(0);

    case 'supprimercate_form':
      if(isset($_SESSION['id_user']) && $_SESSION['is_admin']==1 && isset($_POST['categories'])) {
        foreach($_POST['categories'] as $categorie) {
          delete_categorie($categorie);
        }
        header('Location: /pages/admin.php');
        exit(0);
      }
      header('Location: /index.php');
      exit(0);
  }
?>