<?php
$plant_no = $_GET['p'];
$refs = $_GET['r'];
$reference = explode(',', $refs);
include '../model/planning.php';
$obj = new Planning();
?>
<div class="modal-header" style="background-color: #ffbb33;">

    <h4 class="alert-heading" style="color: #FF8800;">NOTIFICATION!</h4>

</div>

<div class="modal-body">

    <p>You have assigned the following Reference Numbers to Plant <?php echo $plant_no; ?>:

    </p>

    <table class="table table-bordered table-striped">

        <thead>

            <tr>

                <th>Style</th>

                <th>Reference</th>

                <th>Quantity</th>

                <th>Delivery Date</th>

            </tr>

        </thead>

        <tbody>
            <?php
            $trClass = "even gradeC";
            for ($i = 0; $i < sizeof($reference); $i++) {
                $result = $obj->getRefDetails($reference[$i]);
                while ($row = mysqli_fetch_array($result)) {
                    if ($trClass == "even gradeC") {
                        $trClass = "odd gradeX";
                    } else {
                        $trClass = "even gradeC";
                    }
                    ?>
                    <tr class = "<?php echo $trClass; ?>">

                        <td>

                            <?php echo $row['style_number'];?>

                        </td>

                        <td>

                            <?php echo $row['reference'];?>

                        </td>

                        <td>

                            <?php echo $row['total_ordered'];?>

                        </td>

                        <td>

                            <?php echo $row['ex_fac_date'];?>

                        </td>



                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>

    </table>

    <p>Would you like to continue?</p>

</div>

<div class = "modal-footer"> <button onclick = "submitAlloForm()" type = 'submit' class = "btn btn-warning">Confirm</button> <a data-dismiss = "modal" class = "btn" href = "#">Cancel</a> </div>
