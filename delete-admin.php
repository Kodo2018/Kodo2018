<?php
include('config/constants.php');
//get id of admin to be deted
   $id=$_GET['ID'];
//create sql to delete admin
 $sql ="DELETE FROM tbl_admin WHERE ID=$id";
//EXCUATE

$res = mysqli_query($conn,$sql);
//check if query is excuated
if($res==TRUE)
{
    //query executed and admi deleted
    echo"admin deleted";
    
}else
{
    //failed to delete admin
    echo"failed to delete admin";
}
//redirect to manage admin with amessage



?>