

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
         function checkMonths() {
                var joinedDate_js = new Date(document.getElementById('joinedDateId').value);
                var today = new Date(document.EmployeeLoan.loanDate.value);
                var diff = today - joinedDate_js;
                var yearOfJoinedDate = joinedDate_js.getFullYear();
                var monthOfJoinedDate = joinedDate_js.getMonth();
                var dateOfJoinedDate = joinedDate_js.getDate();
                var yearOfToday = today.getFullYear();
                var monthOfToday = today.getMonth();
                var dateOfToday = today.getDate;
                var numberOfYears = diff / (1000 * 3600 * 24*365.25);
                
                var monthExactValue = numberOfYears*12;
                
                if(today.getYear()===joinedDate_js.getYear()){
                    if(today.getDate()>=joinedDate_js.getDate()){
                        var num_months = today.getMonth()-joinedDate_js.getMonth();
                        document.EmployeeLoan.nMonths.value = num_months;
                        return num_months;
                    }else{
                        var num_months = today.getMonth()-joinedDate_js.getMonth()-1;
                        document.EmployeeLoan.nMonths.value = num_months;
                        return num_months;
                    }
                }else if(today.getYear()-joinedDate_js.getYear()===1){
                    if(today.getDate()>=joinedDate_js.getDate()){
                        var num_months = (12-joinedDate_js.getMonth())+today.getMonth();
                        document.EmployeeLoan.nMonths.value = num_months;
                        return num_months;
                    }else{
                        var num_months = (12-joinedDate_js.getMonth())+(today.getMonth()-1);
                        document.EmployeeLoan.nMonths.value = num_months;
                        return num_months;
                    }
                        
                }else if(today.getMonth()>=joinedDate_js.getMonth()){
                        if(today.getDate()>=joinedDate_js.getDate()){
                            var num_years = today.getYear()-joinedDate_js.getYear();
                            var num_months = today.getMonth()-joinedDate_js.getMonth();
                            var total_months = (num_years*12)+num_months;
                            document.EmployeeLoan.nMonths.value = total_months;
                            return total_months;
                        }else{
                            var num_years = today.getYear()-joinedDate_js.getYear();
                            var num_months = today.getMonth()-joinedDate_js.getMonth()-1;
                            var total_months = (num_years*12)+num_months;
                            document.EmployeeLoan.nMonths.value = total_months;
                            return total_months;
                        }
                    }else if(today.getMonth()<joinedDate_js.getMonth()){
                        if(today.getDate()>=joinedDate_js.getDate()){
                            var adjusted_year = today.getYear()-1;
                            var num_years = adjusted_year-joinedDate_js.getYear();
                            var num_months = 12-joinedDate_js.getMonth();
                            var curr_year_months = today.getMonth();
                            var total_months = (num_years*12)+num_months+curr_year_months;
                            document.EmployeeLoan.nMonths.value = total_months;
                            return total_months;
                        }else{
                            var adjusted_year = today.getYear()-1;
                            var num_years = adjusted_year-joinedDate_js.getYear();
                            var num_months = 12-joinedDate_js.getMonth();
                            var curr_year_months = today.getMonth()-1;
                            var total_months = (num_years*12)+num_months+curr_year_months;
                            document.EmployeeLoan.nMonths.value = total_months;
                            return total_months;
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
           
            function calculateMaxLoan() {
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
        </script>

        <script>
            function checkSubmit() {
                var switch_val = document.getElementById('inputHiddenId1').value;
                if(switch_val=="5"){
                    $('#employeeLoanId').submit();
                     return false;
                }
            }
            function saveLoanData(){
                $('input[name=switch]').val('4');
                    $('#employeeLoanId').attr('action', 'control/operation.php');
                    $('#employeeLoanId').submit();
            }
            
            function printData(){
                $('#employeeLoanId').attr('action', 'loan-print-new.php');
                $('#employeeLoanId').submit();
            }
            
            /*function selectingItems(str) {
              if(str==="Other"){
                    document.getElementById('loanReasonId').style.display = "block";
                }

            }*/
            function loadData() {
               
                checkMonths();
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
            }
        </script>

        <script>
            function finalLeave() {
                var finalPermittedLeave = document.EmployeeLoan.loanforLeaves.value - document.EmployeeLoan.loanbefore.value;
                document.EmployeeLoan.loanpermitted.value = finalPermittedLeave;
            }
        </script>

        <script>
            function showYears() {

                var joinedDate = new Date(document.EmployeeLoan.joinedDate.value);
                var dd1 = joinedDate.getDate();
                
                var today = new Date();
                var diff = today - joinedDate;
                var numberOfDays = diff / (1000 * 3600 * 24)
                var numberOfYears = numberOfDays / 365.25
                var roundedYears = Math.trunc(numberOfYears);
                
                return roundedYears;
            }
        </script>

        <script>
            function showRemainingMonths() {

                var joinedDate = new Date(document.EmployeeLoan.joinedDate.value);
                var today = new Date();
                var diff = joinedDate - today;
                var numberOfYears = diff / (1000 * 3600 * 24) / 365.25
                var numberOfDays = diff / (1000 * 3600 * 24)
                var numberOfYears = numberOfDays / 365.25

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
            <form name="EmployeeLoan" id = "employeeLoanId" class = "form-class" method="POST"  action="" onsubmit="">
                <input type="hidden" name="switch" id ="inputHiddenId1" value="5">
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-3">                            
                            <label for="staff_no">Employee ID</label>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input class="form-control" type="text" id = "empId" style="width: 175px;" autocomplete="off" value="<?php echo isset($_POST['employeeID']) ? $_POST['employeeID'] : '' ?>" name="employeeID" required="">
                                <div class="row">
                                    <div class="col-md-6" style="position: relative;">
                                        <button class="btn btn-success" type="button" id="searchBtnId" onclick="checkSubmit()">
                                            <span class="glyphicon glyphicon-search" style="font-size: 12px;"></span>
                                        </button>
                                        </div>
                                    </div>
                               <!-- </span> -->

                            </div>
                        </div>
                    </div>
                </div><br>

                <?php
                include './model/operation.php';

                if (isset($_POST['employeeID'])) {
                    $empId = $_POST['employeeID'];

                    $obj = new Operation();
                    $result = $obj->getEmpLoanRelData($empId);
                    while ($row = mysqli_fetch_array($result)) { 
                        ?>

                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-2 col-md-offset-3">                            
                                    <label for="staff_no">Name</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="name" value="<?php echo $row['name']; ?>" >
                                      <!--  <input type="hidden" name="hiddenEmpId" id ="inputHiddenempId" value="<?php echo $row['$employee_id']; ?>">-->

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
                                        <input type="text"  class="form-control" onchange="loadData()"  id="datepicker" name="loanDate">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-2 col-md-offset-3">                            
                                    <label for="staff_no">Basic Salary</label>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">

                                        <input class="form-control" type="text" autocomplete="off" onkeyup="showLoan()" value="<?php echo $row['basic_salary']; ?>" id="bSarayId" name="bSalary">
                                        <?php
                                    }
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div><br>


                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-3">                            
                            <label for="staff_no">Number of Months</label>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input class="form-control" type="text" name="nMonths">
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
                                <input class="form-control" type="text"id ="percentageWPId" name="percentageWP">

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
                                <input class="form-control" type="text" id ="loanWPtestid" name="loanWPtest">
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
                                    <input class="form-control" type="text" autocomplete="off" onchange="loanforLeaveAdjustment()" onkeyup="loanforLeaveAdjustment()" name="leavetaken" >
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
                                    <input class="form-control" type="text"   name="loanforLeaves">
                                </div>    

                            </div>
                        </div>
                    </div>
                </div><br>


                <!-- -->
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-3">                            
                            <label for="staff_no">Loan taken before</label>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input class="form-control" type="text" autocomplete="off" onkeyup="finalLeave()" name="loanbefore">
                            </div>
                        </div>
                    </div>
                </div><br>
                <!-- -->

                <!-- -->
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-3">                            
                            <label for="staff_no">Final loan permitted</label>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input class="form-control" type="text" name="loanpermitted">
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
                                    <select class="form-control" id="reasonSelectId" onchange="selectingItems(this.value)" name="reasonSelect">
                                        <option value ="Surgery">Surgery</option>
                                        <option value ="Surgery">Medical Treatment</option>
                                        <option value="Wedding">Wedding</option>
                                        <option value="House_Construction">House Construction</option>
                                        <option value="Other">Other reason</option>

                                    </select>
                                    <!--<input class="form-control" type="text" id="loanReasonId"/> -->
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div><br>

                <!-- -->
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-3">                            
                            <label for="staff_no">Requested loan</label>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input class="form-control" type="text"  name="loanrequested">
                            </div>
                        </div>
                    </div>
                </div><br>
                <!-- -->

                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-3">                            
                            <label for="staff_no">Guarantor 1.</label>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input class="form-control" type="text"  name="guaranter1">
                            </div>
                        </div>
                    </div>
                </div><br>
                <!---  --->

                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-3">                            
                            <label for="staff_no">EPF No.</label>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input class="form-control" type="text"  name="guaranter1epf">
                            </div>
                        </div>
                    </div>
                </div><br>

                
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-3">                            
                            <label for="staff_no">Service</label>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input class="form-control" type="text"  name="guaranter1service">
                            </div>
                        </div>
                    </div>
                </div><br>
                
                
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-3">                            
                            <label for="staff_no">Guarentor 2</label>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input class="form-control" type="text"  name="guaranter2">
                            </div>
                        </div>
                    </div>
                </div><br>
                
                
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-3">                            
                            <label for="staff_no">EPF No.</label>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input class="form-control" type="text"  name="guaranter2epf">
                            </div>
                        </div>
                    </div>
                </div><br>
                
                
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-3">                            
                            <label for="staff_no">Service</label>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input class="form-control" type="text"  name="guaranter2service">
                            </div>
                        </div>
                    </div>
                </div><br>
                
               
                <div class="row">
                    <span class="input-group"
                    <div class="form-group">
                        <div class="col-md-4">                            
                            <button style="margin-left: 620px; width:75px;" type="submit" onclick="printData()" class="btn btn-success" formtarget="_blank">Print</button>
                            <button style="margin-left: 620px; width:75px;" type="submit" onclick="saveLoanData()"class="btn btn-primary">Save</button>
                        </div>
                    </span>
                    </div>
                    
               
                   </div>
        </div><br>
 </form>


    <script>
        function test() {
            var test = document.EmployeeLoan.leavetaken.value;
        }

    </script>
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    <script src="scripts/jquery-ui.js"></script>


</body>
</html>