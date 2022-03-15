<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "register_form";

$conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
     
     if(!$conn){
          die("Sorry we failed to connect:" . mysqli_connect_error());
     }
     

?>
