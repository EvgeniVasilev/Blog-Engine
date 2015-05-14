<?php

function list_full_article($sql)
{
    require_once 'db.php';
    $content = null;
    $page = null;
    $n = 5; // records per page

    if (isset($_GET['page']))
    {
        $p = $_GET['page'];
    }

    $r1 = $mysqli->query($sql) or die($mysqli->error);
    $f = $r1->fetch_row();
    $rec_count = $f[0];

    // if page is not set show first cluster of records
    if (!isset($_GET['page']))
    {
        $page = 0;
    } else {
        $page = $_GET['page'];
    }

    $records = $page * $n;

    // query to show desired number of records
    $sql_num = 'SELECT * FROM articles ORDER BY article_id DESC limit ' . $records . ", $n";
    $result = $mysqli->query($sql_num) or die($mysqli->error);
    $max = $result->num_rows;    
    // displays back link
    if ($page > 0)
    {
        $p = $page - 1;
        $content .= "<a href=\"index.php?page=$p\">";
        $content .= "Назад";
        $content .="</a>";
    }

    $page++;

    // displays link next
    if ($records + $n < $rec_count)
    {
        $content .= "<a href=\"index.php?page=$page\" class=\"pull-right\">";
        $content .="Следваща";
        $content .= "</a>";
    }

    if ($result->num_rows === 0)
    {
        echo "<p>Все още няма публикувани статий!</p>\n";
    }
    // while ($row = $result->fetch_array(MYSQLI_ASSOC))
    for ($i = 0; $i < $max; $i++)
        {
        $row = $row = $result->fetch_array(MYSQLI_ASSOC);
        echo "<b>Автор: " . 'Администратор' . "</b>\n" . "</br>\n";
        echo "<b>Заглавие: " . $row["article_header"] . "</b><br/>\n";
        echo "<b>Публикувано на: " . $row["published"] . "</b></br></br>\n";
        echo $row["article_summary"];
        echo "<br/>";
        echo "<a  href=\"full_article.php?id=" . $row["article_id"] . '"' . "\>\n";
        echo "Цялата Статия";
        echo "</a>\n";
        if (isset($_SESSION['access_lvl']) and $_SESSION['access_lvl'] = 2)
        {
            echo "| <a  href=\"./edit_article.php?id=" . $row["article_id"] . '"' . ">Редактирай</a> | \n";
            echo "<a  href=\"./delete_article.php?id=" . $row["article_id"] . '"' . "> Изтрий</a>&nbsp;&nbsp;\n";
        }
        echo "<hr/>";        
        }
        
        echo $content;
}
