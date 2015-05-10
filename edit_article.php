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
    echo "<form method=\"POST\" action=\"./do_edit_article.php\"> \n";
    // article header
    echo "<div class=\"form-group\">\n";
    echo "<label>Заглавие на Статията:</label>\n";
    echo "<input  type=\"text\" id=\"artcl_hdr\" class=\"form-control\" name=\"artcl_hdr\"  value='" . $row["article_header"] . "'\>";
    echo "</div>\n";
    // article summary
    echo "<div class=\"form-group\">\n";
    echo "<label>Кратко Резюме:</label>\n";
    echo "<textarea  id=\"description\" class=\"form-control\" rows=\"5\" name=\"description\">" . $row["article_summary"] . "</textarea>\n";
    echo "</div>\n";
    // article body
    echo "<div class=\"form-group\">\n";
    echo "<label>Статия:</label>\n";
    echo "<textarea id=\"artcl_body\" class=\"form-control\" rows=\"5\" name=\"text\">" . $row["article_body"] . "</textarea>\n";
    echo "</div>\n";
    echo "<input id=\"id\" type=\"hidden\" name=\"id\" value=" . $row["article_id"] . ">";
    // submit button
    echo "<div class=\"form-group\">\n";
    echo "</div>\n";
    echo "<button id=\"eidt_article\" type=\"submit\"  class=\"btn btn-danger\">Запази Промените</button><br/><br/><br/>\n";
    echo "</form>\n";
    ?>
    <script>
        // Replace the <text area id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('artcl_body');

    </script>
</div>
<?php
require_once './includes/footer.php';
