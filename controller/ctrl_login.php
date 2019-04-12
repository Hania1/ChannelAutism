<?php

require_once ('model/model_user.php');
require_once ('database/data.php');
$error = "";


if (isset ($_POST['code'])) {
    if ($_POST['code'] == 'signup') {
        if ($_POST ['pw1'] == $_POST ['pw2']) {
            $db = new Data ();
            if (!$db->checkIfDisplayNameExists($_POST['display'])) {
                if (!$db->checkIfEmailAddressExists($_POST['email_address'])) {
                    $hash = encrypt_password(trim($_POST['pw1']));
                    $user = $db->addNewUser($_POST['email_address'], $_POST['display'], $hash);
                    if ($user) {
                        $_SESSION ['id'] = $user;
                        $_SESSION ['display'] = $_POST ['display'];
                        $error = "Success";
                    } else {
                        $error = "A  technical issue has happened please try again later.";
                    }
                } else {
                    $error = "Email Address Already Exists";
                }

            } else {
                $error = "Display Name Exists";
            }

        } else {
            $error = "Passwords do not match";
        }
    }
    elseif ($_POST['code'] == 'login') {
        $db = new Data ();
        $user = $db->getUserByEmail($_POST['email_address']);
        if ($user) {
            if (check_password($_POST['pw'], $user[0]->pw)) {
                $_SESSION ['id'] = $user[0]->user_id;
                $_SESSION ['display'] = $user[0]->display_name;
                $error = "Success";
            } else {
                $error= "Login failed";
            }
        } else {
            $error= "Login failed";
        }
    }
}

if (isset($_GET ['code']) && $_GET ['code'] == "logout") {
    unset ($_SESSION ['id']);
    unset ($_SESSION ['display']);
    session_destroy();

    $error = "You have successfully logged out";
}




function encrypt_password ($pw) {
    return password_hash ($pw, PASSWORD_BCRYPT);
}

function check_password ($user_entered_pw, $db_hashed_pw){
    return password_verify ($user_entered_pw, $db_hashed_pw);
}


?>