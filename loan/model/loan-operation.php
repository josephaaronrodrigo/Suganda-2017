<?php

include_once 'dbConnection.php';

class Operation {
    function saveLoanData($employeeID,$plant,$loanDate,$loanrequested,$loanpermitted,$approved_loan,$guaranter1epf,$guaranter2epf,$installment,$installments){
        $conn = new Connection();
        $sql = "INSERT INTO loan_data (employee_id,plant_no,loanDate,requestedAmount,permittedAmount,approved_amount,guarentor1empid,guarentor2empid,installment,Num_installments,current_installments)  VALUES ('$employeeID','$plant','$loanDate','$loanrequested','$loanpermitted','$approved_loan','$guaranter1epf','$guaranter2epf','$installment','$installments',0)";
        $conn->query($sql);
        return ;
    }
    function getPendingInstallments($plant){
        $conn = new Connection();
        $sql = "SELECT loan_data.employee_id,employee_data.name,loan_data.installment FROM loan_data INNER JOIN employee_data ON loan_data.employee_id=employee_data.employee_id WHERE current_installments= Num_installments AND loan_data.plant_no = '2'";
        //$sql = "SELECT * FROM employee_data";
        $result = $conn ->query($sql);
        return $result;
    }
   /* function saveInstallmentdata($loan_id,$empId,$installments){
        $conn = new Connection();
        $sql2 ="INSERT INTO loan_installments (loan_id,employee_id,remain_installments) VALUES ('$loan_id','$empId','$installments')";
        $conn->query($sql2);
        return;
    }*/
            
    function getEmpLoanRelData($empId,$plant=null){
        $conn = new Connection();
        if($plant==null){
            $sql = "SELECT * FROM employee_data WHERE employee_id = '$empId'"; 
        }else {
        $sql = "SELECT * FROM employee_data WHERE employee_id = '$empId' AND plant_id ='$plant'"; 
        }
        $result = $conn->query($sql);      
        return $result;
    }
    
    function getEmpLoanGurantorRelData($empId){
        $conn = new Connection();
        $sql = "SELECT name,joined_date FROM employee_data WHERE employee_id = '$empId'"; 
        $result = $conn->query($sql);      
        return $result;
    }
    
    function getInstallmentData($empId=null,$plant=null){       
        $conn = new Connection();
        //$sql = "SELECT * FROM loan_data WHERE employee_id = '$empId'";
        $sql2 = "SELECT DISTINCT loan_data.employee_id,loan_id,name,installment,num_installments,loan_data.current_installments,approved_amount FROM `loan_data` INNER JOIN employee_data ON loan_data.employee_id=employee_data.employee_id WHERE current_installments<num_installments AND loan_data.employee_id='$empId'";
        $result = $conn->query($sql2);     
        return $result;
    }
    
    function pendingInstByPlant($plant){
        $conn = new Connection();
        $sql = "SELECT * FROM loan_data INNER JOIN employee_data ON loan_data.employee_id=employee_data.employee_id WHERE loan_data.plant_no = '$plant' AND loan_data.num_installments>loan_data.current_installments ";
        $result = $conn->query($sql);     
        return $result;
        
    }
    
    function updateLoanInstData($loan_id, $inst_paydate, $empId,$inst,$reason){       
        $conn = new Connection();
        //insert the record/s to loan_installments table
        $sql = "SELECT MAX(`current_installments`)as 'a' FROM `loan_installments` WHERE employee_id = '$empId' AND loan_id = '$loan_id'";
        $result = $conn ->query($sql);
        $last_paid_inst = $result->fetch_assoc(); 
        
        $updated_inst = $last_paid_inst['a']+1; 
        if($inst==0){
            $updated_inst = $last_paid_inst['a'];
        }
        $sql2 = "INSERT INTO loan_installments(loan_id, employee_id, installment, paid_date, current_installments, reason) VALUES ('$loan_id','$empId','$inst','$inst_paydate','$updated_inst','$reason')";
        $conn2 = new Connection();
        $conn2 ->query($sql2);
        $conn3 = new Connection();
        $sql3 = "UPDATE loan_data SET current_installments='$updated_inst' WHERE loan_id='$loan_id' AND employee_id = '$empId'";
        
        $results = $conn3 ->query($sql3); 
        return ;
        
    }
    
   /* function noInstPayment($loan_id, $inst_paydate, $empId,$inst,$reason){
        $conn = new Connection();
        $sql = "SELECT MAX(`current_installments`)as 'a' FROM `loan_installments` WHERE employee_id = '$empId' AND loan_id = '$loan_id'";
        $result = $conn ->query($sql);
        $last_paid_inst = $result->fetch_assoc(); 
        $sql2 = "INSERT INTO loan_installments(loan_id, employee_id, installment, paid_date, current_installments, reason) VALUES ('$loan_id','$empId','$inst','$inst_paydate','$last_paid_inst','$reason')";
        $conn2 = new Connection();
       
        $conn2 ->query($sql2);
       
        $conn3 = new Connection();
        $sql3 = "UPDATE loan_data SET current_installments='$updated_inst' WHERE loan_id='$loan_id' AND employee_id = '$empId'";
        
        $results = $conn3 ->query($sql3);    
         
        return ;
    }*/
    
    function getPendingInst($empId){
        $empId = trim($empId);
        $conn = new Connection();
        $sql = "SELECT SUM(loan_installments.installment) AS 'a' FROM loan_installments INNER JOIN loan_data ON loan_installments.loan_id=loan_data.loan_id WHERE loan_data.employee_id = '$empId'AND loan_data.num_installments>loan_data.current_installments";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $amount =  $row['a']; 
        return $amount;
    }
    
    function loan_pending($empId){
        $conn = new Connection();
        $sql = "SELECT SUM(approved_amount)AS 'c' FROM loan_data WHERE employee_id = '$empId' AND num_installments>current_installments ";
        $result = $conn->query($sql);        
        return $result;
        
    }
    
    function getEmployeePayment_perLoan($empId,$loanId){
        $conn = new Connection();
        $sql = "SELECT SUM(installment)AS 'current_tot' FROM loan_installments WHERE employee_id='$empId' AND loan_id ='$loanId'";
        $result = $conn->query($sql);        
        return $result;
        
    }
    
    function getPendingInstByLoanId($empId,$loanId){
        $conn = new Connection();
        $sql = "SELECT loan_installments.installment as 'actual',loan_installments.paid_date,loan_data.installment as 'expected' FROM `loan_installments` INNER JOIN loan_data ON loan_installments.loan_id=loan_data.loan_id WHERE loan_data.employee_id = '$empId'AND loan_installments.loan_id = '$loanId'
ORDER BY loan_installments.paid_date";
        $result = $conn->query($sql);
        return $result;
    }
       
    function updateEmpdata($plant,$employeeID,$basic_salary,$designation){
        $conn = new Connection();
        $sql = "UPDATE `employee_data` SET `basic_salary`='$basic_salary',`designation`='$designation',`plant_id`='$plant' WHERE `employee_id`='$employeeID'";
        $result = $conn->query($sql);
        return $result;
    }
}
?>