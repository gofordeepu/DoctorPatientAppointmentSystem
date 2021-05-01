<?php
session_start();
include "./impFunction.php";
if(isset($_POST['sendBtn']))
{
       include "./db.php";
       $email=$_POST['Email'];
       $msg=$_POST['Feedback'];
       $query="insert into feedback(Email,Message) values ('{$email}','{$msg}')";
       $result=mysqli_query($con,$query);
       if($result)
       {
           $_SESSION['sent']=1;
           contact();
           mysqli_close($con);

       }
}
else{
   contact();
}



?>