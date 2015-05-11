<?php
require_once ("includes/header.php");
require_once './functions/list_articles.php';
?>
<div class="window">
    <?php
    if (isset($_SESSION['flasher']))
    {
        echo $_SESSION['flasher'];
    }
    ?>
    
    <h1 class="page-header"><small>Статии</small></h1>   
    <!--dispay articles-->
    <?php
    $sql = "select * from articles ORDER BY article_id DESC";
    list_full_article($sql);
    ?>
</div>
<?php
require_once ("includes/footer.php");
