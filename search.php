<?php
require_once './includes/header.php';
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
            // make query to database 
            $sql = "SELECT * FROM articles WHERE MATCH (article_header, article_summary) AGAINST('" . $keywords . "' IN BOOLEAN MODE) ORDER BY MATCH (article_header, article_summary) AGAINST ('" . $keywords . "' IN BOOLEAN MODE) DESC";
            // proces search 
            do_search($sql);
            ?>
</div>
<?php
require_once './includes/footer.php';
