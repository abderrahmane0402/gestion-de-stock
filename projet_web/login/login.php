<?php
extract($_POST);
include "../class/admin.php";
$admin = new admin($login,$password);
session_start();
if($admin->verify()){
    $_SESSION['login'] = $login;
    $_SESSION['password'] = $password;
    header("location:../dashboard/dashboard.php");
}else{
    header("location:../index.php?statue=3");
}