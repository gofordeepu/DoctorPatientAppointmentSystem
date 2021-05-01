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
    <link rel="stylesheet" type="text/css" href="./style/profile.css">
</head>
<body>
    <div class="wrap">  
        <header>
              <nav id="navbar">
                <div class="container">
                 <h1 class="logo coloring">CureLogic</h1>
                  <ul>
                    <li><a class="current" href="./dashboard.php">Home</a></li>
                    <li><a href="Profile.php">Profile</a></li>
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
      if (isset($_SESSION['notUpdate'])) {
        if($_SESSION['notUpdate']==1)
        {
          echo '<div class="msg" style="color: white; width:100%; background-color:green;text-align:center">
          Mobile number already exist!!
          </div>';
          $_SESSION['notUpdate']=0;
        }
      }
      ?>
        <div class="fields"><h1>Your Profile</h1></div>
          <?php
                 $pemail=$_SESSION['pemail'];
                 $pname=$_SESSION['pname'];
                 $pmobile=$_SESSION['pmobile'];
              echo "<form action='/curelogic/backend/patients/updateProfile.php' method='POST'>
                    <div class='fields'>
                    <label for='Name'>Name</label>
                    <input type='text' value='{$pname}' name='Name' required>
                    </div >

                    <div class='fields'>
                    <label for='Email'>Email</label>
                     <input type='email' value='{$pemail}' name='Email' readonly style='background-color:white' required>
                    </div>

                    <div class='fields'>
                    <label for='Mobile'>Mobile</label>
                     <input type='text' value='{$pmobile}' name='Mobile' required>
                    </div>

                    <div class='fields'>
                     <button type='submit'>save</button>
                    </div>

                    </form>";
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