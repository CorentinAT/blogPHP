<?php
  require_once("config.php");

  if(empty($_POST) || empty($_POST['form_name'])) {
    session_unset();
    header('Location: index.php');
    exit();
  }

  switch($_POST['form_name']) {
    case 'nvarticle':
      require 'sql.php';
      if(isset($_POST['titre']) && isset($_POST['description']) && isset($_SESSION['id_user'])) {
        nvarticle($_POST['titre'], $_POST['description'], $_SESSION['id_user'], $_POST['categories']);
        header("Location: http://localhost/index.php");
        exit(0);
      } else {
        $_SESSION['error_article'] = "article non valide";
        header("Location: http://localhost/pages/creer_article.php");
        exit(0);
      }
  }
?>