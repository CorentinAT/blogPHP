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
      nvarticle($_POST['titre'], $_POST['description'], $_SESSION['user_id'], $_POST['categories']);
      header("Location: ../index.php");
      exit(0);
  }
?>