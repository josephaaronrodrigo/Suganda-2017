<?php
$year = $_GET['y'];
$mon = $_GET['m'];
$month = date('m', strtotime($mon . " " . $year));
$plant_no = $_GET['p'];
$days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
include '../model/planning.php';
$obj = new Planning();
?>
<div class="widget-box">

    <div class="widget-title"> <span class="icon"> <i class="icon-calendar"></i> </span>

        <h5>Plan Entry</h5>

    </div>

    <div class="widget-content nopadding" style="max-width: 100%; overflow: auto;">

        <table class="table table-bordered table-striped" >

            <thead>

                <tr  style="text-align: center;">

                    <th>Line</th>

                    <th>Style</th>
                    <th>Quantity</th>
                    <?php
                    for ($i = 1; $i <= $days; $i++) {
                        if ($i < 10) {
                            $i = '0' . $i;
                        }
                        ?>
                        <th><?php echo $i; ?></th>
                        <input type="hidden" name="date[]" value="<?php echo $date = date('Y-m-d', strtotime($i . " " . $mon . " " . $year)); ?>">
                        <?php
                    }
                    ?>
                </tr>

            </thead>

            <tbody>
                <?php
                $trClass = "even gradeC";
                $i = 1;
                while ($i <= 20) {
                    $result3 = $obj->countRefs($plant_no, $mon, $year, $i);
                    $rowspan = mysqli_num_rows($result3);
                    if ($trClass == "even gradeC") {
                        $trClass = "odd gradeX";
                    } else {
                        $trClass = "even gradeC";
                    }
                    if ($rowspan > 0) {
                        $j = $rowspan;
                        while ($row = mysqli_fetch_array($result3)) {
                            ?>
                            <tr class="<?php echo $trClass; ?>">
                                <?php
                                if ($j == $rowspan) {
                                    ?>
                                    <td rowspan="<?php echo $rowspan; ?>" style="text-align: center;vertical-align: middle;"><?php echo $i; ?></td>
                                    <?php
                                }
                                ?>
                        <input type="hidden" name="line_no[]" value="<?php echo $i; ?>">
                        <input type="hidden" name="reference[]" value="<?php echo $row['reference'];?>">
                        <td style="text-align: center;vertical-align: middle;"><?php echo $row['style_number']; ?></td>
                        <td style="text-align: center; vertical-align: middle;"><?php echo $row['quantity']; ?></td>
                        <?php
                        for ($k = 1; $k <= $days; $k++) {
                            ?>
                            
                            <td style="text-align: center;"><input type="text" style="border:0px;margin:0px;width:50px;background-color: transparent;text-align: center;" name="plan[]"/></td>
                                <?php
                            }
                            ?>
                        </tr>
                        <?php
                        $j--;
                    }
                }
                $i++;
            }
            ?>
            </tbody>

        </table>

    </div><br>
    <input type="submit" class="btn btn-success" style="float: right;" value="Submit">
    <input type="hidden" name="switch" value="6">
</div>