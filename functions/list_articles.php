<?php

function list_full_article($sql)
{
    require_once 'db.php';
    $link = null;
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
    } else
    {
        $page = $_GET['page'];
    }

    $records = $page * $n;

    // query to show desired number of records
    $sql_num = 'SELECT * FROM articles ORDER BY article_id DESC limit ' . $records . ", $n";
    $result = $mysqli->query($sql_num) or die($mysqli->error);
    $max = $result->num_rows;
    // displays back link

    $link .= "<nav>";
    $link .= "<ul class=\"pager\">";
    
    if ($page > 0)
    {
        $p = $page - 1;
        $link .= "<li class=\"previous\"><a href=\"articles.php?page=$p\" class=\"pager\"><span aria-hidden=\"true\">&larr;&nbsp;&nbsp;</span>";
        $link .= "Назад";
        $link .="</a></li>";
    }

    $page++;

//    <nav>
//    <ul class = "pager">
//    <li class = "previous"><a href = "#"><span aria-hidden = "true">&larr;
//    </span> Older</a></li>
//    <li class = "next"><a href = "#">Newer <span aria-hidden = "true">&rarr;
//    </span></a></li>
//    </ul>
//    </nav>
    // displays link next
    if ($records + $n < $rec_count)
    {
        $link .= "<li class=\"next\"><a href=\"articles.php?page=$page\" class=\"pager pull-right next\">";
        $link .="Следваща";
        $link .= "&nbsp;&nbsp;<span aria-hidden=\"true\">&rarr;</span></a></li>";
        $link .="</ul></nav>";
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

    echo $link;
}
