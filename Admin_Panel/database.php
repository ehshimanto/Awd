<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "awd_2401";

$connect = mysqli_connect($db_host,$db_user,$db_pass,$db_name) ;

if(!$connect){
  echo "database connection Failed";
}

?>