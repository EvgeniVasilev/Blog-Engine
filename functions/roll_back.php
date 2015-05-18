<?php

// roll back to index.php if someone
// tries to intrde urls allowed only
// for authenticated user e.g Administrator

function roll_back()
{

    if (strpos($_SERVER['PHP_SELF'], '/admin.php') !== false and ! isset($_SESSION['access_level']))
    {
        echo $_SERVER['PHP_SELF'];
        header('Location: ./index.php');
    }

    if (strpos($_SERVER['PHP_SELF'], '/image_upload.php') !== false and ! isset($_SESSION['access_level']))
    {
        echo $_SERVER['PHP_SELF'];
        header('Location: ./index.php');
    }


    if (strpos($_SERVER['PHP_SELF'], '/process_upload.php') !== false and ! isset($_SESSION['access_level']))
    {
        echo $_SERVER['PHP_SELF'];
        header('Location: ./index.php');
    }

    if (strpos($_SERVER['PHP_SELF'], '/delete_article.php') !== false and ! isset($_SESSION['access_level']))
    {
        echo $_SERVER['PHP_SELF'];
        header('Location: ./index.php');
    }

    if (strpos($_SERVER['PHP_SELF'], '/edit_article.php') !== false and ! isset($_SESSION['access_level']))
    {
        echo $_SERVER['PHP_SELF'];
        header('Location: ./index.php');
    }

    if (strpos($_SERVER['PHP_SELF'], '/full_article.php') !== false and ! isset($_GET['id']))
    {
        echo $_SERVER['PHP_SELF'];
        header('Location: ./index.php');
    }
}
