<?php require("config.php");
#check si l'utilisateur est connecté
if(!isset($_SESSION["id_user"])) {
    header("Location: http://localhost/pages/login.php");
}
