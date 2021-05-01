<?php
session_start();
include "../impFunction.php";
if(!isset($_SESSION['dlogin']))
{
   loginPage();
}
else{
include "../db.php";
$demail=$_SESSION['demail'];
$name=strtoupper($_POST['name']);
$description=$_POST['description'];
$degree=$_POST['degree'];
$district=$_POST['District'];
$mobile=$_POST['mobile'];
$openTime=$_POST['openTime'];
$closeTime=$_POST['closeTime'];
$query="update doctors set Name='{$name}',Mobile='{$mobile}',Description='{$description}',District='{$district}',Degree='{$degree}',openTime='{$openTime}',closeTime='{$closeTime}' where Email='{$demail}'";
$result=mysqli_query($con,$query);
if($result)
{
   $_SESSION['dname']=$name;
   $_SESSION['dmobile']=$mobile;
   $_SESSION['openTime']=$openTime;
   $_SESSION['closeTime']=$closeTime;
   $_SESSION['description']=$description;
   $_SESSION['degree']=$degree;
   $_SESSION['district']=$district;
   ddash(); 
}
else
{
    $_SESSION['notUpdate']=1;
    dProfile();
}
}



?>