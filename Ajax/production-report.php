<?php
$date = $_GET['d'];
$plant_no = $_GET['p'];
include '../model/production.php';
include '../model/planning.php';
include '../model/general.php';
$obj = new Production();
$obj1 = new Planning();
$obj2 = new General();
?>
<table class="table table-bordered table-striped" style="table-layout: fixed;">

    <thead>

        <tr style="text-align: center">

            <th style="width: 10%;"></th>

            <th colspan="80" style="text-align: center"></th>

        </tr>

    </thead>

    <tbody>

        <tr  style="text-align: center">

            <td>Line</td>
            <?php
            $lines = array();
            $styles = array();
            $unit_price = array();
            $plan_qty = array();
            $reference = array();
            $pmo = array();
            $ppday = array();
            $i = 0;
            $result1 = $obj->getDailyPlannedLines($date, $plant_no);
            while ($row = mysqli_fetch_array($result1)) {
                $result2 = $obj1->getRefDetails($row['reference']);
                $array2 = mysqli_fetch_array($result2);
                $lines[$i] = $row['line_no'];
                $styles[$i] = $array2['style_number'];
                $unit_price[$i] = $array2['unit_price'];
                $reference[$i] = $row['reference'];
                $result5=$obj ->getPlan($plant_no,$date,$lines[$i],$reference[$i]);
                $array5 = mysqli_fetch_array($result5);
                $ppday[$i] = $array5['plan'];
                $pmo[$i] = $array2['required_mos'];
                $i++;
                ?>
                <td colspan="80" style="text-align: center"><?php echo $row['line_no']; ?></td>
                <?php
            }
            ?>


        </tr>



        <tr>

            <td style="vertical-align: middle;">Style</td>
            <?php
            for ($i = 0; $i < sizeof($styles); $i++) {
                ?>
                <td colspan="80" style="text-align: center; vertical-align: middle;"><?php echo $styles[$i]; ?></td>
                <?php
            }
            ?>

        </tr>



        <tr  style="text-align: center">

            <td style="text-align: center"></td>
            <?php
            for ($i = 0; $i < sizeof($lines); $i++) {
                ?>

                <td style="text-align: center" colspan="16">QTY</td>

                <td style="text-align: center" colspan="16">INC</td>

                <td style="text-align: center" colspan="16">DAY</td>

                <td style="text-align: center" colspan="16">AVG</td>

                <td style="text-align: center" colspan="16">INT</td>
                <?php
            }
            ?>
        </tr>



        <tr>

            <td style="margin-left: 25%">Planned</td>
            <?php
            $plan_day = array();
            for ($i = 0; $i < sizeof($lines); $i++) {

                $result3 = $obj->getPlannedDay($date, $reference[$i], $plant_no, $lines[$i]);
                $array3 = mysqli_fetch_array($result3);
                $plan_qty[$i] = $array3['tot_plan'];
                $plan_day[$i] = $array3['days'];
                ?>
                <td colspan="16" style="text-align: center"><?php echo $plan_qty[$i]; ?> </td>

                <td colspan="16" style="text-align: center"><?php echo number_format($unit_price[$i] * $plan_qty[$i], 2, '.', ','); ?></td>

                <td colspan="16" style="text-align: center"><?php echo $plan_day[$i]; ?></td>

                <td colspan="16" style="text-align: center"><?php echo number_format($plan_qty[$i] / $plan_day[$i], 2, '.', ','); ?></td>

                <td colspan="16" style="text-align: center"></td>
                <?php
            }
            ?>
        </tr>



        <tr>

            <td>Achieved</td>
            <?php
            $act_qty = array();
            $act_day = array();
            for ($i = 0; $i < sizeof($lines); $i++) {
                ?>
                <?php
                $result4 = $obj->actQuantity($date, $plant_no, $lines[$i], $reference[$i]);
                $array4 = mysqli_fetch_array($result4);

                $act_qty[$i] = $array4['product'];
                $act_day[$i] = $array4['days'];
                ?>
                <td colspan="16" style="text-align: center"><?php echo $act_qty[$i]; ?></td>

                <td colspan="16" style="text-align: center"><?php echo number_format($act_qty[$i] * $unit_price[$i], 2, '.', ','); ?></td>

                <td colspan="16" style="text-align: center"><?php echo $act_day[$i]; ?></td>

                <td colspan="16" style="text-align: center"><?php echo number_format($act_qty[$i] / $act_day[$i], 2, '.', ','); ?></td>

                <td colspan="16" style="text-align: center"></td>
                <?php
            }
            ?>
        </tr>



        <tr>

            <td>Balance</td>
            <?php
            for ($i = 0; $i < sizeof($lines); $i++) {
                ?>

                <td colspan="16" style="text-align: center"><?php echo $bal_qty = $plan_qty[$i] - $act_qty[$i]; ?></td>

                <td colspan="16" style="text-align: center"><?php echo number_format($bal_qty * $unit_price[$i], 2, '.', ','); ?></td>

                <td colspan="16" style="text-align: center"><?php echo $bal_day = $plan_day[$i] - $act_day[$i]; ?></td>

                <td colspan="16" style="text-align: center"><?php echo number_format($bal_qty / $bal_day, 2, '.', ','); ?></td>

                <td colspan="16" style="text-align: center"></td>
                <?php
            }
            ?>
        </tr>

        <tr>

            <td>P/Day</td>
<?php
            for ($i = 0; $i < sizeof($lines); $i++) {
                ?>
            <td colspan="80" style="text-align: center"><?php echo $ppday[$i];?></td>
<?php
            }
            ?>
        </tr>

        <tr>
            <?php
            for ($i = 0; $i < sizeof($lines); $i++) {
                ?>
                <td>P/M/O</td>
                <td colspan="80" style="text-align: center"><?php echo $pmo[$i]; ?></td>
                <?php
            }
            ?>
        </tr>

        <tr>

            <td>T/P/M/O</td>
             <?php
            for ($i = 0; $i < sizeof($lines); $i++) {
                ?>
            <td colspan="80" style="text-align: center"><?php echo number_format($ppday[$i]/$pmo[$i],2,'.',',');?></td>
            <?php
            }
            ?>
        </tr>

        <tr>

            <td>P/W/Ses</td>
            <td colspan="80" style="text-align: center"></td>

        </tr>

        <tr>

            <td>P/P/Ses</td>
            <td colspan="80" style="text-align: center"></td>

        </tr>

        <tr>

            <td>A/M/O</td>
            <td colspan="80" style="text-align: center"></td>
        </tr>

        <tr>

            <td>A/P/Day</td>

            <td colspan="80" style="text-align: center"></td>
        </tr>

        <tr>

            <td>A/W/Ses</td>
            <td colspan="80" style="text-align: center"></td>
        </tr>

        <tr>

            <td>A/P/Ses</td>

            <td colspan="80" style="text-align: center"></td>
        </tr>


        <tr>

            <th></th>

            <th colspan="80"></th>

        </tr>
        <?php
        
        $output = array();
        $accepted = array();
        $rejected = array();
        $rejRepaired = array();
        $cum_output = array();
        for ($i = 0; $i < sizeof($lines); $i++) {
            $j = 1;
            $cum_output[$i]=0;
            while ($j < 16) {
                if ($j < 10) {
                    $j = '0' . $j;
                }
                $result5 = $obj2->getSessionTime($j);
                $array5 = mysqli_fetch_array($result5);
                $time = date('h:i a', strtotime($array5['time']));

                $result6 = $obj->getProdVal($plant_no, $date, $lines[$i], intval($j));
                $array6 = mysqli_fetch_array($result6);
                $output[$i] = $array6['output'];
                $accepted[$i] = $array6['accepted'];
                $rejected[$i] = $array6['rejected'];
                $rejRepaired[$i] = $array6['rejRepaired'];
                $cum_output[$i]+=$output[$i];
                ?>
                <tr>

                    <td><?php echo $j . " - " . $time; ?></td>

                    <td colspan="10" style="text-align: center;width:11.25%;"></td>

                    <td colspan="10" style="text-align: center;width:11.25%;"></td>

                    <td colspan="10" style="text-align: center;width:11.25%;"><?php echo $output[$i]; ?></td>

                    <td colspan="10" style="text-align: center;width:11.25%;"><?php echo $cum_output[$i];?></td>

                    <td colspan="10" style="text-align: center;width:11.25%;"></td>

                    <td colspan="10" style="text-align: center;width:11.25%;"><?php echo $accepted[$i]; ?></td>

                    <td colspan="10" style="text-align: center;width:11.25%;"><?php echo $rejected[$i]; ?></td>

                    <td colspan="10" style="text-align: center;width:11.25%;"><?php echo $rejRepaired[$i]; ?></td>

                </tr>
                <?php
                $j++;
            }
            
        }
        ?>






    </tbody>

</table>