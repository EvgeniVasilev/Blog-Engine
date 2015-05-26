<?php

try
{
    $mysqli = new mysqli('', '', '', '');

    // Change character set to utf8
    $mysqli->set_charset("utf8");
    if ($mysqli->connect_errno)
    {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
} catch (Exception $e)
{
    echo $e->getMessage();
}

function list_comments()
{
    $comments = '';

    $comments .='<div>';
    $comments . '<div class="col-lg-12">';
    $comments .='<h2 class="page-header">';
    $comments .='<small>';
    $comments .='Кометари';
    $comments .='</small>';
    $comments .='</h2>';
    $comments .='</div>';


    echo $comments;

    get_comments();
}

function get_comments()
{
    global $mysqli;
    global $id;

    if (isset($_GET['id']))
    {
        $id = $_GET['id'];
    }

    $sql = 'SELECT * FROM comments Where article_id="' . $id . '" ORDER BY article_id DESC';
    $result = $mysqli->query($sql) or die($mysqli->error);

    if ($result->num_rows === 0)
    {
        echo "<p>Все още няма публикувани коментари!</p>\n";
        echo "<hr/>";
    }
    while ($row = $result->fetch_array(MYSQLI_ASSOC))
    {
        echo '<p><b>Потребителско име:</b>';
        echo '<br/>';
        echo $row['uname'];
        echo '</p>';
        echo '<p><b>Коментар:</b>';
        echo '<br/>';
        echo $row['comment_body'];
        echo '</p>';
        echo '<hr/>';
    }
}

list_comments();
