<?php 
session_start();
 include "./impFunction.php";
if(!isset($_SESSION['dlogin']))
{
    dloginPage();
}
else{
  include "../../backend/db.php";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CureLogic</title>
    <link rel="stylesheet" type="text/css"href="/curelogic/templates/patient/style/doctors.css">
<style>
.cancel{
   background-color:white;
   color:red;
   padding:5px;
   border-radius: 5px;
}
.approve{
   background-color:white;
   color:green;
   padding:5px;
   border-radius: 5px;
}

</style>
</head>
<body>
    <div class="wrap">  
        <header>
              <nav id="navbar">
                <div class="container">
                 <h1 class="logo coloring">CureLogic</h1>
                  <ul>
                    <li><a class="current" href="./dashboard.php">Home</a></li>
                    <li><a href="./profile.php">Profile</a></li>
                    <li><a href="./history.php">Appointment History</a></li>
                    <li><a href="/curelogic/backend/patients/logout.php">logout</a></li>
                  </ul>
                </div>
              </nav>
        </header>
        <div class="patient-name">
        <h3>Hello,&nbsp<?php echo $_SESSION['dname']?></span></h3>
        </div>
       
        <div class="options">
        <div class="first">
        
          <?php
              $demail=$_SESSION['demail'];
              $query="select a.ApId,a.appointmentDate,p.Name,a.pemail,p.Mobile,s.appointmentStatus
              from appointment a join patients p
              on a.pemail=p.Email 
              join status s on s.sid=a.status
              where a.demail='{$demail}' and (a.status=4 or a.status=3) order by a.appointmentDate desc";
              $result=mysqli_query($con,$query);
              echo "<table id='doc-table' cellspacing='10em'>
              <tr>
              <th>appointment Date</th>
              <th>Patient's Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Status</th>
              </tr>";
              while($row=mysqli_fetch_assoc($result))
              {
               
               echo"<tr>
                 <td>".$row['appointmentDate']."</td>
                 <td>".$row['Name']."</td>
                 <td>".$row['pemail']."</td>
                 <td>".$row['Mobile']."</td>
                 <td>".$row['appointmentStatus']."</td>
                 </tr>";
              }
              echo "</table>";
          ?>
            
          </div>
        </div>
      
        <div class="footerSection">
          <footer>
            <p>Copyright ?? cureLogic 2021 All rights reserved.</p>
          </footer>
        </div>
    </div>  
</body>
</html>