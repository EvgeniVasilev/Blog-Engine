<?php

// process administrator's login
if ((isset($_GET['user']) and $_GET['user'] == 'admin') and (isset($_GET['password']) and $_GET['password'] == 'admin')) {

    session_start();
    $_SESSION['access_level'] = '1';
    $_SESSION['flasher'] = null;
    header("Location: ../index.php");
}

// process administrator's logout
if (isset($_GET['action']) and $_GET['action'] === 'logout') {
    session_start();

    unset($_SESSION['access_level']);
    session_unset();
    session_destroy();
    header("Location: ../index.php");
}


// process lack administrator's credentials
if ((isset($_GET['user']) and $_GET['user'] !== 'admin') or (isset($_GET['password']) and $_GET['password'] !== 'admin')) {

    session_start();
    $_SESSION['flasher'] = "<p class=\"alert-danger custom-danger anim\">";
    $_SESSION['flasher'] .= "Моля, проверете администраторските си правомощия!";
    $_SESSION['flasher'] .= "<a href=\"functions/process_login_logout.php?action=clear\">";
    $_SESSION['flasher'] .= "<span class=\"glyphicon glyphicon-remove-circle pull-right\">";
    $_SESSION['flasher'] .= "</span></a></p>";

    unset($_SESSION['access_level']);
    header("Location: ../index.php");
}

// clear flasher
if (isset($_GET['action']) and $_GET['action'] === 'clear') {
    session_start();
    $_SESSION['flasher'] = null;
    header("Location: ../index.php");
}

