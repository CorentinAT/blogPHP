<?php
  if(empty($_POST) || empty($_POST['form_name'])) {
    session_unset();
    header('Location: index.php');
    exit();
  }
?>