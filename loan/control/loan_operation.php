<?php 
if(isset($_POST['switch'])){
    $switch = $_POST['switch'];
}
include '../model/loan-operation.php';
switch ($switch) {
    case 1: saveLoanData();    
        break;
    case 3: getGuarantorData();   
        break;
    //case 4: updateloanInstaData();    
     //   break;
    case 5: updateEmpData();
        break;
    case 6: updateloanInstaData_many();
        break;
    //case 7: noInstPayment();
     //   break;
    
}

function saveLoanData(){   
    $employeeID = trim($_POST['employeeID']);
    $loanDate = trim($_POST['loanDate']);
    $loanrequested = trim($_POST['loanrequested']);
    $loanpermitted = trim($_POST['loanpermitted']);
    $guaranter1epf = trim($_POST['guaranter1epf']);
    $guaranter2epf = trim($_POST['guaranter2epf']); 
    $installment = trim($_POST['installment']);
    $installments = trim($_POST['installments']);
    $approved_loan = trim($_POST['approved_loan']);
    $plant = trim($_POST['plant']);
    
    $obj = new Operation();
    $obj->saveLoanData($employeeID,$plant,$loanDate,$loanrequested,$loanpermitted,$approved_loan,$guaranter1epf,$guaranter2epf,$installment,$installments);
    header("location:../loan-form.php?msg=Updated Successfully");
}

function getLoanRelateData(){

    $empId = trim($_POST["employeeID"]);
    $plant = trim($_POST["plant"]);
    $obj = new Operation();
    $result = $obj->getEmpLoanRelData($empId,$plant);    
    header("location:../loan-form.php");
    
}

function getGuarantorData(){
    $guar_empId ;
    if(isset($_POST['guaranter1epf'])){
        $guar_empId = $_POST['guaranter1epf'];
    }else if(isset($_POST['guaranter2epf'])){
        $guar_empId = $_POST['guaranter2epf'];
    }
    
    $obj = new Operation();
    $result = $obj->getEmpLoanGurantorRelData($guar_empId);    
    header("location:../loan-form.php");
    
}

function noInstPayment(){
    $empId = $_POST['emp_id'];
    $inst = $_POST['inst'];
    $inst_paydate = $_POST['inst_paydate'];
    $loan_id = $_POST['loanid'];
    $num_installments = $_POST['ins_num'];
    $reason = $_POST['reason'];
    $obj = new Operation();
       
        $obj->noInstPayment(trim($loan_id[0]), trim($inst_paydate[0]), trim($empId[0]),0,trim($reason[0]));
    
    header("location:../installment-update.php?msg=Updated Successfully");
}

function updateloanInstaData(){
    $empId = $_POST['emp_id'];
    $inst = $_POST['inst'];
    $inst_paydate = $_POST['inst_paydate'];
    $loan_id = $_POST['loanid'];
    $num_installments = $_POST['ins_num'];
    $reason = $_POST['reason'];
    $obj = new Operation();
       
        $obj->updateLoanInstData(trim($loan_id[0]), trim($inst_paydate[0]), trim($empId[0]),trim($inst[0]),trim($reason[0]));
    
    header("location:../installment-update.php?msg=Updated Successfully");
}

function updateloanInstaData_many(){    
    $empId = $_POST['emp_id'];
    $inst = $_POST['inst'];
    $inst_paydate = $_POST['inst_paydate'];   
    $loan_id = $_POST['loanid'];
    $num_installments = $_POST['ins_num'];
    $reason = $_POST['reason'];
    $chbox = $_POST['sel'];
    $obj = new Operation();
    
    $i = 0;    
    while ($i < $_POST['hidden_morerows']) { 
        
        if($chbox[$i]=="no"){
            $inst[$i] = 0;
        }
        $obj->updateLoanInstData(trim($loan_id[$i]),trim($inst_paydate[$i]),trim($empId[$i]),trim($inst[$i]),trim($reason[$i]));
        $i++;
    }
   
    header("location:../installment-update.php?msg=Updated Successfully");
}

function updateEmpData(){   
    $plant = $_POST['plant'];
    $employeeID = $_POST['employeeID'];
    $name = $_POST['name'];
    $joined_date = $_POST['joined_date'];
    $basic_salary = $_POST['basic_salary'];
    $designation = $_POST['designation'];
    
    $obj = new Operation();
    $result = $obj->updateEmpdata(trim($plant),trim($employeeID),trim($basic_salary),trim($designation));
    
    if($result){
        header("location:../empdata-update.php?msg=Updated Successfully");
    }
}

function add_plant6_employees(){ if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
        
            $csvFile = fopen('SB50V1_NERO.csv','r');            //var_dump($csvFile);            exit();
            $aData = array();
            while(($line = fgets($csvFile)) !== FALSE){
                     
                    //insert member data into database
                
                     $aData=explode(",",$line);                   
                     
                    $obj = new Operation();
                    $t = $obj->saveplant6_employeedata($aData);
                    }
                    
            //close opened csv file
            fclose($csvFile);
       
}
header("Location: ../HTML/bom-entry.html ");
   }

?>