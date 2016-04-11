<?php
session_set_cookie_params(5*60);//session_start之前设置超时为5分钟
session_start();//sessonn_start之前，browser不能有任何输出

if(!isset($_POST['username']) && !isset($_POST['password'])) {
    //not login 
}else if(!isset($_POST['username']) || !isset($_POST['password'])) {
    echo '<script>alert(\'account info could not be empty!\');</script>';
}else {
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    require('./consts.php');
    if($username==USERNAME && $password==PASSWORD) {
        $_SESSION['username']=$username;
        header("Location: ./index.php");
        exit;
    }else {
        echo '<script>alert(\'password dismatch!\');</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>Account Login</title>
        
        <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="//cdn.bootcss.com/jquery/2.2.1/jquery.min.js"></script>
        <script src="./md5.js"></script>
        
        <script type="text/javascript">
            $(document).ready(function(){
                $("#login").click(function(){
                    var username=$("#username").val();
                    if(!username) {
                        alert("username can't be empty!");
                        return;
                    }
                    var password=$("#password").val();
                    if(!password) {
                        alert("password can't be empty!");
                        return;
                    }
                    $("#password").val(md5(password));
                    $("#form").submit();
                });
            });
        </script>
    </head>
    
    <body>
        
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="text-align:center">
                    <h3>Account Login</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4"  style="background-color: #dedef8;padding:15px">
                    <form method="post" id="form" action="./login.php">
                        <div class="form-group">
                            <label>UserName</label><input class="form-control" type="text" placeholder="username" id="username" name="username"/>
                        </div>
                        <div class="form-group">
                            <label>PassWord</label><input class="form-control" type="password" placeholder="password" id="password" name="password"/>
                        </div>
                        <div class="row" style="text-align:center">
                            <input class="btn btn-default" type="button" id="login" value="Login"/>  
                            <input class="btn btn-default" type="reset" value="Clear"/>
                        </div>
                    </form> 
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </body>
</html>

