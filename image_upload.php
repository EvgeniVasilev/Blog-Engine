<?php
require_once './includes/header.php';
require_once './functions/image_upload.php';
$url = 'images/';
?>
<div class="window">
    <h1 class="page-header">
        <small>Качване на графика</small>
    </h1>
    <form action="process_upload.php" method="post" enctype="multipart/form-data">
        <label>Моля, изберете файл за качване:</label>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <br>
        <button name="submit" class="btn btn-danger"><span class="glyphicon glyphicon-import"></span>&nbsp;Качване на Графика</button>
        <!--<input type="submit" value="Качване на Графика" name="submit" class="btn btn-danger">-->
    </form>

    <div>
        <h3>
            <small>Разрешени файлови формати: JPG, JPEG, PNG & GIF</small>
        </h3>
    </div>
    <h1>
        <small>Качени Графики</small>
    </h1>
    <div class="row box">
        <?php
        // Open a directory, and read its contents
        if (is_dir($url))
        {
            if ($dh = opendir($url))
            {
                while (($file = readdir($dh)) !== false)
                {
                    if ($file !== "." and $file != "..")
                    {
                        echo "<div class=\"col-lg-3\">";
                        echo "<img class=\"img-thumbnail\"   src='images/" . $file . "'/><br/>";
                        echo "<b>Име на Файла: </b>" . $file . "<br>";
                        echo "</div>";
                    }
                }
                closedir($dh);
            }
        }
        ?>
    </div>

</div>
<?php
require_once './includes/footer.php';
