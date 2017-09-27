<?php

date_default_timezone_set('Asia/Colombo');
include '../model/production.php';
$switch = $_POST['switch'];
switch ($switch) {
    case 1: updateProd();
        break;
    case 2: updateIncentive();
        break;
}

function updateProd() {
    $plant_no = $_POST['plant_no'];
    $date = $_POST['date'];
    $session = $_POST['session'];
    $line_no = $_POST['line_no'];
    $reference = $_POST['reference'];
    $session_start = $_POST['session_start'];
    $output = $_POST['output'];
    $accepted = $_POST['accepted'];
    $rejected = $_POST['rejected'];
    $rejRepaired = $_POST['rejRepaired'];
    $mo = $_POST['mo'];
    $remarks = $_POST['remarks'];
    $obj = new Production();
    for ($i = 0; $i < sizeof($line_no); $i++) {
        if ($output[$i] != "") {
            echo $result = $obj->updateProd($date, $session, $plant_no, $line_no[$i], $reference[$i], $session_start[$i], $output[$i], $accepted[$i], $rejected[$i], $rejRepaired[$i], $mo[$i], $remarks[$i]);
        }
    }
    session_start();
    if ($result == 1) {
        $_SESSION['suc'] = 1;
    } else {
        $_SESSION['err'] = 1;
    }
    header("location:../production-update.php");
}

function updateIncentive() {
    $styleref = $_POST['styleRef'];
    $t_percentage = $_POST['t_percentage'];
    $prod_percent = $_POST['prod_percent'];
    $inc_percent = $_POST['inc_percent'];
    $array = explode('-', $styleref);
    $reference = $array[0];
    $plant_no = $array[1];
    $line_no = $array[2];
    $obj = new Production();
    for ($i = 0; $i < sizeof($prod_percent); $i++) {
        $obj->updateIncentive($reference, $plant_no, $line_no, $t_percentage, $prod_percent[$i], $inc_percent[$i]);
    }
    session_start();
    $_SESSION['suc'] = 1;
    header("location:../incentive-form.php");
}
