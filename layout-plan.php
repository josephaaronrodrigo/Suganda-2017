<!DOCTYPE html>
<html>
    <head>
        <style>
            @import url('https://fonts.googleapis.com/css?family=Fjalla+One');
        </style>
        <title>Layout Plan</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="styles/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="styles/bootstrap.min.js" type="text/javascript"></script>
        <script src="styles/jquery.js" type="text/javascript"></script>
        <style>                      
            .dropdown {
                background:#fff;
                border:1px solid #ccc;
                border-radius:4px;
                width:300px;    
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

            #timeline {
                list-style: none;
                position: relative;
            }
            #timeline:before {
                top: 0;
                bottom: 0;
                position: absolute;
                content: " ";
                width: 2px;
                background-color: #4997cd;
                left: 50%;
                margin-left: -1.5px;
            }
            #timeline .clearFix {
                clear: both;
                height: 0;
            }
            #timeline .timeline-badge {
                color: #fff;
                width: 50px;
                height: 50px;
                font-size: 1.2em;
                text-align: center;
                position: absolute;
                top: 20px;
                left: 50%;
                margin-left: -25px;
                background-color: #4997cd;
                z-index: 100;
                border-top-right-radius: 50%;
                border-top-left-radius: 50%;
                border-bottom-right-radius: 50%;
                border-bottom-left-radius: 50%;
            }
            #timeline .timeline-badge span.timeline-balloon-date-day {
                font-size: 1.6em;

            }

            #timeline .timeline-badge.timeline-filter-movement {
                background-color: #ffffff;
                font-size: 1.7em;
                height: 35px;
                margin-left: -18px;
                width: 35px;
                top: 40px;
            }
            #timeline .timeline-badge.timeline-filter-movement a span {
                color: #4997cd;
                font-size: 1.3em;
                top: -1px;
            }
            #timeline .timeline-badge.timeline-future-movement {
                background-color: #ffffff;
                height: 35px;
                width: 35px;
                font-size: 1.7em;
                top: -16px;
                margin-left: -18px;
            }
            #timeline .timeline-badge.timeline-future-movement a span {
                color: #4997cd;
                font-size: .9em;
                top: 2px;
                left: 1px;
            }
            #timeline .timeline-movement {
                border-bottom: dashed 1px #4997cd;
                position: relative;
            }
            #timeline .timeline-movement.timeline-movement-top {
                height: 60px;
            }
            #timeline .timeline-movement .timeline-item {
                padding: 20px 0;
            }
            #timeline .timeline-movement .timeline-item .timeline-panel {
                border: 1px solid #d4d4d4;
                border-radius: 3px;
                background-color: #FFFFFF;
                color: #666;
                padding: 10px;
                position: relative;
                -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
                box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
            }
            #timeline .timeline-movement .timeline-item .timeline-panel .timeline-panel-ul {
                list-style: none;
                padding: 0;
                margin: 0;
            }
            #timeline .timeline-movement .timeline-item .timeline-panel.credits .timeline-panel-ul {
                text-align: right;
            }
            #timeline .timeline-movement .timeline-item .timeline-panel.credits .timeline-panel-ul li {
                color: #666;
            }
            #timeline .timeline-movement .timeline-item .timeline-panel.credits .timeline-panel-ul li span.importo {
                color: #468c1f;
                font-size: 1.3em;
            }
            #timeline .timeline-movement .timeline-item .timeline-panel.debits .timeline-panel-ul {
                text-align: left;
            }
            #timeline .timeline-movement .timeline-item .timeline-panel.debits .timeline-panel-ul span.importo {
                color: #e2001a;
                font-size: 1.3em;
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
            
            @media print{
                *{
                    margin: 0 !important;
                    padding: 0 !important;
                }
                html,body{
                    height: 100%;
                    overflow: hidden;
                    background: #FFF;
                    font-size: 9.5pt;
                }
                
                .container{
                    width: auto;
                    left: 0;
                    top: 0;
                }
                
            }

        </style>
        <script>
		function myFunction() {
   	 	window.print();
		}
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
                            <div class="input-group" style="margin-left: 300px;">
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
        <div class="container-fluid">
            <ul class="nav navbar-nav" style="margin-top: 100px; margin-left: 300px;">
                <!--<li class="dropdown">-->
                <select name="style" class="form-control" onchange="getLayout(this.value)">
                    <option selected="" disabled="">Select Style</option>
                    <?php
                    include 'model/operation.php';
                    $obj = new Operation();
                    $result = $obj->getStyles();
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <option value="<?php echo $row['style']; ?>"><?php echo $row['style']; ?></option>
                        <?php
                    }
                    ?>
                </select>
                <script>
                    function getLayout(str) {
                        
                        if (str == "") {
                            document.getElementById("timeline").innerHTML = " ";
                        } else {
                            document.getElementById("timeline").innerHTML = "Loading...";
                            if (window.XMLHttpRequest) {
                                // code for IE7+, Firefox, Chrome, Opera, Safari
                                xmlhttp = new XMLHttpRequest();
                            } else {
                                // code for IE6, IE5
                                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                            }
                            xmlhttp.onreadystatechange = function () {
                                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                    document.getElementById("timeline").innerHTML = xmlhttp.responseText;
                                }
                            };
                            var s = encodeURIComponent(str);
                            xmlhttp.open("GET", "Ajax/layout-plan.php?s=" + s, true);
                            xmlhttp.send();
                        }
                    }
                </script>
<!--                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Select Style <span class="glyphicon glyphicon-user pull-right"></span></a>

                <ul class="dropdown-menu">
                    <div style="height: 100px; overflow: auto;">
                        <li>&nbsp;&nbsp;<a href="#">Plant 1<span class="glyphicon glyphicon-log-out pull-right">&nbsp;</span></a></li>
                        <li class="divider"></li>
                        <li>&nbsp;&nbsp;<a href="#">Plant 2 <span class="glyphicon glyphicon-log-out pull-right">&nbsp;</span></a></li>
                        <li class="divider"></li>
                        <li>&nbsp;&nbsp;<a href="#">Plant 3 <span class="glyphicon glyphicon-log-out pull-right">&nbsp;</span></a></li>
                        <li class="divider"></li>
                        <li>&nbsp;&nbsp;<a href="#">Plant 4 <span class="glyphicon glyphicon-log-out pull-right">&nbsp;</span></a></li>
                        <li class="divider"></li>
                        <li>&nbsp;&nbsp;<a href="#">Plant 5 <span class="glyphicon glyphicon-log-out pull-right">&nbsp;</span></a></li>
                        <li class="divider"></li>
                        <li>&nbsp;&nbsp;<a href="#">Plant 6 <span class="glyphicon glyphicon-log-out pull-right">&nbsp;</span></a></li>
                        <li class="divider"></li>
                        <li>&nbsp;&nbsp;<a href="#">Plant 7 <span class="glyphicon glyphicon-log-out pull-right">&nbsp;</span></a></li>
                    </div>
                </ul>-->

                <!--</li>-->
            </ul>

        </div>
        <div class="container" style="width: 750px">
            <br><br>
            <div id="timeline"></div>
        </div>
        <button onclick="myFunction()">Print this page</button>
    </body>
</html>