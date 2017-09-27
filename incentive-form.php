<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Matrix Admin</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <?php
        include 'styles.php';
        ?>
    </head>
    <body>

        <!--Header-part-->
        <div id="header">
            <h1><a href="dashboard.html">Matrix Admin</a></h1>
        </div>
        <!--close-Header-part--> 

        <?php
        include 'navigation.php';
        ?>

        <!--close-left-menu-stats-sidebar-->

        <div id="content">
            <div id="content-header">
                <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Form elements</a> <a href="#" class="current">Common elements</a> </div>
                <h1>Incentive</h1>
            </div>
            <div class="container-fluid">
                <hr>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                                <h5>Calculate Incetive</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <form action="control/production.php" method="POST" class="form-horizontal">
                                    <input type="hidden" name="switch" value="2">
                                    <div class="control-group">
                                        <label class="control-label">Select Style</label>
                                        <div class="controls">
                                            <select name="styleRef">

                                                <?php
                                                $result = $Planning->getStylesForIncentive();
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?php echo $row['reference'] . "-" . $row['plant_no'] . "-" . $row['line_no']; ?>"><?php echo $row['style_number'] . " - " . $row['reference'] . " - Plant " . $row['plant_no'] . " - Line " . $row['line_no']; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Total Percentage</label>
                                        <div class="controls">
                                            <input type="text" name="t_percentage" class="span11" placeholder="Percentage of total income allocated">
                                        </div>
                                    </div>
                                    <div class = "control-group">
                                        <table class = "table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Class</th>
                                                    <th>Production Percentage</th>
                                                    <th>Incentive Percentage</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style = "text-align: center; vertical-align: middle;"><i class = "icon icon-circle" style = "color: red;"></i></td>
                                                    <td style = "text-align: center;"><input type = "text" class = "span10" name="prod_percent[]"></td>
                                                    <td style = "text-align: center;"><input type = "text" class = "span10" name="inc_percent[]"></td>
                                                </tr>
                                                <tr>
                                                    <td style = "text-align: center; vertical-align: middle;"><i class = "icon icon-circle" style = "color: green;"></i></td>
                                                    <td style = "text-align: center;"><input type = "text" class = "span10" name="prod_percent[]"></td>
                                                    <td style = "text-align: center;"><input type = "text" class = "span10" name="inc_percent[]"></td>
                                                </tr>
                                                <tr>
                                                    <td style = "text-align: center; vertical-align: middle;"><i class = "icon icon-circle" style = "color: brown;"></i></td>
                                                    <td style = "text-align: center;"><input type = "text" class = "span10" name="prod_percent[]"></td>
                                                    <td style = "text-align: center;"><input type = "text" class = "span10" name="inc_percent[]"></td>
                                                </tr>
                                                <tr>
                                                    <td style = "text-align: center; vertical-align: middle;"><i class = "icon icon-circle" style = "color: silver;"></i></td>
                                                    <td style = "text-align: center;"><input type = "text" class = "span10" name="prod_percent[]"></td>
                                                    <td style = "text-align: center;"><input type = "text" class = "span10" name="inc_percent[]"></td>
                                                </tr>
                                                <tr>
                                                    <td style = "text-align: center; vertical-align: middle;"><i class = "icon icon-circle" style = "color: gold;"></i></td>
                                                    <td style = "text-align: center;"><input type = "text" class = "span10" name="prod_percent[]"></td>
                                                    <td style = "text-align: center;"><input type = "text" class = "span10" name="inc_percent[]"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class = "form-actions">
                                        <button type = "submit" class = "btn btn-success">Save</button>
                                    </div>
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
