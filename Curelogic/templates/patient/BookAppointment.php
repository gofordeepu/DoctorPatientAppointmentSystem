<?php 
session_start();
 include "./impFunction.php";
if(!isset($_SESSION['login'])&&!isset($_POST['proceed']))
{
    loginPage();
}
else{
    include "./db.php";
    $district=$_POST['district'];
 }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CureLogic</title>
    <link rel="stylesheet" type="text/css"href="/curelogic/templates/patient/style/Index.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <style>
    #proceed{
        background-color: black;
        width:10em;
        height:4em;
        color: goldenrod;
        border-radius: 3em;
    }
    #proceed:hover{
        background-color:goldenrod;
        width:10em;
        height:4em;
        color: black;
        border-radius: 3em;
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
                    <li><a href="./appointment.php">Appointment History</a></li>
                    <li><a href="/curelogic/backend/patients/logout.php">logout</a></li>
                  </ul>
                </div>
              </nav>
        </header>
        <div class="patient-name">
        <h3>Hello,&nbsp<?php echo $_SESSION['pname']?></span></h3>
        </div>
       <form action="/curelogic/backend/patients/appointmentBook.php" method="POST">
        <div class="options">
        <div>
            <h3>Book Your Appointment</h3>
          </div>
          <div class="first">
          <h3>Choose Date Of Appointment</h3>
             <h3><input type="Date" required name="doa"></h3>
          </div>
        <div class="first">
             <h3>Select Doctor</h3>
             <h3>
             <select name="Doctor" id="Doctor" required>
         
               <?php

               $query="select Name,Email from doctors where district={$district}";
               $result=mysqli_query($con,$query);
               while($row=mysqli_fetch_assoc($result))
               {
                echo "<option value='{$row['Email']}'>Dr. ".$row['Name']."</option>";
               }  
             ?>  
             </select>
             </h3>
          
          </div>
          <div class="fourth">
            <h3><button type="submit" id="proceed" name="bookBtn">Book&nbspAppointment</button></h3>
          </div>
        </div>
     
        </form>
        <div class="footerSection">
          <footer>
            <p>Copyright © cureLogic 2021 All rights reserved.</p>
          </footer>
        </div>
    </div>
</body>
</html>