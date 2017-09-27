<?php

date_default_timezone_set('Asia/Colombo');
include '../model/general.php';
$switch = $_POST['switch'];

switch ($switch) {
    case 1: login();
        break;
}

function login() {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $obj = new General();
    $result = $obj->login($username, $password);
    $count = mysqli_num_rows($result);
    session_start();
    if ($count == 1) {
        $array = mysqli_fetch_array($result);
        $_SESSION['username'] = $array['username'];
        $_SESSION['name'] = $array['name'];
        $_SESSION['level'] = $array['level'];
        header("location:../enter-style.php");
    } else {
        $_SESSION['err'] = 1;
        header("location:../index.php");
    }
}
