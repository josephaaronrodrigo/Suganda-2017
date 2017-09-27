<?php

date_default_timezone_set('Asia/Colombo');
include '../model/planning.php';
$switch = $_POST['switch'];
switch ($switch) {
    case 1 : enterStyle();
        break;
    case 2: refAllocate();
        break;
    case 3: plantAllo();
        break;
    case 4: plantRedirect();
        break;
    case 5: lineAllo();
        break;
    case 6: planEntry();
        break;
}

function enterStyle() {
    $style_number = $_POST['style_number'];
    $sku = $_POST['sku'];
    $po_number = $_POST['po_number'];
    $order_quantity = $_POST['order_quantity'];
    $unit_price = $_POST['unit_price'];
    $required_mos = $_POST['required_mos'];

    $date = $_POST['rm_date'];
    $rm_date = date('Y-m-d', strtotime($date));

    $date1 = $_POST['ex_fac_date'];
    $ex_fac_date = date('Y-m-d', strtotime($date1));

    $date2 = $_POST['order_date'];
    $order_date = date('Y-m-d', strtotime($date2));
    ///--------------Uploading File--------------------
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES['pic']['name']);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    //Check if real or fake image
    if (isset($_POST['submit'])) {
        $check = getimagesize($_FILES['pic']['tmp_name']);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
    }
    //Check if file exists
    if (file_exists($target_file)) {
        $uploadOk = 0;
    }
    //File Format check
    if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif') {
        $uploadOk = 0;
    }

    if ($uploadOk != 0) {
        $checkUpload = move_uploaded_file($_FILES['pic']['tmp_name'], $target_file);
        if ($checkUpload) {
            $pic = $_FILES['pic']['name'];
        } else {
            $pic = "";
        }
    } else {
        $pic = "";
    }
    //-----------------end file upload-----------------    
    $obj = new Planning();
    $result = $obj->enterStyle($style_number, $sku, $po_number, $order_quantity, $unit_price, $required_mos, $order_date, $rm_date, $ex_fac_date, $pic);
    session_start();
    if ($result == 1) {
        $_SESSION['suc'] = 1;
    } else {
        $_SESSION['err'] = 1;
    }
    header("location:../enter-style.php");
}

function refAllocate() {
    $reference = $_POST['reference'];
    $po_number = $_POST['po_number'];
    $obj = new Planning();
    $count = 0;
    for ($i = 0; $i < sizeof($po_number); $i++) {
        $result = $obj->refAllocate($reference, $po_number[$i]);
        if ($result == 1) {
            ++$count;
        }
    }
    session_start();
    if ($count == sizeof($po_number)) {
        $_SESSION['suc'] = 1;
    } else {
        $_SESSION['err'] = 1;
        $_SESSION['count'] = sizeof($po_number) - $count;
    }
    header("location:../reference-allocation.php");
}

function plantAllo() {
    $plant_no = $_POST['plant_no'];
    $reference = $_POST['reference'];
    $obj = new Planning();
    $count = 0;
    for ($i = 0; $i < sizeof($reference); $i++) {
        $result = $obj->plantAllo($plant_no, $reference[$i]);
        if ($result == 1) {
            ++$count;
        }
    }
    session_start();
    if ($count == sizeof($reference)) {
        $_SESSION['suc'] = 1;
    } else {
        $_SESSION['err'] = 1;
        $_SESSION['count'] = sizeof($reference) - $count;
    }
    header("location:../plant-allocation.php");
}

function plantRedirect() {
    $plant_no = $_POST['plant_no'];
    session_start();
    $_SESSION['p'] = $plant_no;
    header("location:../line-allocation.php");
}

function lineAllo() {
    $date = date('Y-m-d');
    $reference = $_POST['reference'];
    $line_no = $_POST['line_no'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $quantity = $_POST['qty'];

    $obj = new Planning();
    $count = 0;
    for ($i = 0; $i < sizeof($line_no); $i++) {
        $result = $obj->lineAllo($reference, $line_no[$i], $quantity[$i], $month, $year, $date);
        if ($result == 1) {
            ++$count;
        }
    }
    session_start();
    unset($_SESSION['p']);
    if ($count == sizeof($line_no)) {
        $_SESSION['suc'] = 1;
    } else {
        $_SESSION['err'] = 1;
        $_SESSION['count'] = sizeof($line_no) - $count;
    }
    header("location:../line-allocation.php");
}

function planEntry() {
    $date = $_POST['date'];
    $plan = $_POST['plan'];
    $line = $_POST['line_no'];
    $plant_no = $_POST['plant_no'];
    $reference = $_POST['reference'];
    $obj = new Planning();

    $k = 0;
    for ($i = 0; $i < sizeof($line); $i++) {
        $line_no = $line[$i];
        $ref = $reference[$i];
        for ($j = 0; $j < sizeof($date); $j++) {
            $date1 = $date[$j];
            $plan1 = $plan[$k];
            $k++;
            if ($plan1 != "") {
                $obj->planEntry($date1, $plant_no, $ref, $line_no, $plan1);
            }
        }
    }
    session_start();
    $_SESSION['suc'] = 1;
    header("location:../plan-entry.php");
}
