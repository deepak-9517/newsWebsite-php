<?php include "header.php"; 
    include('db_connect.php');
    global $con;
    $id=$_REQUEST['id'];
    $sql="select * from users where u_id=$id";
    $rs=mysqli_query($con,$sql) or die(mysqli_error($con));
    $data=mysqli_fetch_assoc($rs);
    ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
                  <!-- Form Start -->
                  <form  action="db_action.php" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="id" value="<?=$data['u_id']?>">
                          <input type="hidden" name="action" value="update_user">
                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="f_name" class="form-control" value="<?=$data['u_fname']?>"  required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="l_name" class="form-control" value="<?=$data['u_lname']?>" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" class="form-control" value="<?=$data['u_user']?>" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" value="<?=$data['u_role']?>">
                              <option value="0">normal User</option>
                              <option value="1">Admin</option>
                          </select>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <!-- /Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
