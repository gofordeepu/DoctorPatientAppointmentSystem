<?php
session_start();
include "../impFunction.php";
if(!isset($_SESSION['login']))
{
   loginPage();
}
else{
include "../db.php";
$pemail=$_SESSION['pemail'];
$name=strtoupper($_POST['Name']);
$mobile=$_POST['Mobile'];
$query="update patients set Name='{$name}',Mobile='{$mobile}' where Email='{$pemail}'";
$result=mysqli_query($con,$query);
if($result)
{
   $_SESSION['pname']=$name;
   $_SESSION['pmobile']=$mobile;
   pdash(); 
}
else
{
    $_SESSION['notUpdate']=1;
    pProfile();
}
}



?>