<?php
session_start();
if(isset($_POST['bookBtn']))
{
    include "../db.php";
    include "../impFunction.php";
    $doa=$_POST['doa'];
    $demail=$_POST['Doctor'];
    $pemail=$_SESSION['pemail'];
    $_SESSION['bookedDemail']=$demail;
    $query="insert into appointment(Pemail,Demail,appointmentDate) values('{$pemail}','{$demail}','{$doa}')";
    $result=mysqli_query($con,$query);
    if($result){
         appointmentBooked();
    }
    else{
        echo "something went wrong try again later...";
    }

}
else{
   homePage();
}

?>