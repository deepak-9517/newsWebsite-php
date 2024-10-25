<?php include 'header.php'; 
include "admin/db_connect.php";
global $con;
$id=$_REQUEST['id'];
$sql="select * from post left join category on post.p_category=category.category_id left join users on post.p_author=users.u_id where post.p_id=$id";
$rs=mysqli_query($con,$sql) or die(mysqli_error($con));
$data=mysqli_fetch_assoc($rs) or die(mysqli_error($con));
?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <!-- post-container -->
                    <div class="post-container">
                        <div class="post-content single-post">
                            <h3><?=$data['p_title']?></h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <?=$data['category_name']?>
                                </span>
                                <span>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <a href='author.php?aid=<?=$data['u_id']?>'><?=$data['u_user']?></a>
                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?=$data['p_date']?>
                                </span>
                            </div>
                            <img class="single-feature-image" src="admin/upload/<?=$data['p_img']?>" alt=""/>
                            <p class="description">
                               <?=$data['p_description']?>
                            </p>
                        </div>
                    </div>
                    <!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
