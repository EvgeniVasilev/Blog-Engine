<?php

function list_full_article($sql)
{
    require_once 'db.php';

    $result = $mysqli->query($sql) or die($mysqli->error);

    if ($result->num_rows === 0)
    {
        echo "<p>Все още няма публикувани статий!</p>\n";
    }
    while ($row = $result->fetch_array(MYSQLI_ASSOC))
    {
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
}
