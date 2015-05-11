<?php
// checks if name is set and keeps if it is so
function setNameValue()
{

    if (isset($_GET['name']) and ! empty($_GET['name']))
    {
        $nvalue = $_GET['name'];
        return $nvalue;
    }
}

// checks if e-mail is set and keeps if it is so
function setEmailValue()
{
    if (isset($_GET['e-mail']) and filter_var($_GET['e-mail'], FILTER_VALIDATE_EMAIL))
    {
        $evalue = $_GET['e-mail'];
        return $evalue;
    }
}

// checks if message is set and keeps if it is so
function setMessageValue()
{
    if (isset($_GET['message']) and ! empty($_GET['message']))
    {
        $message = $_GET['message'];
        return $message;
    }
}

function mailMe()
{
    
    require_once './resources/mail_tmpl.php';

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


    $nvalue = "";
    $message = '';
    $evalue = "";


    if (isset($_GET['name']) and ! empty($_GET['name']))
    {
        $nvalue = $_GET['name'];
    } else
    {        
        return;
    }

    if (isset($_GET['message']) and ! empty($_GET['message']))
    {
        $message = str_replace("\n.", "\n..", $_GET['message']);
    } else
    {
        return;
    }

    if (isset($_GET['e-mail']) and filter_var($_GET['e-mail'], FILTER_VALIDATE_EMAIL))
    {
        $evalue = $_GET['e-mail'];
    } else
    {
        return;
    }

    $body = $message_head . "<p>Име: $nvalue</p><p>Съобщение: $message</p><p>И-мейл: $evalue</p>" . $message_bottom;

    $mails = mail($to, $subject, $body, $headers);
    if ($mails)
    {       
        header("Location:../contacts.php");
    }
}
mailMe();