<?php

$to = "evgeni.vasilev0912@gmail.com";
$subject = "Съобщение от читател";

$message_head = "
<html>
<head>
    <title>HTML email</title>
        <style>
            p{
               font-family: monospace;
               font-size: 14px;
            }
       </style>
</head>
<body>";

$message_bottom = "</body></html>";
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
?>
