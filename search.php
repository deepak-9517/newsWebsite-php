<?php include 'header.php'; 
include "admin/db_connect.php";
global $con;
$search=$_REQUEST['search'];
// if(isset($_REQUEST['search'])!=""){
$sql="select * from post left join category on post.p_category=category.category_id left join users on post.p_author=users.u_id where post.p_title like '%$search%' order by post.p_id";
$rs=mysqli_query($con,$sql) or die(mysqli_error($con));
?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                    <?php
                    //    global $con;
                        // $sql1="select * from category where category_id=$pid";
                        // $rs1=mysqli_query($con,$sql1) or die(mysqli_error($con));
                        // $da=mysqli_fetch_assoc($rs1) or die(mysqli_error($con));
                    ?>
                  <h2 class="page-heading"><?=$search?></h2>
                  
                  <?php while($data=mysqli_fetch_assoc($rs)){?>
                    <div class="post-content">
                        <div class="row">
                            <div class="col-md-4">
                                <a class="post-img" href="single.php?id=<?=$data['p_id']?>"><img src="admin/upload/<?=$data['p_img']?>" alt=""/></a>
                            </div>
                            <div class="col-md-8">
                                <div class="inner-content clearfix">
                                    <h3><a href='single.phpid=<?=$data['p_id']?>'><?=$data['p_title']?></a></h3>
                                    <div class="post-information">
                                        <span>
                                            <i class="fa fa-tags" aria-hidden="true"></i>
                                            <a href='category.php'><?=$data['category_name']?></a>
                                        </span>
                                        <span>
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <a href='author.php<?=$data['u_user']?>'><?=$data['u_user']?></a>
                                        </span>
                                        <span>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            <?=$data['p_date']?>
                                        </span>
                                    </div>
                                    <p class="description">
                                        <?=substr($data['p_description'],0,100)."..."?>
                                    </p>
                                    <a class='read-more pull-right' href='single.php?id=<?=$data['p_id']?>'>read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }
                        if(mysqli_num_rows($rs)==0)
                        echo '<h3 class="page-heading">Record not found</h3>';
                    ?>
                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
