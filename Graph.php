<!DOCTYPE html>
<html lang="en">
<head>

    <title>Basic HTML5/CSS3 Responsive Web Design</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet"/>

    <!--    Custom CSS -->
    <link href="css/custom_css.css" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8"/>
    <style type="text/css">
    </style>
    <style>
        {
            font-family : "Roboto";
        }
    </style>
    <script src="js/Chart.js"></script>


</head>

<body>


<!-- Navigation -->
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand page-scroll" href="#page-top">
                <span class="light">Pi</span>
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-justified navbar-main-collapse">
            <ul class="nav navbar-nav">
                <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>

            </ul>
            <p style=" font-family:  'Raleway', sans-serif; font-weight: 300; font-size: 16px;color: #ffffff;margin-bottom: -10px;padding-top: 1px;float: right;" href="#page-top">Kevin Spacey</p>
        </div>
        <!-- /.navbar-collapse -->

    </div>
    <!-- /.container -->
</nav>



<div id="wrapper">

    <section class="left-col">
        <br>
        <br>
        <img src="Images/keyboard8.png"/> <br/>DASHBOARD<br/>
        <br>
        <br>
        <img src="Images/multiple25%20(1).png"  style="height: 45px;"/> <br/>MY CLIENTS<br/>
        <br>
        <br>
        <img src="Images/small58.png" style="height: 45px;"/> <br/>CALENDER<br/>
        <br>
        <br>
        <img src="Images/Search.png" style="height: 45px;"/> <a href="market-insights.php"> <br/>BROWSE <br>MARKET<br/> </a>
        <br>
        <br>
        <img src="Images/Message.png" style="height: 40px;"/> <br/>MESSAGES<br/>
        <br>
        <br>
        <img src="Images/add139.png" style="height: 45px;"/> <br/>NEW<br/>
        <br>
        <br>

    </section>

    <aside class="sidebar">

        <nav id="nav1">
            <p align = "left" style="margin-bottom: 1px;">Bob Burger's Portfolio</p>
            <ul style="margin-left: -50px;">
                <li><a href="POOP.html">holdings</a></li>
                <li><a href="#">stock watchlist</a></li>
                <li><a href="#">account deposit</a></li>
                <li><a href="#">personal details</a></li>
                <li><a href="#">buy/sell shares</a></li>
                <li><a href="#">meetings</a></li>
            </ul>
            <div class="clearfix"></div>

            <div></div>

        </nav>
    </aside>

    <div>
        <nav id="nav2"> <p> PERFORMANCE </p>
                <div class="HR"></div>
                <br>

                <script>
                    var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
                    var lineChartData = {
                        labels : ["January","February","March","April","May","June","July"],
                        datasets : [
                            {
                                label: "Networth",
                                fillColor : "rgba(151,187,205,0.2)",
                                strokeColor : "rgba(151,187,205,1)",
                                pointColor : "rgba(151,187,205,1)",
                                pointStrokeColor : "#fff",
                                pointHighlightFill : "#fff",
                                pointHighlightStroke : "rgba(151,187,205,1)",
                                data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
                            }
                        ]

                    }


                </script>

                <div style="width:100%">
                    <canvas id="canvas" height="370" width="1070px;"></canvas>
                </div>

            </nav>
    </div>
    <br>
    <br><br><br><br><br>

    <nav id="nav4">  TOTAL NET WORTH
        <br>
        5465406540654
    </nav>

    <nav id="nav5">  TOTAL NET WORTH
        <br>
        5465406540654
    </nav>

    <nav id="nav6">  TOTAL NET WORTH
        <br>
        5465406540654
    </nav>


    <nav id="nav7"> ASSET ALLOCATION
        <div class="HR"></div>



        <?php

        // Create connection

        $connect = mysql_connect("localhost","root", "");
        if (!$connect) {
            echo "nah brah";
            die(mysql_error());
        }
        mysql_select_db("pi");

        $total = 0;

        $results = mysql_query("SELECT * FROM stocks");
        $array = array();
        $SName = array();


        while($row = mysql_fetch_array($results)) {
            $StockName = $row["stock_name"];
            $StockPrice = $row["stock_price"];
            $StockQty = $row["no_of_stocks"];
            $Price = $StockQty*$StockPrice;
            $total = $total + $Price;

            // echo "Total: ". $total  . "<br>";

        }

        $row1 = $row ;

        $result1 =  mysql_query("SELECT * FROM stocks");

        while($row1 = mysql_fetch_array($result1)) {
            $StockName = $row1["stock_name"];
            $StockPrice = $row1["stock_price"];
            $StockQty = $row1["no_of_stocks"];
            $Price = $StockQty*$StockPrice;
// echo "<br> Stock name: ".$StockName. " - Stock price: ". $StockPrice. " - No. of Stocks: " . $StockQty . "<br>";

            $Perc = round($Price/$total * 100 );

            $SName[] = $StockName;
            $array[] = $Perc;
            //echo $array[0];
            //echo $SName[0];


            // echo "Percentage: ".$Perc. "<br>";

        }

        ?>
        <script>
            var test = <?php echo $Perc ?>

            var pieData = [
                {
                    value: <?php echo $array[0] ?>,
                    color: "#FDB45C",
                    highlight: "#FFC870",
                    label: "Msft"
                },
                {
                    value: <?php echo $array[1] ?>,
                    color: "#46BFBD",
                    highlight: "#5AD3D1",
                    label: "Futtaim"
                },
                {
                    value: <?php echo $array[2] ?>,
                    color:"#e53935",
                    highlight: "#FF5A5E",
                    label: "Toyota"
                }

            ];

            window.onload = function(){
                var ctx = document.getElementById("chart-area").getContext("2d");
                window.myPie = new Chart(ctx).Pie(pieData);

                var ctx2 = document.getElementById("canvas").getContext("2d");
                window.myLine = new Chart(ctx2).Line(lineChartData, {
                    responsive: true
                });
            };




        </script>

        <canvas id="chart-area" width="400" height="300" style="width: 300px; height: 300px;">


        </canvas>

        <div id="legends" style="position: absolute;top: 837px;right: 500px;"><table>
                <tr>
                    <td style="background-color:#FDB45C; width:40px;">&nbsp;</td>
                    <td style="padding-left: 10%;"><?php echo "".$SName[0]. " (".$array[0]. "%)"; ?></td>
                </tr>
                <tr>
                    <td style="background-color:#46BFBD; width:40px;">&nbsp;</td>
                    <td style="padding-left: 10%;"><?php echo $SName[1]. " (".$array[1]. "%)";  ?></td>
                </tr>
                <tr>
                    <td style="background-color:#e53935; width:40px;">&nbsp;</td>
                    <td style="padding-left: 10%;"><?php echo $SName[2]. " (".$array[2]."%)"; ?></td>
                </tr>
            </table></div>


    </nav>


</div>
    <br/>
</body>
</html>