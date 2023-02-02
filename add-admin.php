<?php include('PATIALS/menu.php');?>


  <div class="main">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <?php 
        if(isset($_SESSION['add'])){

          echo $_SESSION['add'];
          unset($_SESSION['add']);
        }
        
        ?>
        <br> 
          <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>FULL NAME:</td>
                    <td><input type="text" name="FULL_NAME"placeholder="ENTER FULL NAME"></td>
                </tr>

                <tr>
                    <td>USERNAME:</td>
                    <td><input type="text" name="USERNAME"placeholder="ENTER USERNAME"></td>
                </tr>

                <tr>
                    <td>PASSWORD:</td>
                    <td><input type="password" name="PASSWORD"placeholder="ENTER PASSWORD"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add admin" class="btn-secondary">
                    </td>
                   
                </tr>
            </table>



          </form>
    </div>
  </div>
<?php include('PATIALS/footer.php');?>

<?php
//process data from form and save in the database
//heck if submit button is clicked
if(isset($_POST['submit'])){
  //button clicked
 // echo "clicked";
 //1.get data from form
  $FULL_NAME =$_POST['FULL_NAME'];
 $USERNAME = $_POST['USERNAME'];
 $PASSWORD = md5( $_POST['PASSWORD']);

 //2.sql query to save data into db
 $sql = "INSERT INTO tbl_admin SET
     FULL_NAME = '$FULL_NAME',
     PASSWORD = '$PASSWORD',
     USERNAME = '$USERNAME'
 
 ";

 //db conncetion
 ;
 //3.execuate query


   $res = mysqli_query($conn,$sql) or die(mysqli_error());
   //check if data inserted and display
   if($res==true){

  //data inserted
 // echo "inserted";
 $_SESSION['add'] = "Admin added successfully";
 header("location:".SITEURL."admin/manage-admin.php");
   } else{
    $_SESSION['add'] = "failed to add admin";
    header("location:".SITEURL."admin/add-admin.php");
    //failled to insert

   }
 
}



?>