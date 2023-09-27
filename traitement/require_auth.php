<?php require("config.php");
#check si l'utilisateur est connecté
if(!isset($_SESSION["user_id"])) {
    header("Location: ./login.php");
}
