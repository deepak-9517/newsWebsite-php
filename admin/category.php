<?php include "header.php"; 
include('db_connect.php');
$sql='select * from category';
$rs=mysqli_query($con,$sql) or die(mysqli_error($con));
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-category.php">add category</a>
            </div>
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Category Name</th>
                        <th>No. of Posts</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        <?php 
                        $sn=1;
                        while($data=mysqli_fetch_assoc($rs)){ ?>
                        <tr>
                            <td class='id'><?=$sn++?></td>
                            <td><?=$data['category_name']?></td>
                            <td><?=$data['category_post']?></td>
                            <td class='edit'><a href='update-category.php?edit=<?=$data['category_id']?>'><i class='fa fa-edit'></i></a></td>
                            <td class='delete'><a href='delete-category.php?del=<?=$data['category_id']?>'><i class='fa fa-trash-o'></i></a></td>
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
