<?php session_start();
include_once "database.php";
function get_header(){
    require_once "include/header.php";
}
function get_sidebar(){
    require_once "include/sidebar.php";
}
function get_footer(){
    require_once "include/footer.php";
}
function LoggedID(){
    return $_SESSION['id'] ? true:false;
}
function needLogged(){
    $chack=LoggedID();
    if(!$chack){
        header("Location:login.php");
    }
}
?>