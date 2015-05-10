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
    echo "<div id=\"articles\">";
    echo "<h3>" . $row["article_header"] . "</h3>\n";
    echo "<b>Автор: " . 'Администратор' . "</b>\n" . "</br>\n";
    echo "<b>Публикувано на: " . $row["published"] . "</b></br></br>\n";
    echo $row["article_body"];
    echo "<br/>\n";
    if (isset($_SESSION['access_level']) and $_SESSION['access_level'] === '1')
    {
        echo "<a href=\"./edit_article.php?id=" . $row["article_id"] . '"' . ">Редактирай</a>&nbsp;&nbsp;\n";
        echo "<a  href=\"./delete_article.php?id=" . $row["article_id"] . '"' . ">Изтрий</a>&nbsp;&nbsp;\n";
        echo "<br/><br/>\n";
    }
    echo "</div>";
    ?>
</div>
<?php
require_once './includes/footer.php';
