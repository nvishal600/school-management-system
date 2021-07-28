<?php include "./includes/top.php";
include "./includes/db.con.php";
$fname="";
$lname="";
$gender="";
$standard="";
$address="";
$formFill="";
$successMsg="";
if(isset($_GET['success']) && !empty($_GET['success'])){
   if($_GET['success']==10){
      $successMsg="Student Add Successfully!!";

   }
}
if($conn){

   if(isset($_GET['stuid']) && !empty($_GET['stuid'])){

      $stuid=$_GET['stuid'];
      if($conn)
      {
          $query_view="select * from student where stu_id=$stuid";
          $selectResult=mysqli_query($conn,$query_view);
          if(mysqli_num_rows($selectResult)>0)
          {
             
             $fetchData=mysqli_fetch_assoc($selectResult);
             $fname=$fetchData['f_name'];
             $lname=$fetchData['l_name'];
             $phone=$fetchData['phone_no'];
             $dob=$fetchData['dob'];
             $gender=$fetchData['gender'];
             $address=$fetchData['address'];
             $standard=$fetchData['class_id'];
          }
         
      }
   }




   if(isset($_POST['submit'])){
   $fname=mysqli_real_escape_string($conn,$_POST['fname']);
   $lname=mysqli_real_escape_string($conn,$_POST['lname']);
   $phone=mysqli_real_escape_string($conn,$_POST['phone']);
   $address=mysqli_real_escape_string($conn,$_POST['address']);
   $dob=$_POST['dob'];
   $gender=$_POST['gender'];
   $standard=$_POST['standard'];


   if(isset($_GET['stuid']) && !empty($_GET['stuid'])){
      $stuid=$_GET['stuid'];

      $update_query="UPDATE `student` SET `f_name`='$fname',`l_name`='$lname',`phone_no`='$phone',`dob`='$dob',`gender`='$gender',`address`='$address',`class_id`='$standard' WHERE stu_id=$stuid";
      $updateResult=mysqli_query($conn,$update_query);
      if($updateResult!=null){
         header("Location: ./index.php?update=10");

      }
   }
   else{
      $insert_query="INSERT INTO `student`(`f_name`, `l_name`, `phone_no`, `dob`, `gender`, `address`, `class_id`) VALUES ('$fname','$lname','$phone','$dob','$gender','$address','$standard');";
      $resultInsert=mysqli_query($conn,$insert_query);

      if($resultInsert!=null)
      {
         
         header("Location: ./student-insert.php?success=10");
         
      }
   }

     


   }

   $class_query="select * from class";
   $resultShow=mysqli_query($conn,$class_query);
   if(mysqli_num_rows($resultShow)>0)
   {

   }
}


?>
















<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Student</strong><small> Form</small></div>
                        <div class="card-body card-block">
         <form action="" method="post">
       <div class="form-group">
            <label for="firstname">Firstname:</label>
            <input required type="text" value="<?php echo$fname?>" name="fname" id="firstname" class="form-control" placeholder="First Name">
        </div>
        <div class="form-group">
            <label  for="lastname">Lastname:</label>
            <input required type="text" value="<?php echo$lname?>" name="lname" id="lastname" class="form-control" placeholder="Last Name">
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input required type="number" value="<?php echo$phone?>" name="phone" id="phone" class="form-control" placeholder="Phone">
        </div>
        <div class="form-group">
            <label  for="dob">DOB:</label>
            <input type="date" value="<?php echo$dob?>" required name="dob" id="dob" class="form-control" placeholder="DOB">
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select  class="form-control" name="gender" id="gender">
                <option value="" selected disabled>Select Gender</option>
                <option <?php if($gender=='male')
                   { echo"selected";
                   }?> value="male">
                   Male
                </option>
                <option <?php if($gender=='female')
                   { echo"selected";
                   }?> value="female">
                Female
                </option>
                <option value="other" <?php if($gender=='other')
                   { echo"selected";
                   }?>>Other</option>
               
            </select>
            
        </div>
        <div class="form-group">
            <label for="standard">Standard:</label>
            <select  class="form-control" name="standard" id="standard">
                <option value="" selected disabled>Select Standard</option>

                <?php while($row=mysqli_fetch_assoc($resultShow))
                {
                ?>
                <option <?php if($standard==$row['cla_id'])
                {echo"selected";}
                ?> value="<?php echo $row['cla_id']?>"><?php echo $row['name']?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <textarea required class="form-control"  name="address" id="address" cols="30" rows="5">
                  <?php echo$address?>
            </textarea>
        </div>
      </div>
      <h3 class="text-success text-center"><?php echo $successMsg; ?></h3>
      <div class="modal-footer">
      
      <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
            Submit
      </button>
      
     
       </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

<?php include "./includes/footer.php"?>