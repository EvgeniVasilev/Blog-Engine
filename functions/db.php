<?php

try
{
    $mysqli = new mysqli('localhost', 'root', '', 'blogger');
    if ($mysqli->connect_errno)
    {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
} catch (Exception $e)
{
    echo $e->getMessage();
}

