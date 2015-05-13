<?php
require_once './includes/header.php';
require_once './functions/create_article.php';
$DESC = null;
$TEXT = null;
$ARTCL_HEADING = null;
$flag = false;

if (isset($_GET['artcl_hdr']) and ! empty($_GET['artcl_hdr']))
{
    $ARTCL_HDR = $_GET['artcl_hdr'];
}

if (isset($_GET['desc']) and ! empty($_GET['desc']))
{
    $DESC = $_GET['desc'];
    $flag = true;
}

if (isset($_GET['text']) and ! empty($_GET['text']))
{
    $TEXT = $_GET['text'];
    $flag = true;
}


if (!empty($ARTCL_HDR) and ! empty($DESC) and ! empty($TEXT))
{
$sql = ("INSERT INTO articles (article_header,article_body,article_summary, published) Values('" . $ARTCL_HDR . "', '" . $TEXT . "','" . $DESC . "', CURDATE())");
create_article($sql);


}
?>
<div class="window">
    <h1 class="page-header"><small>Администраторски панел</small></h1>
    <form class="window" action="admin.php">
        <div class="form-group">
            <label>Заглавие:</label>
            <input type="text" class="form-control" name="artcl_hdr"/>
        </div>
        <div class="form-group">
            <label>Кратко Резюме:</label>
            <textarea name="desc" class="form-control" rows="5"></textarea>
        </div>    
        <div class="form-group">
            <label>Статия:</label>
            <textarea name="text" id="text" rows="20" cols="80"></textarea>
        </div>
        <script>
            // Replace the <text area id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('text');
        </script>
        <div class="form-group">
            <input type="submit" value="Публикувай" class="btn btn-danger"/>
        </div>
    </form>
</div>
<?php
require_once './includes/footer.php';
