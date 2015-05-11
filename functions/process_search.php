<?php

function set_keywords()
{
    if (isset($_GET['keywords']) and $_GET['keywords'] !== '')
    {
        return $_GET['keywords'];
    }
}

function do_search($sql)
{
    require_once 'db.php';
    
    $result = $mysqli->query($sql) or die($mysqli->error);
    if ((isset($_GET['keywords']) and ! empty($_GET['keywords'])) and $result->num_rows === 0 and strpos($_SERVER["PHP_SELF"], "/search_en.php") === false)
    {
        echo "<p class=\"alert-warning anim\" style=\"padding: 15px; border-radius: 5px;\">Не беше намерена статия, отоваряща на зададените от Вас критерий за търсене!</p>";
    }
    while ($row = $result->fetch_array(MYSQLI_ASSOC))
    {
        echo "<a  href=\"full_article.php?id=" . $row["article_id"] . '"' . "\>\n";
        echo "<h3>" . $row["article_header"] . "</h3>";
        echo "</a>";
        echo "<b>Автор: " . 'Админстратор' . "</b>\n" . "</br>\n";
        echo "<b>Публикувано на: " . $row["published"] . "</b></br></br>\n";
        echo "<br/>\n";
        echo $row["article_summary"];
    }
}
