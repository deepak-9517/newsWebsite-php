<?php include "header.php"; 
include('db_connect.php');
include('function.php');
global $con;
$id=$_REQUEST['edit'];
$sql="select * from post where p_id=$id";
$rs=mysqli_query($con,$sql) or die(mysqli_error($con));
$data=mysqli_fetch_assoc($rs) or die(mysqli_error($con));
?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
        <!-- Form for show edit-->
        <form action="db_action.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
                <input type="hidden" name="post_id"  class="form-control" value="1" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputTile">Title</label>
                <input type="text" name="post_title"  class="form-control" id="exampleInputUsername" value="<?=$data['p_title']?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> Description</label>
                <textarea name="postdesc" class="form-control"  required rows="5"><?=$data['p_description']?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputCategory">Category</label>
                <select class="form-control" name="category">
                <?=get_option_value('category','category_id','category_name',$data['p_category'])?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Post image</label>
                <input type="file" name="new-image">
                <img  src="upload/<?=$data['p_img']?>" height="150px" value="update_image"/>
                <input type="hidden" name="action" value="update_post">
                <input type="hidden" name="postid" value="<?=$data['p_id']?>" />
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
        <!-- Form End -->
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
