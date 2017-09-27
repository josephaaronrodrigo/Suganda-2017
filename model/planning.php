<?php

include_once 'dbConnection.php';

class Planning {

    function enterStyle($style_number, $sku, $po_number, $order_quantity, $unit_price, $required_mos, $order_date, $rm_date, $ex_fac_date, $pic) {
        $conn = new Connection();
        $sql = "INSERT INTO planned_style(style_number,sku,po_number,order_quantity,unit_price,required_mos,order_date,rm_date,ex_fac_date,pic) VALUES('$style_number','$sku','$po_number','$order_quantity','$unit_price','$required_mos','$order_date','$rm_date','$ex_fac_date','$pic')";
        $result = $conn->query($sql);
        return $result;
    }

    function getPODetails($po_number) {
        $conn = new Connection();
        $sql = "SELECT * FROM planned_style WHERE po_number LIKE '$po_number'";
        $result = $conn->query($sql);
        return $result;
    }

    function noRefPO() {
        $conn = new Connection();
        $sql = "SELECT * FROM planned_style WHERE reference IS NULL";
        $result = $conn->query($sql);
        return $result;
    }

    function refAllocate($reference, $po_number) {
        if (strlen($reference) == 1) {
            $reference = '000' . $reference;
        } elseif (strlen($reference) == 2) {
            $reference = '00' . $reference;
        } elseif (strlen($reference) == 3) {
            $reference = '0' . $reference;
        }
        $conn = new Connection();
        $sql = "UPDATE planned_style SET reference = '$reference' WHERE po_number LIKE '$po_number'";
        $result = $conn->query($sql);
        return $result;
    }

    function getReferencedPO() {
        $conn = new Connection();
        $sql = "SELECT DISTINCT ps.reference, ps.style_number, SUM(ps.order_quantity) AS total_ordered, ps.required_mos, ps.ex_fac_date, p.plant_no FROM planned_style ps LEFT JOIN plant_allocation p ON ps.reference = p.reference WHERE ps.reference IS NOT NULL GROUP BY ps.style_number";
        $result = $conn->query($sql);
        return $result;
    }

    function getRefDetails($reference) {
        $conn = new Connection();
        $sql = "SELECT DISTINCT ps.required_mos,ps.unit_price,ps.reference, ps.style_number, SUM(ps.order_quantity) AS total_ordered, ps.required_mos, ps.ex_fac_date, p.plant_no FROM planned_style ps LEFT JOIN plant_allocation p ON ps.reference = p.reference WHERE ps.reference LIKE '$reference' GROUP BY ps.style_number";
        $result = $conn->query($sql);
        return $result;
    }

    function plantAllo($plant_no, $reference) {
        $conn = new Connection();
        $sql = "SELECT * FROM plant_allocation WHERE reference LIKE '$reference'";
        $result = $conn->query($sql);
        if (mysqli_num_rows($result) > 0) {
            $sql1 = "UPDATE plant_allocation SET plant_no = '$plant_no' WHERE reference LIKE '$reference'";
        } else {
            $sql1 = "INSERT INTO plant_allocation VALUES('$reference','$plant_no')";
        }
        $result1 = $conn->query($sql1);
        return $result1;
    }

    function getAllocatedStyles($plant_no) {
        $conn = new Connection();
        $sql = "SELECT DISTINCT ps.reference, ps.style_number, SUM(ps.order_quantity) AS total_ordered, ps.required_mos, ps.ex_fac_date, p.plant_no FROM planned_style ps LEFT JOIN plant_allocation p ON ps.reference = p.reference WHERE p.plant_no LIKE '$plant_no' GROUP BY ps.style_number";
        $result = $conn->query($sql);
        return $result;
    }

    function lineAllo($reference, $line_no, $quantity, $month, $year, $date) {
        $conn = new Connection();
        $sql = "INSERT INTO line_allocation VALUES('$reference','$line_no','$quantity','$month','$year','$date')";
        $result = $conn->query($sql);
        return $result;
    }

    function checkLineAllo($reference) {
        $conn = new Connection();
        $sql = "SELECT SUM(quantity) AS total FROM line_allocation WHERE reference LIKE '$reference'";
        $result = $conn->query($sql);
        if (mysqli_num_rows($result) == 0) {
            $total = 0;
        } else {
            $array = mysqli_fetch_array($result);
            $total = $array['total'];
        }
        return $total;
    }

    function countRefs($plant_no, $month, $year, $line_no) {
        $conn = new Connection();
        $sql = "SELECT * FROM line_allocation la, plant_allocation pa,planned_style ps WHERE pa.reference = ps.reference AND pa.reference=la.reference AND pa.plant_no LIKE '$plant_no' AND la.line_no LIKE '$line_no' AND la.month LIKE '$month' AND la.year LIKE '$year' GROUP BY ps.style_number";
        $result = $conn->query($sql);
        return $result;
    }

    function planEntry($date, $plant_no, $ref, $line_no, $plan) {
        $conn = new Connection();
        $sql = "INSERT INTO plan VALUES('$plant_no','$date','$ref','$line_no','$plan')";
        $result = $conn->query($sql);
        return $result;
    }

    function distinctStyles() {
        $conn = new Connection();
        $sql = "SELECT DISTINCT(style_number) FROM planned_style";
        $result = $conn->query($sql);
        return $result;
    }

    function getStyleInfo($style_number) {
        $conn = new Connection();
        $sql = "SELECT *,SUM(order_quantity) AS total FROM planned_style WHERE style_number = '$style_number' GROUP BY reference";
        $result = $conn->query($sql);
        return $result;
    }

    function getRefDetailsByPlant($plant_no, $style_number) {
        $conn = new Connection();
        $sql = "SELECT DISTINCT ps.reference, ps.style_number, SUM(ps.order_quantity) AS total_ordered, ps.required_mos, ps.ex_fac_date, p.plant_no FROM planned_style ps LEFT JOIN plant_allocation p ON ps.reference = p.reference WHERE ps.style_number LIKE '$style_number' AND p.plant_no = '$plant_no' GROUP BY ps.style_number";
        $result = $conn->query($sql);
        return $result;
    }

    function getTotPlantAll($plant_no, $reference, $date) {
        $conn = new Connection();
        $sql = "SELECT SUM(plan) AS total FROM plan WHERE date LIKE '$date' AND plant_no LIKE '$plant_no' AND reference LIKE '$reference'";
        $result = $conn ->query($sql);
        return $result;
    }

    function getStylesForIncentive(){
        $conn = new Connection();
        $sql = "SELECT *,la.quantity AS line_quantity FROM planned_style ps INNER JOIN plant_allocation pa on pa.reference = ps.reference INNER JOIN line_allocation la ON la.reference = pa.reference";
        $result = $conn ->query($sql);
        return $result;
    }
}

?>