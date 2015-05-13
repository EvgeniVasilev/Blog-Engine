<?php

function delete_article($sql)
{
    require_once 'db.php';

    $result = $mysqli->query($sql) or die($mysqli->error);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    echo "<p class=\"alert-warning anim\" style=\"padding: 15px; border-radius: 5px;\">Сигурни ли сте, че желаете да изстриете: " . $row["article_header"] . " ?</p>";
    echo "</p>";
    echo "<a class=\"btn btn-danger\" href=\"./delete_article.php?id=" . $row["article_id"] . '&delete=1"' . ">Изтрий</a>&nbsp;&nbsp;\n";


    if (isset($_GET["delete"]) and $_GET["delete"] === "1")
    {
        $sql = "DELETE FROM articles Where article_id=" . $_GET['id'];
        $mysqli->query($sql) or die($this->mysqli->error);
        if ($sql)
        {
            header("Location: ./index.php");
        }
    }
}
