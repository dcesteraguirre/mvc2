<?php
session_start();
if(!isset($_SESSION['logueado']) || !$_SESSION['logueado']){
    header("Location: index.php");
}else{
    unset($_SESSION['logueado']);
    header("Location: index.php");
}