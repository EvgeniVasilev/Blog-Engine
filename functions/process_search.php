<?php

function setKeywords() {
    if(isset($_GET['keywords']) and $_GET['keywords'] !== ''){
    return $_GET['keywords'];
    }
}

