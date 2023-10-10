<?php require_once("./config.php");
require "sql.php";
switch ($_POST['form_name']) {

    case "login_form":

        $_SESSION["error_mdp"] = "";

        if (!empty($_POST['email']) && !empty($_POST['password']))  {

            $user = get_user_by_email($_POST['email']);

            # utilisateur n'existe pas
            if ($user == false){
                $hashed_pwd = hash("sha256", $_POST['password']);
                $id_user = create_user($_POST['email'], $hashed_pwd, 0);
                $_SESSION['id_user'] = $id_user;
                $_SESSION['is_admin'] = 0;
                header("Location: /pages/pseudo.php");
                exit(0);
            } else {
                $hashed_pwd = hash("sha256", $_POST['password']);
                if ($hashed_pwd === $user["mdp"]) {
                    $_SESSION['id_user'] = $user["id"];
                    $_SESSION['is_admin'] = ($user["admin"] == "1");
                    header("Location: /index.php");
                    exit(0);
                } else {
                    $_SESSION["error_mdp"] = "le mot de passe ne correspond pas";
                    header("Location: /pages/login.php");
                    exit(0);
                }
            }

        } else {
            if (empty($_POST['password'])){
                $_SESSION["error_mdp"] = "Veuillez renseigner le mot de passe";
                header("Location: /pages/login.php");
                exit(0);
            }
            if (empty($_POST['email'])){
                $_SESSION["error_mail"] = "Veuillez renseigner un mail";
                header("Location: /pages/login.php");
                exit(0);
            }
        }
}


