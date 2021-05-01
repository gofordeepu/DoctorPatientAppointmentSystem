<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CureLogic</title>
  <link rel="stylesheet" type="text/css" href="../style/Index.css">
  <link rel="stylesheet" href="../style/login.css">
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
        if($_SESSION['dstatus']==1)
        {
          echo '<div class="msg" style="color: white; width:100%; background-color:green;text-align:center">
          Successfully registered!!
          </div>';
                 session_destroy();
        }
      }
      if(isset($_SESSION['dwrongPass']))
      {
        echo '<div class="msg" style="color: white; width:100%; background-color:red;text-align:center">
          Wrong username or password!!
          </div>';
                 session_destroy();
      }
      ?>
      <h1>Doctor Login</h1>
      <section class="loginForm">
        <form action="../backend/Doctor/validate.php" method="POST">
          <div class="parent">
            <div class="child">
              <label for="Email">Email</label>
              <input type="email" name="Email" required>
            </div>
            <div class="child">
              <label for="Password">Password</label>
              <input type="password" name="Password" required>
            </div>
            <div class="child">
              <button type="submit" name="LoginBtn">Login</button>
            </div>
            <div class="child">
              <a href="dregister.php"><span style="color: goldenrod;">&nbspDon't&nbsphave&nbspan</span><span style="color:black">&nbspaccount?</span></a>
            </div>
          </div>
        </form>
      </section>

    </div>
    <div class="footerSection">
      <footer>
        <p>Copyright © cureLogic 2021 All rights reserved.</p>
      </footer>
    </div>
  </div>

</body>

</html>