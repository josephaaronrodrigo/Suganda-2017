<?php

include_once 'dbConnection.php';

class Production {
    function getDailyPlannedLines($date,$plant_no){
        $conn = new Connection();
        $sql = "SELECT DISTINCT line_no,reference,plan FROM plan WHERE date LIKE '$date' AND plant_no LIKE '$plant_no'";
        $result = $conn ->query($sql);
        return $result;
    }
    
    function updateProd($date, $session, $plant_no, $line_no, $reference,$session_start, $output, $accepted, $rejected, $rejRepaired, $mo, $remarks){
        $conn = new Connection();
        $sql = "INSERT INTO production VALUES ('$date','$session','$plant_no','$line_no','$reference','$session_start','$output','$accepted','$rejected','$rejRepaired','$mo','$remarks')";
        $result = $conn ->query($sql);
        return $result;
    }
    
    function checkProdEntry($date,$session,$plant_no,$line_no){
        $conn = new Connection();
        $sql = "SELECT * FROM production WHERE date LIKE '$date' AND session LIKE '$session' AND plant_no LIKE '$plant_no' AND line_no LIKE '$line_no'";
        $result = $conn ->query($sql);
        return $result;
    }
    
    function getPlannedDay($date,$reference,$plant_no,$line_no){
        $conn = new Connection();
        $sql = "SELECT COUNT(date) as days,SUM(plan) AS tot_plan FROM plan WHERE date <= '$date' AND plant_no LIKE '$plant_no' AND reference LIKE '$reference' AND line_no LIKE '$line_no'";
        $result = $conn -> query($sql);
        return $result;
    }
    
    function actQuantity($date,$plant_no,$line_no,$reference){
        $conn = new Connection();
        $sql = "SELECT SUM(output) AS product, COUNT(date) AS days FROM production WHERE date <= '$date' AND plant_no LIKE '$plant_no' AND line_no LIKE '$line_no' AND reference LIKE '$reference'";
        $result = $conn ->query($sql);
        return $result;
    }
    
    function getProdVal($plant_no,$date,$line_no,$session){
        $conn = new Connection();
        $sql = "SELECT * FROM production WHERE date LIKE '$date' AND plant_no LIKE '$plant_no' and line_no LIKE '$line_no' AND session LIKE '$session'";
        $result = $conn ->query($sql);
        return $result;
    }
    
    function getPlan($plant_no,$date,$line_no,$reference){
        $conn = new Connection();
        $sql = "SELECT * FROM plan WHERE date LIKE '$date' AND plant_no LIKE '$plant_no' AND reference LIKE '$reference' AND line_no LIKE '$line_no'";
        $result = $conn -> query($sql);
        return $result;
    }
    
    function linePlanRef($plant_no){
        $conn = new Connection();
        $sql = "SELECT ps.style_number,pa.plant_no,l.reference,l.line_no,l.quantity FROM plant_allocation pa INNER JOIN line_allocation l ON l.reference=pa.reference INNER JOIN planned_style ps ON ps.reference = pa.reference WHERE pa.plant_no = '$plant_no'";
        $result = $conn ->query($sql);
        return $result;
    }
    
    function updateIncentive($reference,$plant_no,$line_no,$t_percentage,$prod_percent,$inc_percent){
        $conn = new Connection();
        $sql = "INSERT INTO incentive VALUES('$reference','$plant_no','$line_no','$t_percentage','$prod_percent','$inc_percent')";
        $result = $conn ->query($sql);
        return $result;
    }
}
