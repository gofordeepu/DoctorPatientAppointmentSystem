<?php 
session_start();
 include "./impFunction.php";
if(!isset($_SESSION['dlogin']))
{
    loginPage();
}
else{
  include "../patient/db.php";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CureLogic</title>
    <link rel="stylesheet" type="text/css"href="/curelogic/templates/patient/style/doctors.css">
    <link rel="stylesheet" type="text/css" href="../patient/style/profile.css">
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
                 $demail=$_SESSION['demail'];
                 $dname=$_SESSION['dname'];
                 $dmobile=$_SESSION['dmobile'];
                 $description=$_SESSION['description'];
                 $degree=$_SESSION['degree'];
                 $openTime=$_SESSION['openTime'];
                 $closeTime=$_SESSION['closeTime'];
                 $district=$_SESSION['district'];
              $query="select dname from doctors d join district di on 
                d.District=di.id
              where Email='{$demail}'";
              $result=mysqli_query($con,$query);
              $row=mysqli_fetch_assoc($result);
              $districtName=$row['dname'];
              echo "<form action='/curelogic/backend/Doctor/updateProfile.php' method='POST'>
                    <div class='fields'>
                    <label for='Name'>Name</label>
                    <input type='text' value='{$dname}' name='name' required>
                    </div >

                    <div class='fields'>
                    <label for='Email'>Email</label>
                     <input type='email' value='{$demail}' name='email' readonly style='background-color:white' required>
                    </div>

                    <div class='fields'>
                    <label for='Mobile'>Mobile</label>
                     <input type='text' value='{$dmobile}' name='mobile' required>
                    </div>
                    <div class='fields'>
                    <label for='District'>District</label>
                    <select name='District' id=''>
                    <option value='{$district}' selected>{$districtName}</option>
                    ";
                    $query="select * from district where id !='{$district}' order by dname";
                    $result = mysqli_query($con,$query);
                    while($row=mysqli_fetch_assoc($result))
                    {
                      echo "<option value='{$row['id']}'>{$row['dname']}</option>";
                    }
                   echo "</select></div>";
                echo "<div class='fields'>
                    <label for='Description'>Description</label>
                     <input type='text' value='{$description}' name='description' required>
                    </div>
                    <div class='fields'>
                    <label for='Mobile'>Degree</label>
                     <input type='text' value='{$degree}' name='degree' required>
                    </div>
                    <div class='fields'>
                    <label for='Description'>Opens at</label>
                     <input type='time' value='{$openTime}' name='openTime' required>
                    </div>
                    <div class='fields'>
                    <label for='Description'>Closes at</label>
                     <input type='time' value='{$closeTime}' name='closeTime' required>
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