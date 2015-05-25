<?php

function list_comments()
{
    $comments = '';
    $comments .='<div class="row">';
    $comments . '<div class="col-lg-12">';
    $comments .='<h2 class="page-header">';
    $comments .='<small>';
    $comments .='Кометари';
    $comments .='</smalll>';
    $comments .='</h2>';
    $comments .='</div>';
    $comments .='</div>';
    
    echo $comments;
}
