<?php
include "../impFunction.php";
session_start();
if(isset($_POST["LoginBtn"])){
    require_once "../db.php";
     $email=strtolower($_POST['Email']);
     $password=$_POST['Password'];
     $query="select * from patients where Email='{$email}' and Password='{$password}'";
     $result=mysqli_query($con,$query);
     $row=mysqli_fetch_assoc($result);
     if($row){
       $_SESSION['login']=1;
       $_SESSION['pname']=$row['Name'];
       $_SESSION['pemail']=$row['Email'];
       $_SESSION['pmobile']=$row['Mobile'];
       pdash();
     }
     else{
       $_SESSION['wrongPass']=1;
       loginPage();
     }
} 
else{
   homePage();
}
?>