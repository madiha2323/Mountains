<?php
$servername="localhost";
$username="root";
$password='';
$db_name="db_crud";

$con = mysqli_connect($servername,$username,$password,$db_name);

$con = mysqli_connect("localhost","root","","db_crud");

if ($con)
{
    // echo"connection successful";
}
else 
{
    echo"error...";
}
?>