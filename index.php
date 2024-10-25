<?php include 'header.php'; 
include "admin/db_connect.php";
global $con;
$sql="select * from post left join category on post.p_category=category.category_id left join users on post.p_author=users.u_id order by post.p_id";
$rs=mysqli_query($con,$sql) or die(mysqli_error($con));
?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- post-container -->
                    <div class="post-container">
                        <?php while($data=mysqli_fetch_assoc($rs)){
                            // print_r($data);
                            ?>
                        <div class="post-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="post-img" href="single.php?id=<?=$data['p_id']?>"><img src="admin/upload/<?=$data['p_img']?>" alt=""/></a>
                                </div>
                                <div class="col-md-8">
                                    <div class="inner-content clearfix">
                                        <h3><a href='single.php?id=<?=$data['p_id']?>'><?=$data['p_title']?></a></h3>
                                        <div class="post-information">
                                            <span>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <a href='category.php'><?=$data['category_name']?></a>
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
                                        <p class="description">
                                        <?=substr($data['p_description'],0,100)."..."?>
                                        </p>
                                        <a class='read-more pull-right' href='single.php?id=<?=$data['p_id']?>'>read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div><!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
