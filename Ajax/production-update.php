<?php
$date = $_GET['d'];
$session = $_GET['s'];
$plant_no = $_GET['p'];
include '../model/production.php';
include '../model/planning.php';
$obj = new Production();
$obj1 = new Planning();
?>
<div class="widget-content nopadding">    
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Line No.</th>
                <th>Style</th>
                <th>Start Session</th>                
                <th>Output</th>
                <th>Accepted</th>
                <th>Rejected</th>
                <th>Reject Repaired</th>
                <th>No. of MOs</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result1 = $obj->getDailyPlannedLines($date, 1);
            while ($row = mysqli_fetch_array($result1)) {
                $result2 = $obj1->getRefDetails($row['reference']);
                $array2 = mysqli_fetch_array($result2);
                $style_number = $array2['style_number'];
                $result3 = $obj->checkProdEntry($date, intval($session), $plant_no, $row['line_no']);
                if (mysqli_num_rows($result3) == 0) {
                    ?>
                    <tr>
                        <td><input style="border: 0;box-shadow: none;width: 95%;background-color: transparent;text-align: center" readonly name="line_no[]" value="<?php echo $row['line_no']; ?>"></td>
                        <td><input style="border: 0;box-shadow: none;width: 95%;background-color: transparent;text-align: center" readonly name="style_number[]" value="<?php echo $style_number; ?>"></td>
                        <td><input style="border: 0;box-shadow: none;width: 95%;background-color: transparent;text-align: center" readonly name="session_start[]" value="01"></td>
                        <td><input style="border: 0;box-shadow: none;width: 95%;background-color: transparent;text-align: center" name="output[]"></td>
                        <td><input style="border: 0;box-shadow: none;width: 95%;background-color: transparent;text-align: center" name="accepted[]"></td>
                        <td><input style="border: 0;box-shadow: none;width: 95%;background-color: transparent;text-align: center" name="rejected[]"></td>
                        <td><input style="border: 0;box-shadow: none;width: 95%;background-color: transparent;text-align: center" name="rejRepaired[]"></td>
                        <td><input style="border: 0;box-shadow: none;width: 95%;background-color: transparent;text-align: center" name="mo[]"></td>
                        <td><input style="border: 0;box-shadow: none;width: 95%;background-color: transparent;text-align: center" name="remarks[]"></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
    </table><br>
    <div class="span11">
        <input type="submit" value="Save Production Details" class="btn btn-success pull-right">
        <input type="hidden" name="switch" value="1">
    </div>

</div>
