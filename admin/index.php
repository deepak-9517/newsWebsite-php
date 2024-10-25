<?php
// session_start();
if(isset($_SESSION['luser']))
    header("location:post.php");
?>
<!doctype html>
<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ADMIN | Login</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

        <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <div id="wrapper-admin" class="body-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <img class="logo" src="images/news.jpg">
                        <h3 class="heading">Admin</h3>
                        <!--Form Start-->
                        <form  action="login.php" method ="POST">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" value="<?php if(isset($_REQUEST['user'])) echo $_REQUEST['user']?>" placeholder="Enter Username" required id="username">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" id="password" class="form-control" 
                                value="<?php if(isset($_REQUEST['user'])) echo $_REQUEST['pwd']?>" placeholder="Enter Password" required>
                            </div>
                            <input type="button" value="Get OTP" class='btn btn-primary' onclick='get_otp()'/>
                            <div class="form-group">
                                <label style="color:red"><?php if(isset($_REQUEST['q'])){echo $_REQUEST['q'];}?></label>
                                <input type="text" name="otp" class="form-control" placeholder="Enter OTP" value="<?php if(isset($_REQUEST['otp'])) echo $_REQUEST['otp']?>" required>
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="captcha" class="form-control" placeholder="Enter captcha code" required>
                            </div>
                            <input type="submit" name="login" class="btn btn-primary" value="Login" />
                            <img src="captcha.php" alt="" style="border: 1px solid black; margin-left:150px;"/>
                            <input type="hidden" value="login_user" id="act" name="act">
                        </form>
                        <!-- /Form End -->
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
        function get_otp(){
              let v=document.getElementById('username').value;
              let pwd=document.getElementById('password').value;
              window.location=`http://localhost/news-template/admin/Mail-php/?q=${v}&p=${pwd}`;
        }
    </script>
</html>

