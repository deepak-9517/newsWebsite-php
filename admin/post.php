<?php include "header.php";
// session_start(); 
include('db_connect.php');
global $con;
$userid=$_SESSION['userid'];

if($_SESSION['role']==1){
$sql="select * from post left join category on post.p_category=category.category_id left join users on post.p_author=users.u_id order by post.p_id";
}
elseif($_SESSION['role']==0){
$sql="select * from post left join category on post.p_category=category.category_id left join users on post.p_author=users.u_id where post.p_author= {$userid} order by post.p_id";
}
$rs=mysqli_query($con,$sql) or die(mysqli_error($con));
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-post.php">add post</a>
              </div>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                        <?php 
                        $sno=1;
                        while($data=mysqli_fetch_assoc($rs)){ ?>
                          <tr>
                              <td class='id'><?=$sno++?></td>
                              <td><?=$data['p_title']?></td>
                              <td><?=$data['category_name']?></td>
                              <td><?=$data['p_date']?></td>
                              <td><?=$data['u_user']?></td>
                              <td class='edit'><a href='update-post.php?edit=<?=$data["p_id"]?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='db_action.php?del=<?=$data["p_id"]?>&action=delete_post&cat=<?=$data['p_category']?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                          <?php } ?>
                      </tbody>
                  </table>
                  <ul class='pagination admin-pagination'>
                      <li class="active"><a>1</a></li>
                      <li><a>2</a></li>
                      <li><a>3</a></li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
