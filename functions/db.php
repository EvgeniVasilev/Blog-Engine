<?php

try
{
    $mysqli = new mysqli('', '', '', '');
    if ($mysqli->connect_errno)
    {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
} catch (Exception $e)
{
    echo $e->getMessage();
}

