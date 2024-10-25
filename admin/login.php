<?php
session_start();
include('db_connect.php');
global $con;

if($_REQUEST['act']=='login_user'){
    $user=$_REQUEST['username'];
    $otp=$_REQUEST['otp'];
    if($_REQUEST['captcha']==$_SESSION['CODE'])
    login_user();
    else
    header("location:index.php?q=invalid Captcha Code try again...!&user=$user&otp=$otp&pwd='12345678'");

}

if($_REQUEST['act']=='logout'){
    logout_user();
}
function login_user(){
global $con;
$user=$_REQUEST['username'];
$otp=$_REQUEST['otp'];
$sql="select * from users where u_user='$user' and otp='$otp'";
$rs=mysqli_query($con,$sql) or die(mysqli_error($con));
$data=mysqli_fetch_assoc($rs);
if(mysqli_num_rows($rs)>0){
    $_SESSION['luser']=$user;
    $_SESSION['role']=$data['u_role'];
    $_SESSION['userid']=$data['u_id'];
    header("location:post.php?name=$user");
}else{
    header("location:index.php?q=invalid OTP try again...!&user=$user&otp=$otp&pwd='12345678'");
}
}

function logout_user(){
    global $con;
    if(isset($_SESSION['luser'])){
    $_SESSION['luser']="";
    $_SESSION['role']="";
    session_destroy();
    header("location:index.php");
    }
    }
?>