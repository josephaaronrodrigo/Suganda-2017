<?php

include_once 'dbConnection.php';

class Operation {

    function addOperation($reference, $style, $sq, $operation, $spcm, $machine, $att1, $att2, $remarks) { 
        $conn = new Connection();
        $sql = "INSERT INTO operation_breakdown VALUES('$reference','$style','$sq','$operation','$spcm','$machine','$att1','$att2','$remarks')";
        $conn->query2($sql);
        return;
    }

    function getStyles() {        
        $conn = new Connection();
        $sql = "SELECT DISTINCT style FROM operation_breakdown";
        $result = $conn->query2($sql);              
        return $result;
    }
    
    function getOperation($style){
        $conn = new Connection();
        $sql = "SELECT * FROM operation_breakdown WHERE style LIKE '$style' ORDER BY ref ASC";
        $result = $conn ->query2($sql);
        return $result;
    }
    

            
    function saveEditedData($reference, $style, $sq, $operation, $spcm, $machine, $att1, $att2, $remarks){
        $conn = new Connection();
        $sql = "UPDATE IGNORE operation_breakdown SET ref = '$reference' , sq = '$sq', operation ='$operation', spcm = '$spcm',machine ='$machine', att1= '$att1' ,att2 = '$att2' ,remarks = '$remarks' WHERE style = '$style' ORDER BY ref, sq ,operation , spcm ,machine , att1,att2 ,remarks  ";
        $result = $conn ->query($sql);
        return ;
    }
    
    
}