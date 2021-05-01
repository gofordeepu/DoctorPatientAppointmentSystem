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

if(isset($_POST['approve']))
{
    $aid=$_POST['approve'];
    $query="update appointment
    set status=2 where ApId='{$aid}'";
    $result=mysqli_query($con,$query);
    if($result)
    {
        header('location:http://localhost:8080/Curelogic/templates/doctor/appointment.php');
    }
    
    else{
        echo "something went wrong";
    }
}
elseif(isset($_POST['cancel']))
{
    $aid=$_POST['cancel'];
    $query="update appointment
    set status=3 where ApId='{$aid}'";
    $result=mysqli_query($con,$query);
    if($result)
    {
        header('location:http://localhost:8080/Curelogic/templates/doctor/appointment.php');
    }
    
    else{
        echo "something went wrong";
    }
}
else{
    echo "something went wrong....";
}
?>