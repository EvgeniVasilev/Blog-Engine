<?php

function image_upload($url)
{
    $fileExists = null;
    $target_dir = $url;
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
    if (isset($_POST["submit"]) and isset($_REQUEST["fileToUpload"]) and ! empty($_REQUEST["fileToUpload"]))
    {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false)
        {
            $uploadOk = 1;
        } else
        {
            $uploadOk = 0;
        }
    }

// Check if file already exists
    if (file_exists($target_file))
    {
        $uploadOk = 0;
        $fileExists = 1;
    }
// Check file size
    if ($_FILES["fileToUpload"]["size"] > 700000)
    {
        echo "<div class=\"alert-warning  anim custom-danger\">";
        echo "Внимание! Файлът е твърде голям!.";
        echo "</div><br/>";
        $uploadOk = 0;
    }

    if (!isset($_REQUEST["fileToUpload"]) and $_FILES["fileToUpload"]["size"] < 100)
    {
        echo "<div class=\"alert-warning  anim custom-danger\">";
        echo "Моля, изберете файл!";
        echo "</div>";
        $uploadOk = 0;
        return;
    }
// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"
    )
    {
        echo "<div class=\"alert-warning  anim custom-danger\">";
        echo "Само  JPG, JPEG, PNG & GIF фйлове са позволени за качване!<br/>";
        echo "</div>";
        echo "<br/>";
        echo "<div class=\"alert-warning  anim custom-danger\">";
        echo "Файлът не беше Качен!";
        echo "</div>";
        $uploadOk = 0;
        return;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0 and $fileExists == 1)
    {
        echo "<div class=\"alert-warning  anim custom-danger\">";
        echo "Файлът вече съществува!<br/>";
        echo "Файлът не беше Качен!";
        echo "</div>";
// if everything is ok, try to upload file
    } else
    {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
        {
            echo "<div class=\"alert-warning  anim custom-danger\">";
            echo "Файлът " . basename($_FILES["fileToUpload"]["name"]) . " беше качен.";
            echo "</div>";
        }
    }
}
