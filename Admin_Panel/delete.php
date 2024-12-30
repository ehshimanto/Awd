<?php
include_once "file_function/function.php";
needLogged();
$id = $_GET['d'];
$delete= "DELETE FROM students WHERE st_id='$id' ";

if(mysqli_query($connect,$delete)){
    header("Location:all-user.php");
}
?>