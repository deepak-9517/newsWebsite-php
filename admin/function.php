<?php
    include("db_connect.php");
    function get_option_value($table,$col_id,$col_name,$sel){
        global $con;
        $sql="select *from $table order by $col_id";
        //echo $sql;
        $option_list="<option value='0'>Plz select</option>";
        $rs=mysqli_query($con,$sql) or die(mysqli_error($con));
        while($data=mysqli_fetch_assoc($rs)){
          if($data[$col_id]==$sel)
               $option_list.="<option value='$data[$col_id]' selected>$data[$col_name]</option>";
            else
             $option_list.="<option value='$data[$col_id]'>$data[$col_name]</option>";
        }
        return $option_list;
        }

?>