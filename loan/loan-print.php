<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script>
            
           
        </script>
        <style> 
@font-face {
    font-family: myFirstFont;
    src: url(Consolas.ttf);
}

div {
    font-family: myFirstFont;
}

input{
        border: 0;
        box-shadow: none;
    }

 table {
        width: 100%;
        border: 1;
        border-radius:4px;
        }

        table, td, th {
            padding: 5px;
         }
        
        #first{
        border: 1px solid black;
        
              }
              #first.row{
                  border-bottom: none;
              }
              #second{
                   border: 1px solid black;
                   border-bottom: none;
                   border-top: none;
              }
              #third td {
                  border: 1px solid black;
                  
                }
              
              #third{
                  border: 1px solid black;
                  border-collapse: collapse;
                  width: 100%;
              }
              
              #third_id{
                  border: 0;
              }
              #fourth{
                  border: 1px solid black;
                  border-bottom: 0;
                  border-top: 0;
              }
              #fifth{
                  border: 1px solid black;
                  border-top: 0;
                  
              }
              #mid{
                  border: 1px solid black;
                  border-bottom: 0;
                  border-top: 1; 
}

 @page {
     size: A4/2;
    margin: 0;
}
@media print {
    .page {
        margin: 0;
        border: initial;
        border-radius: initial;
        width: initial;
        min-height: initial;
        box-shadow: initial;
        background: initial;
        page-break-after: always;
    }
}

</style>
<script>
 function printingDoc(){
     window.print();
 }   
  
</script>


</head>
    <body>
        <div id="printableArea">
        <table id="first">
            <tr>
                <td   border-right: none style="text-align: center;">
                    <b><u> සුගන්දා ඇපරල්  ණය ඉල්ලුම් පත්‍රය</u></b>
                </td>
                <td> </td>
            </tr>
            <tr>
                <td rowspan="2" style="line-height: 17px;padding-bottom: 0px;"><div class="row">
                    අර්ථසා අං.
                    <input style="border: 0;box-shadow: none;" type="text" value="<?php echo isset($_POST['employeeID']) ? $_POST['employeeID'] : '' ?>"/>
                    </div>
                </td>
                
                <td style="text-align: right;">
                    
                    <div class="row" >
                     ආ. අංකය
                        <input  type="text" value="<?php echo isset($_POST['plant']) ? $_POST['plant'] : '' ?>" style="border: 0;box-shadow: none;"/>
                    </div>
                    <div class="row">
                       යොමු අංකය<input type="text" style="border: 0;box-shadow: none;"/>
                   </div>
                </td>
            </tr>
            <tr></tr>
        </table>
            <table id="second" style="border-collapse: collapse;" border= 1>
            <col width="15%">
            <col width="35%">
            <col width="15%">
            <col width="35%">
            
            <tr><div border = 1>
                <td class="row">
                    මුලකුරු සමග නම
                </td>
                <td>
                    <input style="border: 0;box-shadow: none;width: 100%;" value="<?php echo isset($_POST['nameEmp']) ? $_POST['nameEmp'] : '' ?>">                    
                </td>
                <td>1.ඇපකරු නම</td>
                <td><input style="border: 0;box-shadow: none;width: 100%;" value="<?php echo isset($_POST['guaranter1']) ? $_POST['guaranter1'] : '' ?>">                    
                </td>
                </div>
            </tr> 
            
            <tr border = 1>
            <div>
                <td class="row">
                   තනතුර
                </td>
                <td>
                <input style="border: 0;box-shadow: none;" value="<?php echo isset($_POST['designation']) ? $_POST['designation'] : '' ?>" >                    
                </td>
                <td> අර්ථසා අං.</td>
                <td><input style="border: 0;box-shadow: none;" value="<?php echo isset($_POST['guaranter1epf']) ? $_POST['guaranter1epf'] : '' ?>">                    
                </td>
            </div>
            </tr>
            
            <tr border = 1>
            <div class="row">
                <td>
                    ආයතනයට ඇතුළත්වූ දිනය
                </td>
                <td>
                    <input style="border: 0;box-shadow: none;" value="<?php echo isset($_POST['joinedDate']) ? $_POST['joinedDate'] : '' ?>">                    
                </td>
                <td>සේවා කාලය</td>
                <td><input style="border: 0;box-shadow: none;" value="<?php echo isset($_POST['guaranter1service']) ? $_POST['guaranter1service'] : '' ?>">                    
                </td>
            </div>
            </tr>
            
            <tr border = 1>
            <div class="row">
                <td>
                   ඉල්ලුම් කරන දිනය
                </td>
                <td>
                    <input style="border: 0;box-shadow: none;" value="<?php echo isset($_POST['loanDate']) ? $_POST['loanDate'] : '' ?>">                    
                </td>
                <td>2.ඇපකරු නම</td>
                <td><input style="border: 0;box-shadow: none;width: 100%;" value="<?php echo isset($_POST['guaranter2']) ? $_POST['guaranter2'] : '' ?>">                    
                </td>
            </div>
            </tr>
            
            <tr border = 1>            
            <div class="row">
                <td>
                  සේවා කාලය මාස
                </td>
                <td>
                    <input style="border: 0;box-shadow: none;" value="<?php echo isset($_POST['nMonths']) ? $_POST['nMonths'] : '' ?>">                    
                </td>
                <td>අර්ථසා අං.</td>
                <td><input style="border: 0;box-shadow: none;" value="<?php echo isset($_POST['guaranter2epf']) ? $_POST['guaranter2epf'] : '' ?>">                    
                </td>
            </div>
            </tr>
            
            <tr border = 1>
            <div class="row">
            <td>
                  ණය ලබා ගැනීමට හේතුව
                </td>
                <td>
                    <input style="border: 0;box-shadow: none;" value="<?php echo isset($_POST['reasonSelect']) ? $_POST['reasonSelect'] : '' ?>">                    
                </td>
                <td>සේවා කාලය</td>
                <td><input style="border: 0;box-shadow: none;" value="<?php echo isset($_POST['guaranter2service']) ? $_POST['guaranter2service'] : '' ?>">                    
                </td>
             </div>   
            </tr>
            
            <tr> <td>
                    ඉල්ලුම් කරන මුදල රු.
                </td>
            <td>
                    <input style="border: 0;box-shadow: none;" value="<?php echo isset($_POST['loanrequested']) ? $_POST['loanrequested'] : '' ?>"> 
                </td>
                <td></td>
                <td></td>
            </tr>
        </table>
            <table id="third" style="width: 100%;">
               
            <div class="row">
                <td id="third_id" colspan="3">
                    <u><b> ණය මුදල ගණනය කිරීම</b></u>
            </td>
            </div>
            <tr>
                <td style="width: 12.5%;">
                    මූලික වැටුප රු.

                </td>
                
                 <td style="width: 12.5%;">
                    සේවා කාලය අනුව හිමි වන ප්‍රතිශතය
                </td>
                
                 <td style="width: 12.5%;">
                    සේවා කාලය අනුව හිමි වන උපරිම ණය මුදල.
                </td>
                
                 <td style="width: 12.5%;">
                    මෙම වසර තුළ ලබා ගත් නිවාඩු සංඛයාව
                </td>
                
                 <td style="width: 12.5%;">
                    ලබා ගත් නිවාඩු අනුව හිමිවන ප්‍රතිශතය
                </td>
                
                 <td style="width: 12.5%;">
                    ලබා ගත් නිවාඩු අනුව හිමිවන උපරිම ණය මුදල රු. 
                </td>
                
                 <td style="width: 12.5%;">
                    පෙර ලබා ගත් ණය මුදල සදහා නැවත ගෙවීමට ඇති මුදල
                </td>
                
                 <td style="width: 12.5%;">
                   අනුමත ණය මුදල
                </td>
                
                
                
            </tr>
            <tr>
                <td style="text-align: center">
                    <input style="border: 0;box-shadow: none;text-align: center" value="<?php echo isset($_POST['bSalary']) ? $_POST['bSalary'] : '' ?>"> 
                </td>
                <td style="text-align: center">
                    <input style="border: 0;box-shadow: none;text-align: center" value="<?php echo isset($_POST['percentageWP']) ? $_POST['percentageWP'] : '' ?>"> 
                </td>
                <td style="text-align: center">
                    <input style="border: 0;box-shadow: none;text-align: center" value="<?php echo isset($_POST['loanWPtest']) ? $_POST['loanWPtest'] : '' ?>"> 
                </td>
                <td style="text-align: center">
                    <input style="border: 0;box-shadow: none;text-align: center" value="<?php echo isset($_POST['leavetaken']) ? $_POST['leavetaken'] : '' ?>"> 
                </td>
                <td style="text-align: center">
                    <input style="border: 0;box-shadow: none;text-align: center" value="<?php echo isset($_POST['percentageWP']) ? $_POST['percentageWP']-$_POST['leavetaken'] : '' ?>"> 
                </td>
                <td style="text-align: center">
                    <input style="border: 0;box-shadow: none;text-align: center" value="<?php echo isset($_POST['loanforLeaves']) ? $_POST['loanforLeaves'] : '' ?>"> 
                </td>
                <td style="text-align: center">
                    <input style="border: 0;box-shadow: none;text-align: center" value="<?php echo isset($_POST['loanbefore']) ? $_POST['loanbefore'] : '' ?>"> 
                </td>
                <td >
                    <input style="border: 0;box-shadow: none;text-align: center" value="<?php echo isset($_POST['loanpermitted']) ? $_POST['loanpermitted'] : '' ?>"> 
                </td>
                  
                
            </tr>
            
        </table>
        <table id="fourth">
            
            <tr><td style="width: 20%">  ලැබීමට නියමිත ණය මුදල රු.</td><td style="padding-left: 0px;width: 30%""><input style="border: groove;box-shadow: none;" value="<?php echo isset($_POST['approved_loan']) ? $_POST['approved_loan'] : '' ?>"></td> <td>................</td><td>................</td><td>................</td></tr>
            <tr><td></td><td><input style="border: 0;box-shadow: none;" value=""></td> <td>ඉල්ලුම්කරුගෙ අත්සන</td><td>මානව සම්පත් නිලධාරී</td><td>ආයතන කළමනාකරු</td></tr>
            <tr><td>වාරික ගණන</td><td><input style="border:groove;box-shadow: none;" value="<?php echo isset($_POST['installments']) ? $_POST['installments'] : '' ?>"></td> </tr>
            <tr><td></td><td><input style="border: 0;box-shadow: none;" value=""></td> </tr>
            <tr><td>වාරිකය</td><td><input style="border:groove;box-shadow: none;" value="<?php echo isset($_POST['installment']) ? $_POST['installment'] : '' ?>"></td><td>................</td><td>................</td></tr>
             <tr><td></td><td><input style="border: 0;box-shadow: none;" value=""></td><td>ඇපකරු</td><td>ඇපකරු</td></tr>
          </table>
        
           
            <table id="mid" >
                <tr><td><b><u>  කාර්යාලිය ප්‍රයෝජනය සදහා </u></b></td></tr>
                <tr><td>ඉල්ලුම් කළ ණය මුදල ලබා දීම අනුමත කරමි/නොකරමි</td></tr>
           
            </table>
            <table id="fifth">
                
              <tr>
                    <td>
                    වෙනත්
                </td>
                </tr>
                
                <tr>
                    <td><input style="border: 0;box-shadow: none;"></td>
                    <td><input style="border: 0;box-shadow: none;"></td>
                    <td><input style="border: 0;box-shadow: none;"></td>
                    <td><input style="border: 0;box-shadow: none;"></td>
                </tr>
                
                <tr>
                    <td>................</td>
                    <td>................</td>
                    <td>................</td>
                    <td>................</td>
                </tr>
                
                <tr>
                    <td>පරිපාලන කළමනාකරු</td>
                    <td>ගිණුම් අංශය</td>
                    <td>ආයතන ප්‍රධානි</td>
                    <td>විගණනය</td>
                </tr>
            </table>
            </div>
            <button onclick="printingDoc()">Print</button>
    </body>
</html>
