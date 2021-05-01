<?php 
session_start();
 include "./impFunction.php";
if(!isset($_SESSION['login']))
{
    loginPage();
}
else{
  include "./db.php";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CureLogic</title>
    <link rel="stylesheet" type="text/css"href="/curelogic/templates/patient/style/doctors.css">
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
                    <li><a href="./appointment.php">Appointment History</a></li>
                    <li><a href="/curelogic/backend/patients/logout.php">logout</a></li>
                  </ul>
                </div>
              </nav>
        </header>
        <div class="patient-name">
        <h3>Hello,&nbsp<?php echo $_SESSION['pname']?></span></h3>
        </div>
       
        <div class="options">
        <div class="first">
          <?php
              $pemail=$_SESSION['pemail'];
              $query="select d.Name,d.Email,d.Mobile,a.bookingDate,a.appointmentDate,s.appointmentStatus,di.dname district from appointment a 
              join doctors d on d.Email=a.demail
              join patients p on p.Email=a.pemail
              join status s on s.sid=a.status
              join district di on di.id=d.District where p.email='{$pemail}';
              ";
              $result=mysqli_query($con,$query);
              echo "<table id='doc-table' cellspacing='10em'>
              <tr>
              <th>Booking Date</th>
              <th>Doctor's Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>appointment Date</th>
                <th>Appointment status</th>
                <th>District</th>
              </tr>";
              while($row=mysqli_fetch_assoc($result))
              {
               
               echo"<tr>
                <td>".$row['bookingDate']."</td>
                 <td>".$row['Name']."</td>
                 <td>".$row['Email']."</td>
                 <td>".$row['Mobile']."</td>
                 <td>".$row['appointmentDate']."</td>
                 <td>".$row['appointmentStatus']."</td>
                 <td>".$row['district']."</td>
                 </tr>";
              }
              echo "</table>";
          ?>
            
          </div>
        </div>
      
        <div class="footerSection">
          <footer>
            <p>Copyright © cureLogic 2021 All rights reserved.</p>
          </footer>
        </div>
    </div>  
</body>
</html>