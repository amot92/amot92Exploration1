<?php
    if(!session_start()) {
        header("url = error.php");
        exit;
    }

    if(empty($_SESSION['loggedIn'])){
        echo "Error you are not logged in";
        header("refresh:3; url = loginForm.php");
        exit;
    }

    echo "This is protected content!";

?>
