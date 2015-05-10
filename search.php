<?php
require_once './includes/header.php';
require_once './functions/db.php';
?>
<div class="window">
    <h1 class="page-header"><small>Резултати от търсенето</small></h1>
    <?php if (isset($_GET['keywords']) and $_GET['keywords'] === ''): ?>
        <div onclick="this.style.display = 'none'" class="alert-warning custom-danger anim">Моля, попълнете ключова дума за търсене!<a href="#"><span class="glyphicon glyphicon-remove-circle pull-right"></span></a></div>
            <?php endif; ?>
            <?php
            $keywords = null;

            if (isset($_GET["keywords"]))
            {
                $keywords = $_GET["keywords"];
            }

            $sql = "SELECT * FROM articles WHERE MATCH (article_header, article_summary) AGAINST('" . $keywords . "' IN BOOLEAN MODE) ORDER BY MATCH (article_header, article_summary) AGAINST ('" . $keywords . "' IN BOOLEAN MODE) DESC";

            $result = $mysqli->query($sql) or die($mysqli->error);
            if ((isset($_GET['keywords']) and ! empty($_GET['keywords'])) and $result->num_rows === 0 and strpos($_SERVER["PHP_SELF"], "/search_en.php") === false)
            {
                echo "<p class=\"alert-warning\" style=\"padding: 15px; border-radius: 5px;\">Не беше намерена статия, отоваряща на зададените от Вас критерий за търсене!</p>";
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
            ?>
</div>
<?php
require_once './includes/footer.php';
