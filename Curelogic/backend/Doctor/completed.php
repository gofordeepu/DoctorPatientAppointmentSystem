<?php
session_start();
 include "../impFunction.php";
if(!isset($_SESSION['dlogin']))
{
    dloginPage();
}
else{
  include "../db.php";
}

if(isset($_POST['completed']))
{
    $aid=$_POST['completed'];
    $query="update appointment
    set status=4 where ApId='{$aid}'";
    $result=mysqli_query($con,$query) or die(mysqli_error($con));
    if($result)
    {
        header('location:http://localhost:8080/Curelogic/templates/doctor/upcoming.php');
    }
    
   
}


?>