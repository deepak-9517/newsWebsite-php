<?php include("header.php"); ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form  action="db_action.php" method ="POST" autocomplete="off" id="addUser">
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat" class="form-control" placeholder="First Name" required/>
                      </div>
                      <input type="submit"  name="save" class="btn btn-primary" value="Save" required/>
                     <input type="hidden" name="action" value="add_category"/>
                  </form>
                   <!-- Form End-->
               </div>
           </div>
       </div>
   </div>
<?php include ("footer.php"); ?>
