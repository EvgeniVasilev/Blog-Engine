<?php

function create_article($sql)
{
    require_once ("db.php");

    $mysqli->query($sql) or die($this->mysqli->error);
    header("Location: ./index.php");
}

;

