<?php require_once("./config.php");
require "sql.php";
switch ($_POST['form_name']) {
    # check isset email / password
    case "login_form":

        $_SESSION["error_mdp"] = "";

        if (isset($_POST['email']) && isset($_POST['password']))  {

            $user = get_user_by_email($_POST['email']);

            # utilisateur n'existe pas
            if ($user == false){
                $hashed_pwd = hash("sha256", $_POST['password']);
                $user_id = create_user($_POST['email'], $hashed_pwd, 0);
                $_SESSION['id_user'] = $user_id;
                header("Location: http://localhost/index.php");
                exit(0);
            } else {
                $hashed_pwd = hash("sha256", $_POST['password']);
                if ($hashed_pwd === $user["mdp"]) {
                    $_SESSION['id_user'] = $user["id"];
                    header("Location: http://localhost/index.php");
                    exit(0);
                } else {
                    $_SESSION["error_mdp"] = "le mot de passe ne correspond pas";
                    header("Location: http://localhost/pages/login.php");
                    exit(0);
                }
            }

        }
}


