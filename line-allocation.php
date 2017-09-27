<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['p'])) {
    header("location:allocation-menu.php");
    return;
} else {
    $plant_no = $_SESSION['p'];
}
?>
<html lang="en">
    <head>
        <title>Line Allocation</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <?php
        include 'styles.php';
        ?>
    </head>
    <body>
        <!--Header-part-->
        <div id="header">
            <h1><a href="dashboard.html">Suganda Apparel</a></h1>
        </div>
        <!--close-Header-part--> 
        <!--top-Header-menu-->
        <?php
        include 'navigation.php';
        ?>
        <!--close-left-menu-stats-sidebar-->
        <div id="content">
            <div id="content-header">
                <div id="breadcrumb"> 
                    <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
                    <a href="#" class="tip-bottom">Planning</a> 
                    <a href="#" class="current">Line Allocation</a> </div>
                <h1>Line Allocation - Plant <?php echo $plant_no; ?></h1>
            </div>
            <div class="container-fluid">
                <hr>
                <?php
                if (isset($_SESSION['err'])) {
                    $err = $_SESSION['err'];
                    unset($_SESSION['err']);
                    ?>
                    <div class="alert alert-danger">
                        <?php
                        if ($err == 1) {
                            $count = $_SESSION['count'];
                            unset($_SESSION['count']);

                            echo "<strong>Error!</strong> $count allocation(s) were not saved";
                        }
                        ?>
                    </div>                
                    <?php
                } elseif (isset($_SESSION['suc'])) {
                    $suc = $_SESSION['suc'];
                    unset($_SESSION['suc']);
                    ?>
                    <div class="alert alert-success">
                        <?php
                        if ($suc == 1) {
                            echo 'All allocations saved successfully';
                        }
                        ?>
                    </div>
                    <?php
                }
                ?>
                <div class="row-fluid" style="margin-left: 25%;">
                    <div class="span6">
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                                <h5>Line Allocation</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <form action="line-allocation.php"  method="POST" class="form-horizontal" name="style_allocation">
                                    <div class="control-group">
                                        <label class="control-label">Style :</label>
                                        <div class="controls">
                                            <select name="reference">
                                                <option selected="" disabled="">Select Style</option>
                                                <?php
                                                $result = $Planning->getAllocatedStyles($plant_no);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?php echo $row['reference']; ?>"><?php echo $row['style_number'] . " - " . $row['reference']; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Line/s to Allocate</label>
                                        <div class="controls">
                                            <select multiple name="line_nos[]">
                                                <?php
                                                for ($i = 1; $i <= 20; $i++) {
                                                    ?>
                                                    <option value="<?php echo $i; ?>">Line <?php echo $i; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                            <span class = "help-block">Select multiple lines to allocate a style.</span>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Year</label>
                                        <div class="controls">

                                            <select name="year">
                                                <?php
                                                $year = date('Y') + 2;
                                                $present_year = date('Y');
                                                while ($year >= 2017) {
                                                    ?>
                                                    <option <?php
                                                if ($year == $present_year) {
                                                    echo "selected";
                                                }
                                                    ?>><?php echo $year; ?></option>                                                        
                                                        <?php
                                                        $year--;
                                                    }
                                                    ?>


                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Month</label>
                                        <div class="controls">

                                            <select name="month">

                                                <option selected>January</option>

                                                <option>February</option>

                                                <option>March</option>

                                                <option>April</option>

                                                <option>May</option>

                                                <option>June</option>

                                                <option>July</option>

                                                <option>August</option>

                                                <option>September</option>

                                                <option>October</option>

                                                <option>November</option>

                                                <option>December</option>

                                            </select>

                                        </div>

                                        <br>

                                    </div>
                                    <div class = "form-actions">
                                        <input type="submit" class="btn btn-primary pull-right"  value="Allocate">
                                    </div>
                                </form>
                                <form class="form-horizontal" name="lineAlloc" method="POST" action="control/planning.php"> 
                                    <?php
                                    if (isset($_POST['line_nos'])) {
                                        $line_nos = $_POST['line_nos'];
                                        ?>
                                        <div class="control-group">
                                            <label class="control-label">Reference :</label>
                                            <div class="controls">
                                                <input type="text" readonly="" name="reference" class="span11" value="<?php echo $reference = $_POST['reference']; ?>">
                                            </div>
                                        </div>
                                        <?php
                                        $result2 = $Planning->getRefDetails($reference);
                                        $array2 = mysqli_fetch_array($result2);
                                        $total = $array2['total_ordered'];
                                        $completed = $Planning->checkLineAllo($reference);
                                        $total = $total - $completed;
                                        ?>
                                        <div class="control-group">
                                            <label class="control-label"> Period :</label>
                                            <div class="controls">
                                                <input type="hidden" name="year" value="<?php echo $year=$_POST['year']; ?>">
                                                <input type="hidden" name="month" value="<?php echo $month=$_POST['month']; ?>">
                                                <input type="text" readonly="" name="period" class="span11" value="<?php echo $month." ".$year; ?>">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label"> Quantity to be Allocated :</label>
                                            <div class="controls">
                                                <input type="hidden" name="tot_tobeAllo" value="<?php echo $total; ?>">
                                                <input type="text" readonly="" name="to_be_allo" class="span11" value="<?php echo $total; ?>">
                                            </div>
                                        </div>

                                        <div class = "control-group" style = "padding: 10px;">
                                            <div class = "widget-box">
                                                <div class = "widget-title"> <span class = "icon"> <i class = "icon-th"></i> </span>
                                                    <h5>Line Allocation</h5>
                                                </div>
                                                <div class = "widget-content nopadding">
                                                    <table class = "table table-bordered table-striped" style = "table-layout: fixed;">
                                                        <thead>
                                                            <tr>
                                                                <th>Line</th>
                                                                <th>Quantity</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $i = 0;
                                                            while ($i < sizeof($line_nos)) {
                                                                ?>
                                                                <tr class = "odd gradeX">
                                                                    <td style = "vertical-align: middle;">
                                                                        Line <?php echo $line_nos[$i]; ?>
                                                                        <input type="hidden" name="line_no[]" value="<?php echo $line_nos[$i]; ?>">
                                                                    </td>
                                                                    <td>
                                                                        <input type = "text" name = "qty[]" placeholder = "Input Quantity" style = "border: 0px; background-color: transparent; width: 90%" required="" onkeyup="calcRem()"/>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                $i++;
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                    <input type="hidden" name="references" value="">
                                                    <script>
                                                        function calcRem() {
                                                            var qty = document.getElementsByName("qty[]");
                                                            var rem = document.lineAlloc.tot_tobeAllo.value;
                                                            var tot = 0;
                                                            for (var i = 0; i < qty.length; i++) {
                                                                tot = Number(tot) + Number(qty[i].value);
                                                            }
                                                            var newRem = Number(rem) - Number(tot);
                                                            document.lineAlloc.to_be_allo.value = newRem;
                                                        }
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "form-actions">
                                            <input type="submit" class = "btn btn-success" style = "float: right;" value="Save">
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <input type="hidden" name="switch" value="5">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Footer-part-->
        <?php
        include 'scripts.php';
        ?>
    </body>
</html>