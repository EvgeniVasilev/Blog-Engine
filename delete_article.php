<?php
require_once './includes/header.php';
require_once './functions/db.php';
?>
<div class="window">
    <?php
    $id = $_GET["id"];
    $sql = "SELECT * FROM articles WHERE article_id=" . $id;
    $result = $mysqli->query($sql) or die($mysqli->error);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    echo "<p class=\"alert-warning anim\" style=\"padding: 15px; border-radius: 5px;\">Сигурни ли сте, че желаете да изстриете: " . $row["article_header"] . " ?</p>";
    echo "</p>";
    echo "<a class=\"btn btn-danger\" href=\"./delete_article.php?id=" . $row["article_id"] . '&delete=1"' . ">Изтрий</a>&nbsp;&nbsp;\n";


    if (isset($_GET["delete"]) and $_GET["delete"] === "1")
    {
        $sql = "DELETE FROM articles Where article_id=" . $id;
        $mysqli->query($sql) or die($this->mysqli->error);
        if ($db)
        {
            echo "<br/>";
            echo "<br/>";
            echo "<br/>";
            echo "Статията беше изтрита!";
        }
    }
    ?>
</div>
<?php
require_once './includes/footer.php';

