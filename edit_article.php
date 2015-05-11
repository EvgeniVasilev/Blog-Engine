<?php
require_once './includes/header.php';
require_once './functions/edit_article.php';
?>
<div class="window">
    <?php
    $id = $_GET["id"];
    $sql = "SELECT * FROM articles WHERE article_id=" . $id;
    
    // edit article
    edit_article($sql);
    ?>
    <script>
        // Replace the <text area id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('artcl_body');

    </script>
</div>
<?php
require_once './includes/footer.php';
