<?php include("header.php"); ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add User</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form  action="db_action.php" method ="POST" autocomplete="off" id="addUser" onsubmit="return alertt('Do you want to save...!','save')">
                      <div class="form-group">
                          <label>Name</label>
                          <input type="text" name="fname" class="form-control" placeholder="First Name" required/>
                      </div>
                          <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" placeholder="Last Name" required/>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="user" class="form-control" placeholder="Username" required/>
                      </div>

                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password" required/>
                      </div>
                      <div class="form-group">
                          <label>E-mail</label>
                          <input type="email" name="email" class="form-control" placeholder="E-mail" required/>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" required>
                              <option value="">Select plz</option>
                              <option value="0">Normal User</option>
                              <option value="1">Admin</option>
                          </select>
                      </div>
                      <input type="submit"  name="save" class="btn btn-primary" value="Save" required/>
                     <input type="hidden" name="action" value="Add_user"/>
                  </form>
                   <!-- Form End-->
               </div>
           </div>
       </div>
   </div>
<?php include ("footer.php"); ?>
