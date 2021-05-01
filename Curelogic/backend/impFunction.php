<?php
function registerPage()
{
    header('location:http://localhost:8080/curelogic/templates/register.php');
}
function loginPage()
{
    header('location:http://localhost:8080/curelogic/templates/login.php');
}
function homePage()
{
    header('location:http://localhost:8080/curelogic/templates/index.php');
}
function pdash()
{
    header('location:http://localhost:8080/Curelogic/templates/patient/dashboard.php');
}
function dloginPage()
{
    header('location:http://localhost:8080/curelogic/templates/dlogin.php');
}
function dregisterPage()
{
    header('location:http://localhost:8080/curelogic/templates/dregister.php');
}
function ddash()
{
    header('location:http://localhost:8080/Curelogic/templates/doctor/dashboard.php');
}
function pProfile()
{
    header('location:http://localhost:8080/Curelogic/templates/patient/profile.php');
}
function dProfile()
{
    header('location:http://localhost:8080/Curelogic/templates/doctor/profile.php');
}
function contact()
{
    header('location:http://localhost:8080/Curelogic/templates/contact.php');
}
function appointmentBooked(){
    header('location:http://localhost:8080/Curelogic/templates/patient/booked.php');
}
?>