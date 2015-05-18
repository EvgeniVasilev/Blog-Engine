<?php

function set_keywords()
{
    if (isset($_GET['keywords']) and $_GET['keywords'] !== '')
    {
        return $_GET['keywords'];
    }
}

function do_search()
{
    require_once 'db.php';
    $keywords = set_keywords();
    $link = null;
    $n = 5;
    $page = null;
    $link = '';

    // $records = $page * $n;
// this query gets all the rows containig matches
    $sql = "SELECT * FROM articles WHERE MATCH (article_header, article_summary) AGAINST('" . $keywords . "' IN BOOLEAN MODE) ORDER BY MATCH (article_header, article_summary) AGAINST ('" . $keywords . "' IN BOOLEAN MODE)";
    $r1 = $mysqli->query($sql) or die($mysqli->error);
    $f = $r1->num_rows;
    $rec_count = $f;

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
    // this query gets records according to LIMIT criteria
    $sql = "SELECT * FROM articles WHERE MATCH (article_header, article_summary) AGAINST('" . $keywords . "' IN BOOLEAN MODE) ORDER BY MATCH (article_header, article_summary) AGAINST ('" . $keywords . "' IN BOOLEAN MODE) DESC LIMIT $records,   $n";
    $result = $mysqli->query($sql) or die($mysqli->error);
    $max = $result->num_rows;
    // displays back link

    $link .= "<nav>";
    $link .= "<ul class=\"pager\">";

    if ($page > 0)
    {
        $p = $page - 1;
        $link .= "<li class=\"previous\"><a href=\"search.php?keywords=$keywords&page=$p\" class=\"pager\"><span aria-hidden=\"true\">&larr;&nbsp;&nbsp;</span>";
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
        $link .= "<li class=\"next\"><a href=\"search.php?keywords=$keywords&page=$page\" class=\"pager pull-right next\">";
        $link .="Следваща";
        $link .= "&nbsp;&nbsp;<span aria-hidden=\"true\">&rarr;</span></a></li>";
        $link .="</ul></nav>";
    }

    if ((isset($_GET['keywords']) and ! empty($_GET['keywords'])) and $result->num_rows === 0 and strpos($_SERVER["PHP_SELF"], "/search_en.php") === false)
    {
        echo "<p class=\"alert-warning anim\" style=\"padding: 15px; border-radius: 5px;\">Не беше намерена статия, отоваряща на зададените от Вас критерий за търсене!</p>";
    }

    //while ($row = $result->fetch_array(MYSQLI_ASSOC))
    for ($i = 0; $i < $max; $i++)
        {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        echo "<a  href=\"full_article.php?id=" . $row["article_id"] . '"' . "\>\n";
        echo "<h3>" . $row["article_header"] . "</h3>";
        echo "</a>";
        echo "<b>Автор: " . 'Админстратор' . "</b>\n" . "</br>\n";
        echo "<b>Публикувано на: " . $row["published"] . "</b></br></br>\n";
        echo "<br/>\n";
        echo $row["article_summary"];
        }


    echo $link;
}
