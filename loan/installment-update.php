<!DOCTYPE html>

<html>
    <head>
        <style>
            @import url('https://fonts.googleapis.com/css?family=Fjalla+One');
        </style>
        <title>Loan Installment Update</title>
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
            
            .h{
                color :black;
                font-weight: normal;
                font-size: 25px;

            }
            
            .selec{
                padding: 9px;
                border: solid 1px #517B97;
            }
            
            .container label{
                color :black;
                font-weight: normal;
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
        </style>
        <style>
            .entry:not(:first-of-type)
            {
                margin-top: 10px;
            }

        </style>
        <style>

            .grad1 {

                background: #4776E6; /* For browsers that do not support gradients */    
                background: -webkit-linear-gradient(left top, #4776E6, #8E54E9); /* For Safari 5.1 to 6.0 */
                background: -o-linear-gradient(bottom right, #4776E6, #8E54E9); /* For Opera 11.1 to 12.0 */
                background: -moz-linear-gradient(bottom right, #4776E6, #8E54E9); /* For Firefox 3.6 to 15 */
                background: linear-gradient(to bottom right, #4776E6, #8E54E9); /* Standard syntax (must be last) */
            }
            
        table {
        width: 100%;
        border-collapse: collapse;
       
        }

        table, td, th {
        border: 1px solid black;
        padding: 5px;
        text-align: center;
        }

        th {
            text-align: left;
        }
       
            input{
                
             border: 0;
    box-shadow: none;
}
            .button_example{
                
border:1px solid #4B546A;-webkit-box-shadow: #B7B8B8 0px 1px 0px inset;-moz-box-shadow: #B7B8B8 0px 1px 0px inset; box-shadow: #B7B8B8 0px 1px 0px inset; -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px;font-size:12px;font-family:arial, helvetica, sans-serif; padding: 10px 10px 10px 10px; text-decoration:none; display:inline-block;text-shadow: -1px -1px 0 rgba(0,0,0,0.3);font-weight:bold; color: #FFFFFF;
 background-color: #CEDCE7; background-image: -webkit-gradient(linear, left top, left bottom, from(#CEDCE7), to(#596a72));
 background-image: -webkit-linear-gradient(top, #CEDCE7, #596a72);
 background-image: -moz-linear-gradient(top, #CEDCE7, #596a72);
 background-image: -ms-linear-gradient(top, #CEDCE7, #596a72);
 background-image: -o-linear-gradient(top, #CEDCE7, #596a72);
 background-image: linear-gradient(to bottom, #CEDCE7, #596a72);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#CEDCE7, endColorstr=#596a72);
}

.button_example:hover{
 border:1px solid #4B546A;
 background-color: #acc4d6; background-image: -webkit-gradient(linear, left top, left bottom, from(#acc4d6), to(#434f55));
 background-image: -webkit-linear-gradient(top, #acc4d6, #434f55);
 background-image: -moz-linear-gradient(top, #acc4d6, #434f55);
 background-image: -ms-linear-gradient(top, #acc4d6, #434f55);
 background-image: -o-linear-gradient(top, #acc4d6, #434f55);
 background-image: linear-gradient(to bottom, #acc4d6, #434f55);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#acc4d6, endColorstr=#434f55);
}
.invi{
    display: none;
}

        </style>
        <script>
            
              function checkSubmit() {
                var switch_val = document.getElementById('inputHiddenId1').value;
                if(switch_val=="3"){
                    $('#employeeLoanInstId').submit();
                     return false;
                }
            }
            
            function saveLoanData(){
                $('input[name=switch]').val('4');
                   $('#employeeLoanInstId').attr('action','control/loan_operation.php');
                   return false;
            }
            function makeEditable(){
                $("input[name^='reason']").prop('readonly', false);
            }
            
            function makeInstEditable(){
                $("input[name^='inst']").prop('readonly', false);
            }
            
            function saveLoanInstData(){
                              
                $('input[name=switch]').val('6');
                $('#employeeLoanInstId').attr('action','control/loan_operation.php');
                   return false;
            }
            
            function Nopayment(){
                $("input[name^='reason']").prop('readonly', false);
                $('input[name=switch]').val('7');
                $('#employeeLoanInstId').attr('action','control/loan_operation.php');
                   return false;
            }
                                   
            function getPendingLoans(){
                 $('#employeeLoanInstId').submit();
                     return false;
            }
            
            $( document ).ready(function() {
                if($('#empId').val()==''){
                    $( "#msgId" ).hide();
                }
                $( "#morepending" ).hide();
             $(".c_readonly").prop('readonly', true);
              if($("#hidden_morerowsId").val()>0){
                  $( "#msgId" ).hide();
                  $( "#msgnotId" ).hide();
              }
              if($("#hidden_morerowsId").val()>1){
                  $( "button:hidden" ).show( "fast" );
                  $( ".invi:hidden" ).show( "fast" );
                   $( ".ind" ).hide( "fast" );
                   $("input[name^='reason']").prop('readonly', false);
                   $("input[name^='inst']").prop('readonly',false);
               }
               
                if($("#morependingId").val()==1){
                   $( "#morepending" ).show( "fast" );
                   $( "#moreloansId" ).hide();
                }
               
               $( "input[type=checkbox]" ).click(function (){ 
               if($( "input[name^='chnopay']:checked" )){
                    $( "input[name^='check_value']:hidden" ).val('checked');      
                   }
               });
          });               
          
        
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
                                    <button class="btn btn-default grad1" type="submit" style="border: none; color: white;"><i class="glyphicon glyphicon-search"></i></button>
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

        <br><br><br><Br><br><br><Br>
        <div class="container-fluid" style="font-family: 'Fjalla One', sans-serif; text-align: center; margin: 50px;">
            
            <div class="container header">
            <label class="h" style="color: black;font-family: 'Fjalla One', sans-serif;">
                Loan Installment Update
            </label>
            </div></br></br>
            
            <div class="container" style="color: black;font-family: 'Fjalla One', sans-serif;">
            <form class="inline" name="EmployeeLoanInst" id = "employeeLoanInstId" class = "form-class" method="POST"  action="" >
              <input type="hidden" name="switch" id ="inputHiddenId1" value="3">  
                
                
                <!--    ----   --->
                         
           <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-3">                            
                            <label for="staff_no">EPF No.</label>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group"><span>
                                <input class="form-control" type="text" id = "empId" style="width: 175px;" autocomplete="off" value="<?php echo isset($_POST['employeeID']) ? $_POST['employeeID'] : '' ?>" name="employeeID" required="">
                                <button class="btn btn-success" type="button" id="searchBtnId" onclick="getPendingLoans()">
                                            <span class="glyphicon glyphicon-search" style="font-size: 12px;"></span>
                                        </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div><br>
                
                <td><button class="button_example invi" style="width:75px;" type="submit" id="full" onclick="saveLoanInstData()">Submit</button></td>
                <br>
                  <?php
                    $msg = "";
                    if(isset($_GET['msg'])){
                        $msg = $_GET['msg'];
                   }
               
                include 'model/loan-operation.php';
                    $empId="";
                    $plant="";
                if (isset($_POST['employeeID'])) {//&&isset($_POST['plant'])
                    $empId = $_POST['employeeID'];
                    //$plant = $_POST['plant'];
                }
                    $obj = new Operation();
                    $result_emp_exist = $obj->getEmpLoanRelData($empId,'');
                   
                    $result = $obj->getInstallmentData($empId,''); 
                    if(mysqli_num_rows($result_emp_exist)==0){
                        $msg = "Employee EPF should be entered properly";
                    }else if((mysqli_num_rows($result_emp_exist)!=0)&&(mysqli_num_rows($result)==0)){
                        $msg = "No Pending Installments";
                    }
                    ?>
                <br>
         <span style="color: green" id="msgId"><?php echo $msg;?></span>
         
         
                    <br>                   
                        <?php
                   if(mysqli_num_rows($result)!=0){
                    
                    $loan_num =mysqli_num_rows($result);
                    $_POST['rowcount'] = mysqli_num_rows($result);
                        if($loan_num>1){?>
        <span id="moreloansId" style="color: blue">This employee has <?php echo $loan_num ?> loan installments to be updated<br></span>
                <?php
                        }
                        ?>
                <input type="hidden" name="hidden_morerows" id="hidden_morerowsId" value="<?php echo $loan_num ?>">
                
        <table class="table-bordered table-striped table-hover">
        
        <tr>
        <td style="width:25%">Name</td>
        <td style="width:10">Installment</td>
        <td style="width:15%">Number of Installments</td>
        <td style="width:10%">Paid Installments No</td>
        <td style="width:10%" id="chtextId">Paying Date</td>
        <td style="width:15%">Comment</td>
        <td></td>
        <td class="ind"></td>
        
        </tr>
       <?php
       
        $count = 0;
        $approved_amount[$count] = 0;
        $current_total[$count] = 0;
        while($row = $result->fetch_assoc()){           
                        
            $loan[$count] = $row['loan_id'];
            $current_inst[$count] = $row['current_installments'];            
            $num_of_inst[$count] = $row['num_installments'];           

            $emp_Id = $row['employee_id'];
            if(($num_of_inst[$count]-$current_inst[$count])==1){
                $res[$count] = $obj->getEmployeePayment_perLoan($emp_Id,$loan[$count]);
                $row4[$count] = $res[$count]->fetch_assoc();
                $current_total[$count] = $row4[$count]['current_tot'];
                
                $approved_amount[$count] = $row['approved_amount'];
                $amount_pending[$count] = $approved_amount[$count]-$current_total[$count];
                $morepending[$count] ='';
                if($amount_pending[$count]>=$row['installment']){
                    $morepending[$count] =1;               
                   
                }else{
                    $morepending[$count] =0;
                }
                
                 
                 ?>
        
        <input type="hidden" name="morepending" id="morependingId" value="<?php echo $morepending[$count]; ?>">
        <span style="color: red" id="morepending"> <?php echo isset($amount_pending[$count])?$amount_pending[$count].' ':'0'; ?> should be paid instead of  <?php echo' '. isset($row['installment'])?$row['installment']:'0'; ?>for this final installment</span><br>
         
                    <?php
           }
            ?>
        
        <tr><input  type = "hidden" class="c_readonly" type="text" name="emp_id[]" value =" <?php echo $row['employee_id']; ?>" >
        <input type="hidden" name="loanid[]" id="loanidId" value="<?php echo $row['loan_id']; ?>" >
        <td><input style="width:100%;" class="c_readonly" type="text" name="name[]" value =" <?php echo $row['name']; ?>" ></td>
        <td><input class="c_readonly" type="text" name="inst[]" id="instId" onfocus="makeInstEditable()" value =" <?php echo $row['installment']; ?>" ></td>
        <td><input class="c_readonly" type="text" name="ins_num[]" value =" <?php echo $row['num_installments']; ?>" ></td>
        <td><input class="c_readonly" type="text" name="curr_ins[]" value =" <?php echo $row['current_installments']; ?>" ></td>
        <td><input type="text" id="datepicker"  name="inst_paydate[]" required=""></td>
        <td><input class="c_readonly" type="text" name="reason[]" id="reasonId" value ="" onfocus="makeEditable()">
        </td>
        <td>
            
            <select name="sel[]">
            <option value="pay">Pay</option>
            <option value="no">Not Pay</option>
            </select>
        </td>
        <td class="ind"><button class="button_example ind" style="width:75px;" type="submit" id="full" onclick="saveLoanInstData()">Submit</button>
            </td>
        
            
        
               
        </tr>
        <?php
        $count++;
        }
        }     
        
        ?>
                </table>
            </form>        
                
                    </div>
                    

        </div>
    </body>
</html>
