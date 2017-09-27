<?php
$pos = $_GET['p'];
$reference = $_GET['r'];
if (strlen($reference) == 1) {
    $ref = '000' . $reference;
} elseif (strlen($reference) == 2) {
    $ref = '00' . $reference;
} elseif (strlen($reference) == 3) {
    $ref = '0' . $reference;
} else {
    $ref = $reference;
}
$po_number = explode(',', $pos);
include '../model/planning.php';
$obj = new Planning();
?>
<div class="modal-header" style="background-color: #ffbb33;">
    <h4 class="alert-heading" style="color: #FF8800;">NOTIFICATION!</h4>
</div>
<div class="modal-body">
    <p>You have assigned the following PO Numbers to the reference <?php echo $ref; ?>:
    </p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Style</th>
                <th>PO Number</th>
                <th>SKU</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $trClass = "even gradeC";
            for ($i = 0; $i < sizeof($po_number); $i++) {
                $result = $obj->getPODetails($po_number[$i]);

                while ($row = mysqli_fetch_array($result)) {
                    if ($trClass == "even gradeC") {
                        $trClass = "odd gradeX";
                    } else {
                        $trClass = "even gradeC";
                    }
                    ?>
                    <tr class="<?php echo $trClass; ?>">
                        <td>
                            <?php echo $row['style_number']; ?>
                        </td>
                        <td>
                            <?php echo $row['po_number']; ?>
                        </td>
                        <td>
                            <?php echo $row['sku']; ?>
                        </td>
                        <td>
                            <?php echo $row['order_quantity']; ?>
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
<div class = "modal-footer"> <button type = 'submit' class = "btn btn-warning" id="submitAlloForm" onclick="submitAlloForm()">Confirm</button> <a data-dismiss = "modal" class = "btn" href = "#">Cancel</a> </div>
