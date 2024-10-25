<?php
session_start();
include('db_connect.php');
//echo $_REQUEST['action'];
if ($_REQUEST['action'] == "Add_user") {
    add_users();
}

if ($_REQUEST['action'] == "delete_user") {
    delete_user();
}

if ($_REQUEST['action'] == "update_user") {
    update_user();
}
if ($_REQUEST['action'] == "add_post") {
    add_post();
}
if ($_REQUEST['action'] == "delete_post") {
    delete_post();
}
if ($_REQUEST['action'] == "add_category") {
    add_category();
}
if ($_REQUEST['action'] == "update_post") {
    update_post();
}
################################ Add user#########################

function add_users()
{
    global $con;
    $f_name = mysqli_real_escape_string($con, $_REQUEST['fname']);
    $l_name = mysqli_real_escape_string($con, $_REQUEST['lname']);
    $user = mysqli_real_escape_string($con, $_REQUEST['user']);
    $pwd = mysqli_real_escape_string($con, md5($_REQUEST['password']));
    $email = mysqli_real_escape_string($con, $_REQUEST['email']);
    $role = mysqli_real_escape_string($con, $_REQUEST['role']);
    $sql = "insert into users(u_fname,u_lname,u_user,u_pwd,u_email,u_role)
                values('$f_name','$l_name','$user','$pwd','$email','$role')";
    // echo $sql;
    // die();
    $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
    header("Location:users.php");
}

##################Delete user#########################

function delete_user()
{
    global $con;
    $id = $_REQUEST['id'];
    $sql = "delete from users where u_id=$id";
    echo $sql;
    $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
    header("Location:users.php");
}

#####################update user######################

function update_user()
{
    global $con;
    $f_name = mysqli_real_escape_string($con, $_REQUEST['f_name']);
    $l_name = mysqli_real_escape_string($con, $_REQUEST['l_name']);
    $user = mysqli_real_escape_string($con, $_REQUEST['username']);
    $role = mysqli_real_escape_string($con, $_REQUEST['role']);
    $id = $_REQUEST['id'];
    $sql = "update users set u_fname='$f_name',u_lname='$l_name',u_user='$user',u_role='$role' where u_id=$id";
    $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
    header("Location:users.php");
}

###########################Add post#########################
function add_post()
{
    global $con;
    if (isset($_FILES['fileToUpload'])) {
        $size = $_FILES['fileToUpload']['size'];
        $type = $_FILES['fileToUpload']['type'];
        $img_name = $_FILES['fileToUpload']['name'];
        $type = explode("/", $type);
        $img_type = array('png', 'jpeg', 'jpg');
        if (in_array($type[1], $img_type) && $size < 2097152) {
            move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "upload/" . $img_name);
            $t = mysqli_real_escape_string($con, $_REQUEST['post_title']);
            $des = mysqli_real_escape_string($con, $_REQUEST['postdesc']);
            $cat = mysqli_real_escape_string($con, $_REQUEST['category']);
            $author = $_SESSION['userid'];
            $date = date("d M, Y");
            $sql = "insert into post(p_description,p_title,p_category,p_date,p_author,p_img) values('$des','$t','$cat','$date','$author','$img_name');";
            $sql .= "update category set category_post=category_post+1 where category_id=$cat";
            mysqli_multi_query($con, $sql);
            header('location:post.php');
        } else {
            header("Location:add-post.php?error=Select only jpg and png file and file size only 2 mb...!");
        }
    }
}

###############################Delete post########################

function delete_post()
{
    global $con;
    $id = $_REQUEST['del'];
    $sql = "select p_img from post where p_id=$id";
    $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
    $data = mysqli_fetch_assoc($rs) or die(mysqli_error($con));
    unlink('upload/' . $data['p_img']);
    $cat = $_REQUEST['cat'];
    $sql = "delete from post where p_id=$id;";
    $sql .= "update category set category_post=category_post-1 where category_id=$cat";
    mysqli_multi_query($con,$sql) or die(mysqli_error($con));
    header("location:post.php");
    // }
}

########################## Add category#######################

function add_category(){
   global $con;
   $car=$_REQUEST['cat'];
   $sql="insert into category (category_name,category_post) values('$car',0)";
   mysqli_query($con,$sql) or die(mysqli_error($con));
   header("location:category.php");
}

#########################update post##################################

function update_post(){
    global $con;
    // if (isset($_FILES['fileToUpload'])) {
    //     $size = $_FILES['fileToUpload']['size'];
    //     $type = $_FILES['fileToUpload']['type'];
    //     $img_name = $_FILES['fileToUpload']['name'];
    //     $type = explode("/", $type);
        // $img_type = array('png', 'jpeg', 'jpg');
        // if (in_array($type[1], $img_type) && $size < 2097152) {
            // move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "upload/" . $img_name);
            $t = mysqli_real_escape_string($con, $_REQUEST['post_title']);
            $des = mysqli_real_escape_string($con, $_REQUEST['postdesc']);
            $cat = mysqli_real_escape_string($con, $_REQUEST['category']);
            // $date = date("d M, Y");
            $postid=$_REQUEST['postid'];
            echo $t;
            echo $postid;
            $sql = "update post set p_description='$des',p_title='$t',p_category=$cat where p_id=$postid";
            echo $sql;
            mysqli_query($con, $sql) or die(mysqli_error($con));
            header('location:post.php');
        // } 
    // }
}