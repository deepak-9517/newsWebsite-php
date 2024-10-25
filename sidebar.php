<?php 
// include 'header.php'; 
include "admin/db_connect.php";
global $con;
$sql="select * from post left join category on post.p_category=category.category_id left join users on post.p_author=users.u_id order by post.p_id desc limit 3";
$rs=mysqli_query($con,$sql) or die(mysqli_error($con));
?>
<div id="sidebar" class="col-md-4">
    <!-- search box -->
    <div class="search-box-container">
        <h4>Search</h4>
        <form class="search-post" action="search.php" method ="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search ..... " required>
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-danger">Search</button>
                </span>
            </div>
        </form>
    </div>
    <!-- /search box -->
    <!-- recent posts box -->
    <div class="recent-post-container">
        <h4>Recent Posts</h4>
        <?php while($data=mysqli_fetch_assoc($rs)){?>
        <div class="recent-post">
            <a class="post-img" href="single.php?id=<?=$data['p_id']?>">
                <img src="admin/upload/<?=$data['p_img']?>" alt=""/>
            </a>
            <div class="post-content">
                <h5><a href="single.php?id=<?=$data['p_id']?>"><?=$data['p_title']?></a></h5>
                <span>
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <a href='category.php'><?=$data['category_name']?></a>
                </span>
                <span>
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <?=$data['p_date']?>
                </span>
                <a class="read-more" href="single.php">read more</a>
            </div>
        </div>
        <?php } ?>
</div>
