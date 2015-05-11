<?php
require_once './includes/header.php';
require_once './functions/delete_article.php';
?>
<div class="window">
    <?php
    $id = $_GET["id"];
    $sql = "SELECT * FROM articles WHERE article_id=" . $id;
    
    // delete article
    delete_article($sql);
    ?>
</div>
<?php
require_once './includes/footer.php';

