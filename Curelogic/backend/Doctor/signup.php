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
$description=$_POST['Description'];
$district=$_POST['District'];
$degree=$_POST['Degree'];
$openTime=$_POST['openTime'];
$closeTime=$_POST['closeTime'];
$query="select * from doctors where Email='{$email}' or Mobile='{$mobile}'";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_row($result);
if($row){
         echo "userId already exist";
          $_SESSION['dstatus']=2;
          mysqli_close($con);
          dregisterPage();
}
else{
    $query="insert into doctors(Name,Email,Mobile,Password,Degree,Description,district,openTime,closeTime) values('{$name}','{$email}','{$mobile}','{$password}','{$degree}','{$description}',{$district},'{$openTime}','{$closeTime}')";
    $result=mysqli_query($con,$query);
    if($result){
         $_SESSION['dstatus']=1;
         mysqli_close($con);
         dloginPage();
    }
    else{
         echo "something wrong..";
         $_SESSION['dstatus']=0;
         mysqli_close($con);
         dregisterPage();
    }
}
}
else{ 
   
    homePage();
   
}
?>