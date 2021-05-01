<?php
session_start();
 require_once "../impFunction.php";
if(isset($_POST['signupBtn']))
{
include "../db.php";
$name=strtoupper($_POST['Name']);
$email=strtolower($_POST['Email']);
$mobile=$_POST['Mobile'];
$password=$_POST['Password'];
$query="select * from patients where Email='{$email}' or Mobile='{$mobile}'";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_row($result);
if($row){
         echo "userId already exist";
          $_SESSION['status']=2;
          mysqli_close($con);
          registerPage();
}
else{
    $query="insert into patients(Name,Email,Mobile,Password) values('{$name}','{$email}','{$mobile}','{$password}')";
    $result=mysqli_query($con,$query);
    if($result){
         $_SESSION['status']=1;
         mysqli_close($con);
         loginPage();
    }
    else{
         echo "something wrong..";
         $_SESSION['status']=0;
         mysqli_close($con);
         registerPage();
    }
}
}
else{ 
   
    homePage();
   
}
?>