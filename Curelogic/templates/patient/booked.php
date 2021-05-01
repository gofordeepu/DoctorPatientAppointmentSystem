<?php 
session_start();
 include "./impFunction.php";
if(!isset($_SESSION['login'])||!isset($_SESSION['bookedDemail']))
{
    homePage();
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
            <div class="booked">
                <h3>Appointment Booked Successfully!</h3>
            </div>
        <div class="first">
            <h3>Doctor's Details</h3>
          <?php
                 
              $query="select d.Name,d.Email,d.Mobile,d.Degree,di.dname as district,d.Description
               from doctors d join district di
               on di.id=d.district
              where Email='{$_SESSION['bookedDemail']}'";
              $result=mysqli_query($con,$query);
              echo "<table id='doc-table' cellspacing='10em'>
              <tr>
              <th>Doctor's Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Degree</th>
                <th>District</th>
                <th>Description</th>
              </tr>";
              while($row=mysqli_fetch_assoc($result))
              {
               
               echo"<tr>
                 <td>".$row['Name']."</td>
                 <td>".$row['Email']."</td>
                 <td>".$row['Mobile']."</td>
                 <td>".$row['Degree']."</td>
                 <td>".$row['district']."</td>
                 <td>".$row['Description']."</td>
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