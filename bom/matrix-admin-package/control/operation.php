<?php

$switch = $_POST['switch'];


include '../model/operation.php';
switch ($switch) {
    case 1: layoutEntry();
        break;
    case 2: addEmployeeData();
        break;
    case 3: saveEditedStyleData();
        break;
    case 6: saveArticlesTable();  
        break;
    case 5:getLoanRelateData();    
        break;
}

function layoutEntry() {    
    $style = $_POST['style'];
    $reference = $_POST['reference'];
    $sq = $_POST['sq'];
    $operation = $_POST['operation'];
    $spcm = $_POST['spcm'];
    $machine = $_POST['machine_type'];
    $att1 = $_POST['att1'];
    $att2 = $_POST['att2'];
    $remarks = $_POST['remarks'];
    $obj = new Operation();
    $i = 0;
    while ($i < sizeof($reference)) {
        $obj->addOperation($reference[$i], $style, $sq[$i], $operation[$i], $spcm[$i], $machine[$i], $att1[$i], $att2[$i], $remarks[$i]);
        $i++;
    }
   
    header("location:../layout-new.php");
}

function saveArticlesTable(){    var_dump($_FILES);exit();
     if(!empty($_FILES['file']['name'])){         echo 'outer';         exit();       
        if(is_uploaded_file($_FILES['file']['tmp_name'])){echo 'in';         exit();     
            
            //open uploaded csv file with read only mode
            $csvFile = fopen($_FILES['file']['tmp_name'],'r');            var_dump($csvFile);            exit();
            
            while(($line = fgetcsv($csvFile)) !== FALSE){    
                    //insert member data into database
                    $obj = new Operation();
                    $obj->saveArticles($line[0],$line[1],$line[2],$line[3]);
                    }
           
            
            //close opened csv file
            fclose($csvFile);
        }   
        }
   

//redirect to the listing page
header("Location: ../HTML/bom-entry.html ");
   }
   
  function test(){
       if(isset($_POST["importSubmit"])){
		
		$filename=$_FILES["file"]["tmp_name"];		
 
 
		 if($_FILES["file"]["size"] > 0)
		 {
		  	$file = fopen($filename, "r");
	        while (($getData = fgetcsv($file)) !== FALSE)
	         {                    var_dump($getData);                    exit();
 
 
	         /*  $sql = "INSERT into employeeinfo (emp_id,firstname,lastname,email,reg_date) 
                   values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."')";
                   $result = mysqli_query($con, $sql);
				if(!isset($result))
				{
					echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"index.php\"
						  </script>";		
				}
				else {
					  echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"index.php\"
					</script>";
				}*/
	         }
			
	         fclose($file);	
		 }
	}	 
 
 
 
  }

function saveLoanData(){   
    $employeeID = $_POST['employeeID'];
    $loanDate = $_POST['loanDate'];
    $loanrequested = $_POST['loanrequested'];
    $loanpermitted = $_POST['loanpermitted'];//guaranter1epf
    $guaranter1epf = $_POST['guaranter1epf'];
    $guaranter2epf = $_POST['guaranter2epf'];
    
    $obj = new Operation();
    $obj->saveLoanData($employeeID,$loanDate,$loanrequested,$loanpermitted,$guaranter1epf,$guaranter2epf);
    
    header("location:../loan-form-working-june30.php");
    
}

function addEmployeeData(){
    $staffId = $_POST['staffId'];
    $fullName = $_POST['fullname'];
    $surname = $_POST['surname'];
    $initials = $_POST['initials'];
    $commonName = $_POST['commonName'];
    $date = $_POST['date'];
    $civilStatus = $_POST['civilStatus'];
    $nid = $_POST['nid'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $address3 = $_POST['address3'];
    $distance = $_POST['distance'];
    $homePhone = $_POST['homePhone'];
    $mobilePhone = $_POST['mobilePhone'];
    $email = $_POST['email'];
    $race = $_POST['race'];
    $religion = $_POST['religion'];
    $province = $_POST['province'];
    $district = $_POST['district'];
    $electorate = $_POST['electorate'];
    
    $obj = new Operation();
    $obj->getEmployee($staffId, $fullName, $surname, $initials, $commonName, $date,$civilStatus, $nid, $address1, $address2, $address3,$distance,$homePhone,$mobilePhone,$email,$race,$religion,$province, $district, $electorate);
           
}

function saveEditedStyleData(){  
    $style = $_POST['style'];
    $reference = $_POST['ref'];
    $sq = $_POST['sq'];
    $operation = $_POST['operation'];
    $spcm = $_POST['spcm'];
    $machine = $_POST['machine'];
    $att1 = $_POST['att1'];
    $att2 = $_POST['att2'];
    $remarks = $_POST['remarks'];
    $obj = new Operation();
    
    $i = 0;
    while ($i < sizeof($reference)) {   
        $obj->saveEditedData($reference[$i], $style, $sq[$i], $operation[$i], $spcm[$i], $machine[$i], $att1[$i], $att2[$i], $remarks[$i]);
     $i++;
    }
    header("location:../layout-edit.php");
}

function getLoanRelateData(){

    $empId = $_POST["employeeID"];
    $obj = new Operation();
    $result = $obj->getEmpLoanRelData($empId);    
    header("location:../loan-form.php");
    
}