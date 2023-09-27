<?php require("config.php");

switch ($_POST['form_name']) {
    # check isset email / password
    case "login_form":
        if (isset($_POST['email']) && isset($_POST['password']))  {

            # if email exists check password hash matches and set session
            if (1 == 0){
                # tototo
            } else {
                # creation user en db
                $_SESSION['user_id'] = $_POST['email'];
                header("Location: index.php");
                exit(0);
            }

            # else create user (if user is admin@.... make him admin) and set session


        }
}
