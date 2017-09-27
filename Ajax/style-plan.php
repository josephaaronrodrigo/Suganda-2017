<?php
$style_number = $_GET['s'];
$year = $_GET['y'];
include '../model/planning.php';
include '../model/general.php';
$obj = new Planning();
$obj1 = new General();
?>
<div class="control-group" style="padding: 10px">

    <div class="widget-box">

        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>

            <h5>Order Information</h5>

        </div>

        <div class="widget-content nopadding">

            <table class="table table-bordered table-striped" style="table-layout: fixed; text-align: center;">

                <thead>

                    <tr  style="text-align: center;">

                        <th>Reference</th>

                        <th>Order Date</th>

                        <th>Quantity</th>

                        <th>TTL</th>

                        <th>Unit Price ($)</th>

                        <th>Income ($)</th>

                        <th>TTL ($)</th>

                        <th>RM Date</th>

                        <th>EX FAC Date</th>

                    </tr>

                </thead>

                <tbody>
                    <?php
                    $total = 0;
                    $result1 = $obj->getStyleInfo($style_number);
                    while ($row = mysqli_fetch_array($result1)) {
                        ?>
                        <tr class="odd gradeX">

                            <td style="text-align: center;"><?php echo $row['reference']; ?></td>

                            <td style="text-align: center;"><?php echo date('d/m/Y', strtotime($row['order_date'])); ?></td>

                            <td style="text-align: center;"><?php echo $refTotal = $row['total']; ?></td>

                            <td style="text-align: center;"><?php echo $total += $refTotal; ?></td>

                            <td style="text-align: center;"><?php echo $row['unit_price']; ?></td>

                            <td style="text-align: center;"><?php echo $row['unit_price'] * $refTotal; ?></td>

                            <td style="text-align: center;"><?php echo $row['unit_price'] * $total; ?></td>

                            <td style="text-align: center;"><?php echo date('d/m/Y', strtotime($row['rm_date'])); ?></td>

                            <td style="text-align: center;"><?php echo date('d/m/Y', strtotime($row['ex_fac_date'])); ?></td>

                        </tr>
                        <?php
                    }
                    ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<div class="control-group" style="padding: 10px;">

    <div class="widget-box">

        <div class="widget-title"> <span class="icon" style="width: 15px; text-align: center;"> <i class="icon-calendar"></i> </span>

            <h5>Plan</h5>

        </div>

        <div class="widget-content nopadding" style="max-width: 100%; overflow: auto;">

            <table class="table table-bordered table-striped with-check">

                <thead>

                    <tr>



                        <th rowspan="2" style="vertical-align: middle;">Plant</th>

                        <th rowspan="2" style="vertical-align: middle;">Reference</th>

                        <th rowspan="2" style="vertical-align: middle;">Allocated Qty</th>
                        <?php
                        $days = array();
                        for ($i = 1; $i <= 12; $i++) {
                            if ($i < 10) {
                                $i = '0' . $i;
                            }
                            $days[intval($i)] = cal_days_in_month(CAL_GREGORIAN, $i, $year);
                            ?>
                            <th colspan="<?php echo $days[intval($i)]; ?>"><?php echo date('F', strtotime($year . "-" . $i . "-01")); ?></th>
                            <?php
                        }
                        ?>


                    </tr>
                    <tr>

                        <?php
                        for ($i = 1; $i <= 12; $i++) {
                            $j = 1;
                            while ($j <= $days[$i]) {
                                if ($j < 10) {
                                    $j = '0' . $j;
                                }
                                ?>
                                <th><?php echo $j; ?></th>
                                <?php
                                $j++;
                            }
                        }
                        ?>
                    </tr>

                </thead>

                <tbody>


                    <?php
                    $result2 = $obj1->getPlants();
                    while ($row = mysqli_fetch_array($result2)) {
                        ?>
                        <tr>
                            <?php
                            $plant_no = $row['plant_no'];
                            $result3 = $obj->getRefDetailsByPlant($plant_no, $style_number);
                            $rows = mysqli_num_rows($result3);
                            if ($rows > 0) {
                                $rowcount = $rows;
                            } else {
                                $rowcount = 1;
                            }
                            ?>
                            <td rowspan="<?php echo $rowcount; ?>" style="text-align: center; vertical-align: middle;"><?php echo $plant_no; ?></td>
                            <?php
                            if ($rows > 0) {
                                while ($row = mysqli_fetch_array($result3)) {
                                    ?>
                                    <td><?php echo $reference = $row['reference']; ?></td>
                                    <td><?php echo $row['total_ordered']; ?></td>

                                    <?php
                                    for ($i = 1; $i <= 12; $i++) {
                                        $j = 1;
                                        while ($j <= $days[$i]) {
                                            if ($j < 10) {
                                                $j = '0' . $j;
                                            }
                                            if ($i < 10) {
                                                $i = '0' . $i;
                                            }

                                            $result4 = $obj->getTotPlantAll($plant_no, $reference, $year . "-" . $i . "-" . $j);
                                            $array = mysqli_fetch_array($result4);
                                            if ($array['total'] == 0) {
                                                ?>
                                                <td class="center" style="text-align: center"><i class="icon icon-circle"></i></td>
                                                <?php
                                            } else {
                                                ?>
                                                <td class="center" style="text-align: center"><?php echo $array['total']; ?></td>
                                                <?php
                                            }
                                            $i = intval($i);
                                            $j++;
                                        }
                                    }
                                }
                            } else {
                                ?>
                                <td style="text-align: center;"><i class="icon icon-minus"></i></td>
                                <td style="text-align: center;"><i class="icon icon-minus"></i></td>
                                <?php
                                for ($i = 1; $i <= 12; $i++) {
                                    $j = 1;
                                    while ($j <= $days[$i]) {
                                        if ($j < 10) {
                                            $j = '0' . $j;
                                        }
                                        ?>
                                        <td class="center" style="text-align: center"><i class="icon icon-circle"></i></td>
                                            <?php
                                            $j++;
                                        }
                                    }
                                }
                                ?>




                        </tr>
                        <?php
                    }
                    ?>

                </tbody>

            </table>

        </div>

    </div>

</div>