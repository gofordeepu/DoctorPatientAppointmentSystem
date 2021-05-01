<?php 
session_start();
include "./patient/db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CureLogic</title>
    <link rel="stylesheet" type="text/css"href="../style/Index.css">
    <link rel="stylesheet" href="../style/register.css">
</head>
<body>
    <div class="wrap">  
        <header>
              <nav id="navbar">
                <div class="container">
                 <h1 class="logo coloring">CureLogic</h1>
                  <ul>
                    <li><a class="current" href="Index.php">Home</a></li>
                    <li><a href="login.php">Patient Login</a></li>
                    <li><a href="dlogin.php">Doctor Login</a></li>
                    <li><a href="contact.php">Contact</a></li>
                  </ul>
                </div>
              </nav>
        </header>
      <div class="loginSection"> 
      <?php
      if (isset($_SESSION['dstatus'])) {
        if($_SESSION['dstatus']==2)
        {
          echo '<div class="msg" style="color: red; width:100%; background-color:yellow;text-align:center">
          User already exist with this Email or Mobile !!
          </div>';
        }
        elseif($_SESSION['dstatus']==0){
          echo '<div class="msg" style="color: red; width:100%; background-color:yellow;text-align:center">
          Something went wrong !!
          </div>';        
        }
                session_destroy();
      }
      ?>
        <h1>Sign up to create a Doctor Account</h1>
          <section class="loginForm">
            <form action="../backend/Doctor/signup.php" method="POST">
                <div class="parent">
                <div class="child">
                    <label for="Name">Name</label>
                    <input type="text" name="Name" required>
                </div>
                <div class="child">
                    <label for="Mobile">Mobile</label>
                    <input type="text" name="Mobile" required>
                </div>
                <div class="child">
                    <label for="Email">Email</label>
                    <input type="email" name="Email" required>
                </div>
                <div class="child">
                    <label for="Degree">Degree</label>
                    <input type="text" name="Degree" required>
                </div>
                <div class="child">
                    <label for="Description" style="padding: 0.5em;">Description</label>
                    <textarea name="Description" id="" cols="20" rows="5" required></textarea>
                </div>
                <div class="child">
                    <label for="Description" style="padding: 0.5em;">District</label>
                    <br>
                    <select name="District" id="">
                    <?php
                    $query="select * from district order by dname";
                    $result = mysqli_query($con,$query);
                    while($row=mysqli_fetch_assoc($result))
                    {
                      echo "<option value='{$row['id']}'>{$row['dname']}</option>";
                    }
                    
                    ?>
                    </select>
                </div>
                <div class="child"> 
                    <label for="Password">Opens at</label>
                    <input type="time" required name="openTime">
                </div>
                <div class="child"> 
                    <label for="Password">Closes at</label>
                    <input type="time" required name="closeTime">
                </div>
                <div class="child"> 
                    <label for="Password">Password</label>
                    <input type="password" name="Password" required>
                </div>
                <div class="child">
                    <button type="submit" name="signupBtn">Sign&nbspup</button>
                </div>
                <div class="child">
                    <a href="dlogin.php"><span style="color: goldenrod;">&nbspAlready&nbsphave&nbsp</span><span style="color:black">an&nbspaccount?</span></a>
                </div>
            </div>
            </form>
          </section>
          <div class="footerSection">
            <footer>
              <p>Copyright © cureLogic 2021 All rights reserved.</p>
            </footer>
          </div>
      </div>

    </div>  

</body>
</html>