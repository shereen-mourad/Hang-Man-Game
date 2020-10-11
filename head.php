<?php
session_start();
if(isset($_POST['Go'])) {
	$_SESSION = [];
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['category'] = $_POST['categories'];
    $_SESSION['level'] = $_POST['level'];
	$_SESSION['hint_flag']=0;
    header('location: action.php');
}

?><!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" >

    <title>Hangman</title>


</head>
<body>

