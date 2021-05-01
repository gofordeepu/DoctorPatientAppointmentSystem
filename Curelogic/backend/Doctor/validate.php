<?php
include "../impFunction.php";
session_start();
if(isset($_POST["LoginBtn"])){
    require_once "../db.php";
     $email=strtolower($_POST['Email']);
     $password=$_POST['Password'];
     $query="select * from doctors where Email='{$email}' and Password='{$password}'";
     $result=mysqli_query($con,$query);
     $row=mysqli_fetch_assoc($result);
     if($row){
       $_SESSION['dlogin']=1;
       $_SESSION['dname']=$row['Name'];
       $_SESSION['demail']=$row['Email'];
       $_SESSION['dmobile']=$row['Mobile'];
       $_SESSION['degree']=$row['Degree'];
       $_SESSION['description']=$row['Description'];
       $_SESSION['openTime']=$row['openTime'];
       $_SESSION['closeTime']=$row['closeTime'];
       $_SESSION['district']=$row['District'];
       ddash();
     }
     else{
       $_SESSION['dwrongPass']=1;
       dloginPage();
     }
} 
else{
   homePage();
}
?>