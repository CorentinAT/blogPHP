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
        nvarticle($_POST['titre'], $_POST['description'], $_SESSION['id_user'], $_POST['categories']);
        header("Location: http://localhost/index.php");
        exit(0);
      } else {
        if(empty($_POST['titre'])) {
          $_SESSION['error_article'] = "Veuillez mettre un titre";
        } else if(empty($_POST['description'])) {
          $_SESSION['error_article'] = "Veuillez entrer un article valide";
        } else {
          $_SESSION['error_article'] = "Erreur dans la publication de l'article";
        }
        header("Location: http://localhost/pages/creer_article.php");
        exit(0);
      }

    case 'pseudo_form':
        if (isset($_POST["pseudo"]) && isset($_SESSION["id_user"])) {
            set_pseudo($_SESSION["id_user"], $_POST["pseudo"]);
            header("Location: /index.php");
            exit(0);
        } else {
            $_SESSION["error_pseudo"] = "Pseudo nécessaire";
            header("Location: /pages/pseudo.php");
            exit(0);
        }
  }
?>