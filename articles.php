<?php
require_once ("includes/header.php");
require_once './functions/list_articles.php';
?>
<div class="window">
    <h1 class="page-header"><small>Статии</small></h1>   
    <div id="articles">
        <!--dispay articles-->
        <?php
        $sql = "select count(*) as records from articles";
        list_full_article($sql);
        ?>
    </div>
</div>
<?php
require_once ("includes/footer.php");
