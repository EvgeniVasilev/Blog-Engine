<?php

require_once 'edit_article.php';

$text = $_REQUEST["text"];
$id = $_REQUEST["id"];
$article_hed = $_REQUEST["artcl_hdr"];
$desc = $_REQUEST["description"];


$sql = "UPDATE articles SET "
        . "article_summary='" . $desc
        . "',article_header='" . $article_hed
        . "',article_body='" . $text
        . "' WHERE article_id=" . $id;

edit_article($sql);

