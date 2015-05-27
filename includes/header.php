<?php
session_start();
ob_start();
require_once './functions/process_search.php';
require_once ('./functions/roll_back.php');
roll_back();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Блог</title>
        <meta charset="UTF-8"/>    
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="google-translate-customization" content="eac52303671044fb-9d18eb6d2e21e4f7-g03537c359ea7a35e-10"></meta>        
        <!--css-->
        <link rel="stylesheet" href="./bower_components/bootstrap/dist/css/bootstrap.css"/>
        <style type="text/css">     
            body{
                font-size: 15px;
                color:#5e5e5e;
            }
            
            .button{
                color: #5e5e5e !important;
            }

            .window{
                min-height: 550px;
            }

            #articles{
                text-align: justify !important;
            }

            .footer{
                background-color: rgb(34,34,34);
                color: white;
                min-height: 80px;
                padding: 15px 0;
            }

            .container{
                text-align: justify;
            }

            a{
                outline: none !important;
                cursor: pointer;
            }            

            .custom-danger{
                padding: 15px 10px;
                border-radius: 5px;
                cursor: pointer;
            }

            label{
                color: #777;
            }

            .anim {
                -webkit-animation: admin 1.5s;
                -moz-animation: admin 1.5s;
                animation: admin 1.5s;
                animation-iteration-count: 1;
            }
            
            .no-border{
                border: none;
                outline:none;
            }

            @-webkit-keyframes admin {
                0% {
                    opacity: 0;
                }
                100% {
                    opacity: 1;
                }
            }

            @-moz-keyframes admin {
                0% {
                    opacity: 0;
                }
                100% {
                    opacity: 1;
                }
            }

            @-o-keyframes admin {
                0% {
                    opacity: 0;
                }
                100% {
                    opacity: 1;
                }
            }

            @keyframes admin {
                0% {
                    opacity: 0;
                }
                100% {
                    opacity: 1;
                }
            }

            .error {
                -webkit-animation: error 1.5s;
                -moz-animation: error 1.5s;
                animation: error 1.5s;
                animation-iteration-count: 1;
                position: absolute;
                font-size: 12px;
                color: red;
            }

            @-webkit-keyframes error {
                0% {
                    opacity: 0;
                }
                100% {
                    opacity: 1;
                }
            }

            @-moz-keyframes error {
                0% {
                    opacity: 0;
                }
                100% {
                    opacity: 1;
                }
            }

            @-o-keyframes error {
                0% {
                    opacity: 0;
                }
                100% {
                    opacity: 1;
                }
            }

            @keyframes error {
                0% {
                    opacity: 0;
                }
                100% {
                    opacity: 1;
                }
            }

            @media screen and (min-width: 768px) and (max-width: 1024px){
                .window{
                    min-height: 1024px;
                } 
            }
        </style>
        <!--jquery javascript-->
        <script type="text/javascript" src="./bower_components/jquery/dist/jquery.js"></script>
        <!--bootstrap javascript-->
        <script type="text/javascript" src="./bower_components/bootstrap/dist/js/bootstrap.js"></script>
        <!--ck editor-->
        <script src="//cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script>
    </head>
    <body>
        <!--nav-->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home"></span> &nbsp;Оренда</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">    
						<li><a href="articles.php"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;Статии</a></li>
                        <?php if (!isset($_SESSION['access_level'])): ?>
                            <li><a href="" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;Вход Администратор</a></li>
                        <?php endif; ?>
                        <li><a href="contacts.php"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Контакти</a></li>
                        <!--reveal after login-->
                        <?php
                        if (isset($_SESSION['access_level']) and $_SESSION['access_level'] === '1'):
                            ?>
                            <li><a href="admin.php"><span class="glyphicon glyphicon-tasks"></span>&nbsp;&nbsp;Администраторски Панел</a></li>                        
                            <li><a href="image_upload.php"><span class="glyphicon glyphicon-upload"></span>&nbsp;&nbsp;Качване на Графика</a></li>                        
                            <li><a href="functions/process_login_logout.php?action=logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Изход</a></li>
                        <?php endif; ?>
                        <!--reveal after login-->

                    </ul>
                    <form class="navbar-form navbar-right" role="search" method="get" action="./search.php">
                        <div class="form-group">                           
                            <input name="keywords" type="text" class="form-control" value="<?php echo set_keywords(); ?>">
                        </div>
                        <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-search"></span>&nbsp;Търси</button>
                    </form>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!--nav-->
        <!--modals-->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">                    
                    <div class="modal-body">
                        <form  action="functions/process_login_logout.php">
                            <div class="form-group">
                                <label>Име:</label>    
                                <input name="user" type="text" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>Парола:</label>    
                                <input name="password" type="text" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Влез" class="form-control btn btn-danger"/>
                            </div>
                        </form>
                    </div>                   
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!--modals-->
        <div id="container" class="container">           
            <div class="row">
                <div class="col-lg-6">
                    <?php
                    $visibility = 'hidden';
                    if (strpos($_SERVER['PHP_SELF'], '/index.php') !== false or strpos($_SERVER['PHP_SELF'], '/full_article.php') !== false or(strpos($_SERVER['PHP_SELF'], '/articles.php') !== false))
                    {
                        $visibility = 'vsible';
                    }
                    ?>
                    <div class="<?php echo $visibility ?>">
                        <label>Размер на шрифта:</label>
                        <br/>
                        <button id="normal" class="btn btn-default button">Нормален</button>                       
                        <button id="medium" class="btn btn-default button">Среден</button>                        
                        <button  href="#" id="large" class="btn btn-default button">Голям</button>
                    </div>

                </div>
                <div class="col-lg-6">
                    <br/>
                    <div class="pull-right" id="google_translate_element"></div><script type="text/javascript">
                        function googleTranslateElementInit() {
                            new google.translate.TranslateElement({pageLanguage: 'bg', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
                        }
                    </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                </div>
            </div>
            <br/>

