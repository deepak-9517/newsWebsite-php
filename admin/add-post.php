<?php 
include ("header.php"); 
include("function.php");
?>
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Add New Post</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  <form  action="db_action.php" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="post_title">Title</label>
                          <input type="text" name="post_title" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1"> Description</label>
                          <textarea name="postdesc" class="form-control" rows="5"  required></textarea>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Category</label>
                          <select name="category" class="form-control" required>
                          <?=get_option_value("category","category_id","category_name","0");?>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Post image</label>
                          <input type="file" name="fileToUpload" required><br>
                          <div style="color:red"><?php if(isset($_REQUEST['error'])) echo $_REQUEST['error'];?></div>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                      <input type="hidden" name="action" value="add_post"/>
                  </form>
                  <!--/Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
