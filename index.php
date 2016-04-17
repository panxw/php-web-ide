<?php
    require 'checklogin.php';
    
    if(isset($_GET['act']) && $_GET['act']=='logout') {
        //setcookie('editor-auth','',time()-3600,'/editor.php');
        unset($_SESSION['username']);
        session_destroy();
        header("Location: ./login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.9, user-scalable=no">
        <title>Coder - Main Board.</title>
        <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    
    <body>
        <div style="margin:8px 2px;">
            <div style="float:left;width:8%;margin-top:20px;text-align:center">
                <div class="btn-group-vertical" role="group">
                    <input type="button" class="btn btn-default" value="Home" onclick="javascript:window.location.href='index.php'"/>
                    <input type="button" class="btn btn-default" value="Back" onclick="window.history.go(-1)"/>
                    <input type="button" class="btn btn-default" value="Foward" onclick="window.history.go(1)"/>
                </div>
                
                <br/>
                <a href="./index.php?act=logout">Exit</a>
            </div>
            <div style="float:right;width:90%">
                <iframe frameborder="0" src="./editor.php" target="_self" width="100%" height="450px"></iframe>
            </div>
        </div>
    </body>
</html>
