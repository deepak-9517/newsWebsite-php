<?php include("header.php"); 
    include('db_connect.php');
    global $con;
    $sql="select * from users";
    $rs=mysqli_query($con,$sql);
    $sn=1;
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Users</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-user.php">add user</a>
              </div>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Full Name</th>
                          <th>User Name</th>
                          <th>Role</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                        <?php while($data=mysqli_fetch_assoc($rs)){?>
                          <tr>
                              <td class='id'><?=$sn++?></td>
                              <td><?php echo $data['u_fname']." ".$data['u_lname'];?></td>
                              <td><?=$data['u_user']?></td>
                              <td><?=($data['u_role']==0)? "Normal user":"Admin";?></td>
                              <td class='edit'><a href='update-user.php?id=<?=$data['u_id']?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><i class='fa fa-trash-o' onclick="alertt('Do you want to Delete...!','delete','id=<?=$data['u_id']?>&action=delete_user')"></i></td>
                          </tr>
                          <?php }?>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
  <?php include("footer.php"); ?>
