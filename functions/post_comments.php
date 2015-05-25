<?php
$id = $_GET['id'];
$name = $_GET['name'];
$comment = $_GET['comment'];
echo $name;

function post_comment(){
    global $id;
    global $name;
    global $comment;
    global $mysqli;

    require_once 'db.php';
    $sql = "INSERT INTO comments (article_id, uname, comment_body) VALUE('".$id."', '".$name."', '".$comment."')";
    $mysqli->query($sql);
}

post_comment();

