<?php
    global $con;
    $con=mysqli_connect('localhost','root','');
    mysqli_select_db($con,'news_info') or die(mysqli_error($con));
?>