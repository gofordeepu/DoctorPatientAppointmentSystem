<?php 
session_start();
 include "./impFunction.php";
if(!isset($_SESSION['dlogin']))
{
    dloginPage();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CureLogic</title>
    <link rel="stylesheet" type="text/css"href="/curelogic/templates/patient/style/Index.css">
</head>
<body>
    <div class="wrap">  
        <header>
              <nav id="navbar">
                <div class="container">
                 <h1 class="logo coloring">CureLogic</h1>
                  <ul>
                    <li><a class="current" href="./dashboard.php">Home</a></li>
                    <li><a href="profile.php">Profile</a></li>
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
            <h3><a href="./history.php">Appointment history</a></h3>
          </div>
          <div class="second">
             <h3><a href="./upcoming.php">Upcoming appointments</a></h3>
          </div>
          <div class="third">
             <h3><a href="./appointment.php">Appointment Requests</a></h3>
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