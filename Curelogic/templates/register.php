<?php 
session_start();
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
      if (isset($_SESSION['status'])) {
        if($_SESSION['status']==2)
        {
          echo '<div class="msg" style="color: red; width:100%; background-color:yellow;text-align:center">
          User already exist with this Email or Mobile !!
          </div>';
        }
        elseif($_SESSION['status']==0){
          echo '<div class="msg" style="color: red; width:100%; background-color:yellow;text-align:center">
          Something went wrong !!
          </div>';        
        }
                session_destroy();
      }
      ?>
        <h1>Sign up to create a Patient Account</h1>
          <section class="loginForm">
            <form action="../backend/patients/signup.php" method="POST">
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
                    <label for="Password">Password</label>
                    <input type="password" name="Password" required>
                </div>
                <div class="child">
                    <button type="submit" name="signupBtn">Sign&nbspup</button>
                </div>
                <div class="child">
                    <a href="login.php"><span style="color: goldenrod;">&nbspAlready&nbsphave&nbsp</span><span style="color:black">an&nbspaccount?</span></a>
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