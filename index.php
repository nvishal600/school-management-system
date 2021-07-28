<?php include "./includes/top.php";
include "./includes/db.con.php";



$deleteStudent="";
if(isset($_GET['delete']) && !empty($_GET['delete'])){
   if($_GET['delete']==9)
   {
      $deleteStudent="Student Delete Successfully";
   }

}
$updateStudent="";
if(isset($_GET['update']) && !empty($_GET['update'])){
   if($_GET['update']==10)
   {
      $updateStudent="Student Update Successfully";
   }

}
if($conn)
{
   $query="SELECT * FROM `student` INNER JOIN `class` ON class_id=cla_id;";
   $result=mysqli_query($conn,$query);

   if(mysqli_num_rows($result)>0)
   {

   }
   
   //delete
  



}

?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                  <h3 class="text-danger text-center mb-2">
                        <?php echo $deleteStudent?>
                        
                      </h3>
                      <h3 class="text-success text-center mb-2">
                        <?php echo $updateStudent?>
                        
                      </h3>
                     <div class="card">
                     

                        <div class="card-body d-flex justify-content-between" >
                           <h2 class="box-title" style="font-size:25px;">Students </h2>
                           <a class="btn btn-primary" style="height:40px" href="student-insert.php" role="button">Add Student</a>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table table-bordered">
                                 <thead>
                                    <tr class="text-cenetr">
                                       <th class="serial">#</th>
                                       <th>Name</th>
                                       <th>Phone No.</th>
                                       <th>DOB</th>
                                       <th>Gender</th>
                                       <th>Standard</th>
                                       <th>Address</th>
                                       <th >Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
                                    $i=1;
                                    while($row=mysqli_fetch_assoc($result))
                                    {

                                    ?>
                                    <tr>
                                       <td class="serial"><?php echo $i?>.</td>
                                       <td> <span ><?php echo $row['f_name'].' '.$row['l_name'] ?></span> </td>
                                       <td> <span ><?php echo $row['phone_no'] ?></span> </td>
                                       <td><span><?php echo $row['dob'] ?></span></td>
                                       <td><span><?php echo $row['gender'] ?></span></td>
                                       <td><span><?php echo $row['name'] ?></span></td>
                                       <td><span><?php echo $row['address'] ?></span></td>
                                       <td>
                                       <a class="btn btn-primary m-2" href="student-insert.php?stuid=<?php echo$row['stu_id']?>" role="button">Update</a>
                                         <a class="btn btn-danger m-2" href="student-delete.php?stuid=<?php echo$row['stu_id']?>" role="button">Delete</a>
                                       </td>
                                    </tr>
                                    <?php $i++;} ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>

          
<?php include "./includes/footer.php"?>