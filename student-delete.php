<?php
print_r($_GET);
if(isset($_GET['stuid']) && !empty($_GET['stuid'])){
    include "./includes/db.con.php";
    $stuid=$_GET['stuid'];
    if($conn)
    {
        $query="DELETE FROM `student` WHERE stu_id=$stuid;";
        $result=mysqli_query($conn,$query);
        if($result!=null){
            header("Location: ./index.php?delete=9");

        }
    }

}






?>