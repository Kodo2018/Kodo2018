<?php include('PATIALS/menu.php');?>
     <!----menu content ends---->


     <!----main content starts---->
     <div class="main">
        <div class="wrapper">

        <h1>MANAGE ADMIN</h1>
        <br>
           <!-----btn to add admin-->
   
           <?php
           // displaying add message
             if(isset($_SESSION['add'])) {

              echo $_SESSION['add'];

              unset($_SESSION['add']);//remove session
             }
              
              
              ?>
              <br/> <br/>
           <a href="add-admin.php" class="btn-primary">Add Admin</a>
           <br> <br>
        <table class="tbl-full">
            <tr>
              <th>SN</th>
              <th>FULL NAME</th>
              <th>USERNAME</th>
              <th>ACTION</th>
            </tr>

            <?php
            //sql to get data from data base
            $sql= "SELECT*FROM tbl_admin";
            //excuate query
            $res =mysqli_query($conn,$sql);
            //check if query excuated
            if($res==TRUE){

              //COUNT ROWA
              $count = mysqli_num_rows($res);//function to get all rows from database
              // check num of rows
              $sn =1;
              if($count>0){

                //we have data
                while($rows =mysqli_fetch_assoc($res)){
                  //using while loop to get data fron database
                  //while will excuate as long as data is there
                  //get individual data
                  $ID = $rows['ID'];
                  $FULL_NAME =$rows['FULL_NAME'];
                  $USERNAME =$rows['USERNAME'];
                  //DISPLAY VALUE IN TABLE
                  ?>
                    <tr>

              <td><?php echo $sn++;?> </td>
              <td><?php echo $FULL_NAME;?></td>
              <td><?php echo $USERNAME;?></td>
              <td>
              <a href="" class="btn-secondary">update</a>
              <a href="<?php echo SITEURL;?>admin/delete-admin.php?id =<?php echo $ID;?>" class="btn-danger">Delete</a>
                
              </td>
            </tr>
                  <?php
               
                }
              }
              else{
                  //no data
                  ?>
                  
                  
              <td><?php echo" NO DATA AVAILABLE"?></td>
             
              </td>
            </tr>
                  <?php
              }
                
              
            }

            
            
            
            ?>
   
         
              

        </table>
          
             
          <div class="clearfix"></div>
        </div>
     </div>
     <!----main content ends---->

     <!----footer content starts---->
     <?php include('PATIALS/footer.php');?>