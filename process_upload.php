<?php
require_once './includes/header.php';
require_once './functions/image_upload.php';
$url = 'images/';
echo "<div class=\"window\">";
image_upload($url);

echo "</div>";
require_once "includes/footer.php";

