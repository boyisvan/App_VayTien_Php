<?php
    require_once(__DIR__."/config/config.php");
    require_once(__DIR__."/config/function.php");

    
    if($PNH->site('theme') != '')
    {
        header("location:".BASE_URL('Home'));
        exit();
    }
    else
    {
        header("location:".BASE_URL('Home'));
        exit();
    }
