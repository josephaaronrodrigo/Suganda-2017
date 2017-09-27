<!DOCTYPE html>

<html>
    <head>
        <title>
            Loan Form
        </title>
        <style>
            @import url('https://fonts.googleapis.com/css?family=Fjalla+One');
        </style>
        <meta charset="utf-8">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->


        <script src="styles/jquery.js" type="text/javascript"></script>
        <link href="styles/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="styles/bootstrap.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="styles/jquery-ui.css">
        
    <script src="scripts/jquery-ui.js"></script>

        <script>
            $(function () {
                $('#datepicker').datepicker({dateFormat: 'yy-mm-dd'}).val();
            });
        </script>



        <style>                      
            .dropdown {
                background:#fff;
                border:1px solid #ccc;
                border-radius:4px;
                width:300px;    
            }
            .dropdown-menu>li>a {
                color:#428bca;
            }
            .dropdown ul.dropdown-menu {
                border-radius:4px;
                box-shadow:none;
                margin-top:20px;
                width:300px;
            }
            .dropdown ul.dropdown-menu:before {
                content: "";
                border-bottom: 10px solid #fff;
                border-right: 10px solid transparent;
                border-left: 10px solid transparent;
                position: absolute;
                top: -10px;
                right: 16px;
                z-index: 10;
            }
            .dropdown ul.dropdown-menu:after {
                content: "";
                border-bottom: 12px solid #ccc;
                border-right: 12px solid transparent;
                border-left: 12px solid transparent;
                position: absolute;
                top: -12px;
                right: 14px;
                z-index: 9;
            }

            .header{
                padding: 15px;
            }

        </style>
        <style>
            .container{
                font-family: 'Fjalla One', sans-serif;

            }

            .container label{
                color :black;
                font-weight: normal;
            }

            .h{
                color :black;
                font-weight: normal;
                font-size: 25px;

            }
            
            
        </style>

        <script>
            
            
         function checkMonths(jd=null) {
             var joinedDate_js;
             if(jd!==null){
                 joinedDate_js=new Date(jd);
             }else{
                joinedDate_js = new Date(document.getElementById('joinedDateId').value);
                }
                
                var loandate_element = document.getElementById('datepicker');
                if(loandate_element!==null){
                    var today = new Date(document.EmployeeLoan.loanDate.value);
                    var diff = today - joinedDate_js;
                }
                var yearOfJoinedDate = joinedDate_js.getFullYear();
                var monthOfJoinedDate = joinedDate_js.getMonth();
                var dateOfJoinedDate = joinedDate_js.getDate();
                
                if(loandate_element!=null){
                    var yearOfToday = today.getFullYear();
                
                var monthOfToday = today.getMonth();
                var dateOfToday = today.getDate;
                }
                var numberOfYears = diff / (1000 * 3600 * 24*365.25);
                
                var monthExactValue = numberOfYears*12;
                
                if(joinedDate_js!==null&&loandate_element!==null){
                
                if(today.getYear()===joinedDate_js.getYear()){
                    if(today.getDate()>=joinedDate_js.getDate()){
                        var num_months = today.getMonth()-joinedDate_js.getMonth();
                        if(jd==null){
                        document.EmployeeLoan.nMonths.value = num_months;
                    }
                        return num_months;
                    }else{
                        var num_months = today.getMonth()-joinedDate_js.getMonth()-1;
                        if(jd==null){
                        document.EmployeeLoan.nMonths.value = num_months;
                    }
                    return num_months;
                    }
                }else if(today.getYear()-joinedDate_js.getYear()===1){
                    if(today.getDate()>=joinedDate_js.getDate()){
                        var num_months = (12-joinedDate_js.getMonth())+today.getMonth();
                        if(jd==null){
                        document.EmployeeLoan.nMonths.value = num_months;
                    }
                    return num_months;
                    }else{
                        var num_months = (12-joinedDate_js.getMonth())+(today.getMonth()-1);
                        if(jd==null){
                        document.EmployeeLoan.nMonths.value = num_months;
                    }
                    return num_months;
                    }
                        
                }else if(today.getMonth()>=joinedDate_js.getMonth()){
                        if(today.getDate()>=joinedDate_js.getDate()){
                            var num_years = today.getYear()-joinedDate_js.getYear();
                            var num_months = today.getMonth()-joinedDate_js.getMonth();
                            var total_months = (num_years*12)+num_months;
                            if(jd==null){
                        document.EmployeeLoan.nMonths.value = total_months;
                    }
                    return total_months;
                        }
                        else{
                            var num_years = today.getYear()-joinedDate_js.getYear();
                            var num_months = today.getMonth()-joinedDate_js.getMonth()-1;
                            var total_months = (num_years*12)+num_months;
                           if(jd==null){
                        document.EmployeeLoan.nMonths.value = total_months;
                    } return total_months;
                        }
                    }else if(today.getMonth()<joinedDate_js.getMonth()){
                        if(today.getDate()>=joinedDate_js.getDate()){
                            var adjusted_year = today.getYear()-1;
                            var num_years = adjusted_year-joinedDate_js.getYear();
                            var num_months = 12-joinedDate_js.getMonth();
                            var curr_year_months = today.getMonth();
                            var total_months = (num_years*12)+num_months+curr_year_months;
                            if(jd==null){
                        document.EmployeeLoan.nMonths.value = total_months;
                    }return total_months;
                        }else{
                            var adjusted_year = today.getYear()-1;
                            var num_years = adjusted_year-joinedDate_js.getYear();
                            var num_months = 12-joinedDate_js.getMonth();
                            var curr_year_months = today.getMonth()-1;
                            var total_months = (num_years*12)+num_months+curr_year_months;
                           if(jd==null){
                        document.EmployeeLoan.nMonths.value = total_months;
                    }return total_months;
                        }
                    }
                }
               
    }
                
                function calcMonths() {
                    var joinedDate = new Date(document.EmployeeLoan.joinedDate.value);
                    var today = new Date(document.EmployeeLoan.loanDate.value);
                    var diff = today - joinedDate;
                    var numDays = diff / (1000 * 3600 * 24);
                    var numberOfYears = numDays / 365.25;
                    var months = numberOfYears * 12;
                    var rMonths = Math.trunc(months);
                    document.EmployeeLoan.nMonths.value = months;
                    return rMonths;
                }
           
            function calculateMaxLoan(j) {
                var basicSalary = document.EmployeeLoan.bSalary.value;
                var months = checkMonths();
                var maxloan;
                
                if (months > 60) {
                    maxloan = basicSalary * 1.5;
                    document.EmployeeLoan.loanWPtest.value = maxloan;
                } else if (months > 48) {
                    maxloan = basicSalary * 1.4;
                    document.EmployeeLoan.loanWPtest.value = maxloan;
                } else if (months > 36) {
                    maxloan = basicSalary * 1.3;
                    document.EmployeeLoan.loanWPtest.value = maxloan;
                } else if (months > 24) {
                    maxloan = basicSalary * 1.2;
                    document.EmployeeLoan.loanWPtest.value = maxloan;
                } else if (months > 12) {
                    maxloan = basicSalary * 1.1;
                    document.EmployeeLoan.loanWPtest.value = maxloan;
                } else if (months >= 10) {
                    maxloan = basicSalary;
                    document.EmployeeLoan.loanWPtest.value = maxloan;
                } else if (months >= 7) {
                    maxloan = basicSalary * 0.75;
                    document.EmployeeLoan.loanWPtest.value = maxloan;
                } else if (months >= 4) {
                    maxloan = basicSalary * 0.5;
                    document.EmployeeLoan.loanWPtest.value = maxloan;
                } else {
                    maxloan = basicSalary * 0.25;
                    document.EmployeeLoan.loanWPtest.value = maxloan;
                }
           
            }
            
            function number_of_instlmnts(){
                var element = document.getElementById('num_months_id');
                var element2 = document.getElementById('installmentsId');
                var months=0;
                var num_ins=0;
                if(element!==null){
                months=document.getElementById('num_months_id').value;
            }            
                if (months > 60) {
                    num_ins = 9;
                    if(element2!==null){
                    document.getElementById('installmentsId').value = num_ins;
                }
                } else if (months > 48) {
                    num_ins = 8;
                    if(element2!==null){
                    document.getElementById('installmentsId').value = num_ins;
                }
                } else if (months > 36) {
                    num_ins = 7;
                    if(element2!==null){
                    document.getElementById('installmentsId').value = num_ins;
                }
                } else if (months > 24) {
                    num_ins = 6;
                     if(element2!==null){
                    document.getElementById('installmentsId').value = num_ins;
                     }
                } else if (months > 12) {
                    num_ins = 5;
                    if(element2!==null){
                    document.getElementById('installmentsId').value = num_ins;
                }
                } else if (months >= 10) {
                    num_ins = 4;
                    if(element2!==null){
                    document.getElementById('installmentsId').value = num_ins;
                }
                } else if (months >= 7) {
                    num_ins = 3;
                    if(element2!==null){
                    document.getElementById('installmentsId').value = num_ins;
                }
                } else if (months >= 4) {
                    num_ins = 2;
                    if(element2!==null){
                    document.getElementById('installmentsId').value = num_ins;
                }
                } else {
                    num_ins = 1;
                    if(element2!==null){
                    document.getElementById('installmentsId').value = num_ins;
                }
                }
           
            }
        
        function showInstlmnt(){
            var element = document.getElementById('approved_loanId');
            if(element!==null){
            var approved_loan = document.getElementById('approved_loanId').value;
            var element2 = document.getElementById('installmentsId');
            var num_instmnts = document.getElementById('installmentsId').value;
            document.getElementById('instId').value=Math.round((approved_loan/num_instmnts));
        }
    }
        
        function showApprovedLoan(){
        if(document.getElementById('approved_loanId')!==null){
                    document.getElementById('approved_loanId').value =0;
                }
                
        var element_req_loan = document.getElementById('loanrequestedId');
            var elem = document.getElementById('loanpermittedId');
            if(elem!==null){
                var permitted_loan = document.getElementById('loanpermittedId').value;
            }
            var approved_loan=0;
            var req=0;
            var final_approved =0;
                
                if(element_req_loan.value!==null){
                    req = element_req_loan.value.trim();
                    if(Math.abs(req)<=Math.abs(permitted_loan)&&Math.abs(req)!==0){
                        final_approved =element_req_loan.value;// if(Math.abs(req)<=Math.abs(permitted_loan))
                         }else if(req.value===0){
                             
                         }else{
                        var a = Math.floor(permitted_loan/500);
                        var b = a*500;
                        final_approved = b;
                        }
                    }else{
                        var a = Math.floor(permitted_loan/500);
                        var b = a*500;
                        final_approved = b;
                    }
           
             if(document.getElementById('approved_loanId')!==null){
                    document.getElementById('approved_loanId').value = final_approved;
                }
        }
           $(document).ready(function(){
               
                   var selItem = sessionStorage.getItem("SelItem");  
    $('#reasonSelectId').val(selItem);
    
    $('#reasonSelectId').change(function() { 
        var selVal = $(this).val();
        sessionStorage.setItem("SelItem", selVal);
    });
               
               var monthsOfG =0;
              
               var element1 = document.getElementById('guar1_joinedDateId');
               var element2 = document.getElementById('guar2_joinedDateId');
               
               if(element1!==null){
               var joinedDG1 = document.getElementById('guar1_joinedDateId').value;
           
               var monthsOfG = checkMonths(joinedDG1);
               if(monthsOfG===12){
                        document.EmployeeLoan.guaranter1service.value="1 Year";
                        }else if (monthsOfG>=12){
                            document.EmployeeLoan.guaranter1service.value="More than a Year";
                        
                        }else{
                        document.EmployeeLoan.guaranter1service.value="Less than a year";
                    }  
                }
                if(element2!==null){
                    var joinedDG2 = document.getElementById('guar2_joinedDateId').value;
           
               var monthsOfG = checkMonths(joinedDG2);
               
        
        if(monthsOfG===12){
                        document.EmployeeLoan.guaranter2service.value="1 Year";
                        }else if (monthsOfG>=12){
                            document.EmployeeLoan.guaranter2service.value="More than a Year";
                        
                        }else{
                        document.EmployeeLoan.guaranter2service.value="Less than a year";
                    } 
                }
                 finalLeave();
                 number_of_instlmnts();
                 showApprovedLoan();
                 showInstlmnt();
          });
          
         function checkSubmit() {
                if(document.getElementById('datepicker')!==null){
                    document.getElementById('datepicker').value='';
                }
                if(document.getElementById('num_months_id')!==null){
                    document.getElementById('num_months_id').value='';
                }
                if(document.getElementById('percentageWPId')!==null){
                    document.getElementById('percentageWPId').value='';
                }
                if(document.getElementById('leavetakenId')!==null){
                    document.getElementById('leavetakenId').value='';
                }
                if(document.getElementById('loanforLeavesId')!==null){
                   document.getElementById('loanforLeavesId').value='';
                }
                if(document.getElementById('loanbeforeId')!==null){
                   document.getElementById('loanbeforeId').value='';
                }if(document.getElementById('guaranter2epfId')!==null){
                    document.getElementById('guaranter2epfId').value='';
                }if(document.getElementById('guaranter2Id')!==null){
                   document.getElementById('guaranter2Id').value='';
                }if(document.getElementById('guaranter2serviceId')!==null){
                    document.getElementById('guaranter2serviceId').value='';
                }
                if(document.getElementById('guaranter2Id')!==null){
                   document.getElementById('guaranter2Id').value='';
                }
                if(document.getElementById('approved_loanId')!==null){
                    document.getElementById('approved_loanId').value='';
                }
                if(document.getElementById('installmentsId')!==null){
                    document.getElementById('installmentsId').value='';
                }
                if(document.getElementById('loanrequestedId')!==null){
                    document.getElementById('loanrequestedId').value='';
                }
                
                if(document.getElementById('instId')!==null){
                    document.getElementById('instId').value='';
                }
                
                if(document.getElementById('guaranter1epfId')!==null){
                   document.getElementById('guaranter1epfId').value='';
                }
                
                if(document.getElementById('guaranter1Id')!==null){
                   document.getElementById('guaranter1Id').value='';
                }
                if(document.getElementById('Guarantor1ServId')!==null){
                   document.getElementById('Guarantor1ServId').value='';
                }
                if(document.getElementById('loanWPtestid')!==null){
                   document.getElementById('loanWPtestid').value='';
                }
                              
                var switch_val = document.getElementById('inputHiddenId1').value;
                if(switch_val=="2"){
                    $('#employeeLoanId').submit();
                     return false;
                }
            }
            function saveLoanData(){
                $('input[name=switch]').val('1');
                   $('#employeeLoanId').attr('action','control/loan_operation.php');
                   return false;
                    
            }
       
            function getGuarantorData(str){
             document.getElementById('inputHiddenId1').value=3;
               // if(switch_val=="3"){
                    //$('#employeeLoanId').attr('action','control/loan_operation.php');
                    $('#employeeLoanId').submit();
                     return false;
               // }
            }
            function printData(){
                $('#employeeLoanId').attr('action', 'loan-print.php');
                $('#employeeLoanId').submit();
            }
            
            function loadData() {
                var a = checkMonths();
                maxLoanPercentage();
                calculateMaxLoan();
                loanforLeaveAdjustment();
                finalLeave();
            }
                         
            function maxLoanPercentage() {
                var joinedDate_js = new Date(document.getElementById('joinedDateId').value);
                var today = new Date(document.EmployeeLoan.loanDate.value);
                
                var months = checkMonths();
                var maxloanp="";
                //------
                if (months >= 60) {
                    maxloanp = "150%";
                } else if (months >= 48) {
                    maxloanp = "140%";
                } else if (months >= 36) {
                    maxloanp = "130%";
                } else if (months >= 24) {
                    maxloanp = "120%";
                } else if (months > 12) {
                    maxloanp = "110%";
                } else if (months >= 10) {
                    if(today.getMonth()===joinedDate_js.getMonth()){
                        
                        if(today.getDate()>joinedDate_js.getDate()){
                            maxloanp = "110%";
                           
                        }else{
                            maxloanp = "100%";
                        }
                    }else if(today.getMonth()===joinedDate_js.getMonth()+1){
                        if(today.getData()<joinedDate_js.getData()){
                            maxloanp = "110%";
                        }
                        
                    }else if(months<12){
                        maxloanp = "100%";
                    }
                } else if (months >= 7) {
                    maxloanp = "75%";
                } else if (months >= 4) {
                    maxloanp = "50%";
                } else if (months >= 0) {
                    maxloanp = "25%";
                }

                document.EmployeeLoan.percentageWP.value = maxloanp;
                return maxloanp;
            }
        </script>

        <script>
            function loanforLeaveAdjustment() {
                var loanintermid = document.EmployeeLoan.bSalary.value;
                var leaveamount = document.EmployeeLoan.leavetaken.value;
                var temp = (document.EmployeeLoan.percentageWP.value).replace('%', '');
                var temp2 = parseInt(temp);
                var newPercentage = (temp2) - leaveamount;
                var newLoanAmount = (loanintermid * newPercentage) / 100;
                document.EmployeeLoan.loanforLeaves.value = newLoanAmount;
                finalLeave();
            }
        </script>

        <script>
            function finalLeave() {
                var elem1 = document.getElementById('loanforLeavesId');
                if(elem1!=null){
                    var loan_for_leaves =document.getElementById('loanforLeavesId').value;
                }
               var elem = document.getElementById('loanbeforeId');
                if(elem!=null){
                    var loan_before = document.getElementById('loanbeforeId').value;
                }
                 //.EmployeeLoan.loanbefore.value;
                var finalPermittedLeave = loan_for_leaves-loan_before;
                var elem2 = document.getElementById('loanpermittedId');
                if(elem2!=null){
                    document.getElementById('loanpermittedId').value = finalPermittedLeave;
                }
               // document.EmployeeLoan.loanpermitted.value = finalPermittedLeave;
                
            }
        </script>

        <script>
            function showYears() {

                var joinedDate = new Date(document.EmployeeLoan.joinedDate.value);
                var dd1 = joinedDate.getDate();
                
                var today = new Date();
                var diff = today - joinedDate;
                var numberOfDays = diff / (1000 * 3600 * 24);
                var numberOfYears = numberOfDays / 365.25;
                var roundedYears = Math.trunc(numberOfYears);
                
                return roundedYears;
            }
        </script>

        <script>
            function showRemainingMonths() {

                var joinedDate = new Date(document.EmployeeLoan.joinedDate.value);
                var today = new Date();
                var diff = joinedDate - today;
                var numberOfYears = diff / (1000 * 3600 * 24) / 365.25;
                var numberOfDays = diff / (1000 * 3600 * 24);
                var numberOfYears = numberOfDays / 365.25;

                var daysRemainig = numberOfDays % 365.25;
                var months = daysRemainig / 30;
                var roundedMonths = Math.trunc(months);
                return roundedMonths;
            }
        </script>

        <script>
            
            function viewOtherData() {
                laodData();
            }


            function showLoan() {
                maxLoanPercentage();
                calculateMaxLoan();
            }

            function showMonthAndPercent() {
                checkMonths();
                maxLoanPercentage();
            }
            
            
            

        </script>

    </head>
    <body>

        <!-- TOP NAVBAR -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color: #2b2b2b; font-family: 'Fjalla One', sans-serif;">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">HOME</a></li>
                        <li><a href="#">ABOUT</a></li>

                    </ul>
                    <div class="col-md-6">
                        <form class="navbar-form" role="search">
                            <div class="input-group" style="text-align: center;">
                                <input type="text" style="width: 500px; height: 32px; border: none;" class="form-control" placeholder="SEARCH..." name="q">

                                <div class="input-group-btn">
                                    <button class="btn btn-default grad1" type="submit"  style="border: none; color: white;"><i class="glyphicon glyphicon-search"></i></button>

                                </div>
                            </div>
                        </form>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="#">HOME</a></li>
                        <li><a href="#">ABOUT</a></li>

                    </ul>

                </div><!-- /.navbar-collapse -->
            </div>
        </nav>

        <!-- PAGE CONTENT -->

        <br><br><br><Br><br>

        <div class="container header">
            <label class="h" style="color: black;font-family: 'Fjalla One', sans-serif;">
                Loan Entry
            </label>
        </div>
        <div class="container" style="color: black;font-family: 'Fjalla One', sans-serif;">
            <?php
                    if(isset($_GET['msg'])){
                        $msg = $_GET['msg'];
                        ?>
                <span style="color: green"><?php echo $msg;?></span>
                   <?php
                   }
                ?>
            <form class="inline" name="EmployeeLoan" id = "employeeLoanId" class = "form-class" method="POST"  action="" onsubmit="">
                <input type="hidden" name="switch" id ="inputHiddenId1" value="2">
                
                
                <!---  --->
                
                <div class="row">
                    
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-3">                            
                            <label for="staff_no">EPF No.</label>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    
                                    <input class="form-control" type="text"  name="employeeID" id = "empId" style="width: 175px;" autocomplete="off" value="<?php echo isset($_POST['employeeID']) ? $_POST['employeeID'] : '' ?>">
                                    <button class="btn btn-success" type="button" id="searchBtnGId" onclick="checkSubmit()">
                                        <span class="glyphicon glyphicon-search" style="font-size: 12px;"></span>
                                        </button>

                                </span>
                            </div>
                        </div>
                   
                </div><br>
                </div> </br>
                <?php
                
                include 'model/loan-operation.php';

                if (isset($_POST['employeeID'])) {
                    $empId = $_POST['employeeID'];
                    //$plant = $_POST['plant'];
                    $obj = new Operation();
                    $result = $obj->getEmpLoanRelData($empId,'');
                    while ($row = mysqli_fetch_array($result)) {                                       
                    ?>
                         <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-3">                            
                            <label for="staff_no">Plant No.</label>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input class="form-control" id="plantId" type="text" value="<?php echo isset($row['plant_id'])?$row['plant_id']:0; ?>" name="plant"/>
                            </div>
                        </div>
                    </div>
                </div><br>
                    
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-2 col-md-offset-3">                            
                                    <label for="staff_no">Name</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="nameEmp" value="<?php echo $row['name']; ?>" >
                                          </div>
                                </div>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-2 col-md-offset-3">                            
                                    <label for="staff_no">Designation</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="designation" value="<?php echo $row['designation']; ?>" >
                                    </div>
                                </div>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-2 col-md-offset-3">                            
                                    <label>Joined Date</label>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <!--<input type="text" onchange="showMonthAndPercent()" class="form-control" id="datepicker" name="joinedDate">-->
                                        <input class="form-control" type="text" name="joinedDate" onkeyup="showLoan()" id = "joinedDateId" value="<?php echo $row['joined_date']; ?>" >

                                    </div>
                                </div>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-2 col-md-offset-3">                            
                                    <label>Loan applied Date</label>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text"  class="form-control" onchange="loadData()"  id="datepicker" value="<?php echo isset($_POST['loanDate'])?$_POST['loanDate']:'' ?>" name="loanDate">
                                        </div>
                                </div>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-2 col-md-offset-3">                            
                                    <label for="staff_no">Basic Salary</label>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input class="form-control" type="text" autocomplete="off" onkeyup="showLoan()" onchange="showLoan()" value="<?php echo $row['basic_salary']; ?>" id="bSarayId" name="bSalary">
                                       </div>
                                    </div>
                            </div>
                        </div><br>
<?php
                                    }
                                }
                                ?>
                        <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-3">                            
                            <label for="staff_no">Number of Months</label>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input class="form-control" type="text" id="num_months_id" value="<?php echo isset($_POST['nMonths'])?$_POST['nMonths']:'' ?>" name="nMonths">
                                
                            </div>
                        </div>
                    </div>
                </div><br>
                
                        <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-3">                            
                            <label for="staff_no">Percentage for the worked Period</label>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input class="form-control" type="text" id ="percentageWPId"  value="<?php echo isset($_POST['percentageWP'])?$_POST['percentageWP']:'' ?>" name="percentageWP">

                            </div>
                        </div>
                    </div>
                </div><br>

                <!-- -->
                   <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-3">                            
                            <label for="staff_no">Maximum Loan for the worked period</label>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input class="form-control" type="text" id ="loanWPtestid" value="<?php echo isset($_POST['loanWPtest'])?$_POST['loanWPtest']:'' ?>" name="loanWPtest">
                            </div>
                        </div>
                    </div>
                </div><br>
                <!-- -->

                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-3">                            
                            <label for="staff_no">Total leave taken this year</label>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group">
                                    <input class="form-control" type="text" autocomplete="off" onchange="loanforLeaveAdjustment()" onkeyup="loanforLeaveAdjustment()" value="<?php echo isset($_POST['leavetaken'])?$_POST['leavetaken']:'' ?>" name="leavetaken" id="leavetakenId" >
                                </div>    

                            </div>
                        </div>
                    </div>
                </div><br>

                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-3">                            
                            <label for="staff_no">Loan adjusted according to leave</label>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group">
                                    <input class="form-control" type="text" value="<?php echo isset($_POST['loanforLeaves'])?$_POST['loanforLeaves']:'' ?>" id="loanforLeavesId" name="loanforLeaves">
                                </div>    

                            </div>
                        </div>
                    </div>
                </div><br>
                
                <?php
               
                if (isset($_POST['employeeID'])) {
                    $empId = $_POST['employeeID'];
                    //$plant = $_POST['plant'];
                    $obj3 = new Operation();
                    $paidamount = $obj3->getPendingInst($empId);                    
                    $results= $obj3->loan_pending($empId);
                    $approved_amount = 0;
                    $pending_amount = 0;
                    $row = $results->fetch_assoc();
                    
                       if(isset($row['c'])){
                            $approved_amount = $row['c'];
                       }
                   
                       if(isset($approved_amount)){
                           $pending_amount = $approved_amount-$paidamount;
                    ?>
                <!-- -->
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-3">                            
                            <label for="staff_no">Loan taken before</label>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input class="form-control" type="text" autocomplete="off" onchange="finalLeave()" name="loanbefore" id="loanbeforeId" value="<?php echo isset($pending_amount)?$pending_amount:0 ?>">
                            </div>
                        </div>
                    </div>
                </div><br>
                <!-- -->
                  <?php 
                  
                    }
                }
                ?>
                
                
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-3">                            
                            <label for="staff_no">Final loan permitted</label>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input class="form-control" type="text" value="<?php echo isset($_POST['loanpermitted'])?$_POST['loanpermitted']:'0' ?>" name="loanpermitted" id="loanpermittedId">
                            </div>
                        </div>
                    </div>
                </div><br>
                
                 <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-3">                            
                            <label for="staff_no">Requested loan</label>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input class="form-control" type="text" value="<?php echo isset($_POST['loanrequested'])?$_POST['loanrequested']:'' ?>" name="loanrequested" id="loanrequestedId">
                            </div>
                        </div>
                    </div>
                </div><br>
                
                <!-- -->
                
                
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-3">                            
                            <label for="staff_no">Reason for this loan</label>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="form-group">
                                    <select class="form-control" id="reasonSelectId"  name="reasonSelect">
                                        <option value ="Surgery" <?php if(isset($_POST['reasonSelectId']) && $_POST['reasonSelectId'] == "Surgery") echo 'selected="selected"';?>>Surgery</option>
                                        <option value ="Medical Treatment" <?php if(isset($_POST['reasonSelectId']) && $_POST['reasonSelectId'] == "Medical Treatment") echo 'selected="selected"';?>>Medical Treatment</option>
                                        <option value="Wedding" <?php if(isset($_POST['reasonSelectId']) && $_POST['reasonSelectId'] == "Wedding") echo 'selected="selected"';?>>Wedding</option>
                                        <option value="House_Construction" <?php if(isset($_POST['reasonSelectId']) && $_POST['reasonSelectId'] == "House Construction") echo 'selected="selected"';?>>House Construction</option>
                                        <option value="Other" <?php if(isset($_POST['reasonSelectId']) && $_POST['reasonSelectId'] == "Other") echo 'selected="selected"';?>>Other reason</option>

                                    </select>
                                    <!--<input class="form-control" type="text" id="loanReasonId"/> -->
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div><br>
                
               
                <!-- 
                <fieldset>
                 <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-3">                            
                            <label for="staff_no">Plant No.</label>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input class="form-control" id="plantId_g1" type="text" value="<?php //echo isset($_POST['plant_g1']) ? $_POST['plant_g1'] : '' ?>" name="plant_g1">
                            </div>
                        </div>
                    </div>
                </div><br>
                -->
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-3">                            
                            <label for="staff_no">EPF No. of Guarantor 1</label>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    
                                    <input class="form-control" type="text"  name="guaranter1epf" id="guaranter1epfId" style="width: 175px;" value="<?php echo isset($_POST['guaranter1epf']) ? $_POST['guaranter1epf'] : '' ?>">
                                        <button class="btn btn-success" type="button" id="searchBtnGId" onclick="getGuarantorData(this.value)">
                                        <span class="glyphicon glyphicon-search" style="font-size: 12px;"></span>
                                        </button>

                                </span>
                            </div>
                        </div>
                    </div>
                </div><br> 
                <!--  -->
                
                <?php
                
               
               // if($_POST['switch']===3){
                if (isset($_POST['guaranter1epf'])) {
                    $empId = $_POST['guaranter1epf'];
                    //$plant = $_POST['plant_g1'];

                    $objGuarenter = new Operation();
                    $result = $objGuarenter->getEmpLoanGurantorRelData($empId);
                    while ($row = mysqli_fetch_array($result)) { 
                        ?>
                   
                 <!-- -->
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-3">                            
                            <label for="staff_no">Name</label>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input class="form-control" id="guaranter1Id" type="text" value="<?php echo $row['name'] ?>" name="guaranter1">
                            </div>
                        </div>
                    </div>
                </div><br>

                <input type="hidden" name="guar1_joinedDate" id="guar1_joinedDateId" value="<?php echo $row['joined_date'];  ?>">
                <!---  --->
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-3">                            
                            <label for="staff_no">Service</label>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input class="form-control" type="text" value="" id="Guarantor1ServId" name="guaranter1service">
                            </div>
                        </div>
                    </div>
                </div><br>
                </fieldset>
                <!---
                 <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-3">                            
                            <label for="staff_no">Plant No.</label>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input class="form-control" id="plantId_g2" type="text" value="
                                    <?php //echo isset($_POST['plant_g2']) ? $_POST['plant_g2'] : '' ?>" name="plant_g2">
                            </div>
                        </div>
                    </div>
                </div><br>
                --->
               
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-3">                            
                            <label for="staff_no">EPF No.of Guarentor 2</label>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    
                                    <input class="form-control" type="text"  name="guaranter2epf" id="guaranter2epfId" style="width: 175px;" value="<?php echo isset($_POST['guaranter2epf']) ? $_POST['guaranter2epf'] : '' ?>">
                                        <button class="btn btn-success" type="button" id="searchBtnG2Id" onclick="getGuarantorData(this.value)">
                                        <span class="glyphicon glyphicon-search" style="font-size: 12px;"></span>
                                        </button>

                                </span>
                            </div>
                        </div>
                    </div>
                </div><br>
                
                
                  <!-- -->
              
                  <!-- --->
                   <?php  
                    }
                    }
               // }
             
                    if (isset($_POST['guaranter2epf'])) {
                    $empId = $_POST['guaranter2epf'];
                    //$plant = $_POST['plant_g2'];

                    $objGuarenter2 = new Operation();
                    $result = $objGuarenter2->getEmpLoanGurantorRelData($empId);
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                  
                <!---  --->
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-3">                            
                            <label for="staff_no">Name</label>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input class="form-control" type="text" value="<?php  echo $row['name']?>" name="guaranter2" id="guaranter2Id">
                            </div>
                        </div>
                    </div>
                </div><br>
                
                <!--  -->
                <input type="hidden" name="guar2_joined_date" id="guar2_joinedDateId" value="<?php echo $row['joined_date'];  ?>" />

                <!--  -->
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-3">                            
                            <label for="staff_no">Service</label>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input class="form-control" value="" type="text" id="guaranter2serviceId" name="guaranter2service">
                                
                            </div>
                        </div>
                    </div>
                </div><br>
                
                 <!-- -->
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-3">                            
                            <label for="staff_no">Approved Loan</label>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input class="form-control" id="approved_loanId" type="text" name="approved_loan" id="approved_loanId">
                            </div>
                        </div>
                    </div>
                </div><br>
                <!---  --->
                
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-3">                            
                            <label for="staff_no">Number of Installments</label>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input class="form-control" id="installmentsId" type="text" value="" name="installments">
                            </div>
                        </div>
                    </div>
                </div><br>
                <!---  --->
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-3">                            
                            <label for="staff_no">Installment</label>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input class="form-control" id="instId" type="text" value="" name="installment">
                            </div>
                        </div>
                    </div>
                </div><br>
                <!---  --->
               
                <div class="row">
                    <span class="input-group"
                    <div class="form-group">
                        <div class="col-md-4">                            
                            <button style="margin-left: 620px; width:75px;" type="submit" onclick="printData()" class="btn btn-success" formtarget="_blank">Print</button>
                            <button style="margin-left: 620px; width:75px;" type="submit" onclick="saveLoanData()"class="btn btn-primary">Save</button>
                        </div>
                    </span>
                    </div>
                  
                 <?php  
                    }
                    }
                        ?>
   
        <br>
 </form>
            </div>

    <script>
        function test() {
            var test = document.EmployeeLoan.leavetaken.value;
        }

    </script>
    

</body>
</html>
