<?php include('config.php'); ?>

<?PHP include('header.php'); ?>

<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width-device-width", initial-scale="1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="icon" type="image/icon" href="images/WBLogo.jpeg">
    <title>FA Dashboard Panel</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/AdminStyle.css">
</head>

<body>
    <?PHP include('logout.php'); ?>


    <main class="main-container">
        <div class="main-title">
            <p class="font-weight-bold">DASHBOARD</p>
        </div>

            <div class="main-cards">
                <div class="card">
                    <div class="card-inner">
                      <p class="text-primary">STAFF</p>
                      <span class="material-icons-outlined">supervisor_account</span>
                    </div>
                    <?php
                        $dash_category_query = "SELECT * from staff";
                        $dash_category_query_run = mysqli_query($conn, $dash_category_query);

                        if($staff_total = mysqli_num_rows($dash_category_query_run))
                        {
                            echo '<span class="text-primary font-weight-bold">'.$staff_total.'</span>';
                        }
                        else {
                            echo '<span class="text-primary font-weight-bold">249</span>';
                        }
                    ?>
               </div>

                <div class="card">
                    <div class="card-inner">
                        <p class="text-primary">STUDENT</p>
                        <span class="material-icons-outlined">person</span>
                    </div>
                    <?php
                    $dash_category_query = "SELECT * from student";
                    $dash_category_query_run = mysqli_query($conn, $dash_category_query);

                    if($student_total = mysqli_num_rows($dash_category_query_run))
                    {
                        echo '<span class="text-primary font-weight-bold">'.$student_total.'</span>';
                    }
                    else {
                        echo '<span class="text-primary font-weight-bold">83</span>';
                    }
                    ?>
                </div>
             
                <div class="card">
                    <div class="card-inner">
                        <p class="text-primary">COURSE</p>
                        <span class="material-icons-outlined">library_books</span>
                    </div>
                    <?php
                            $dash_category_query = "SELECT * from course";
                            $dash_category_query_run = mysqli_query($conn, $dash_category_query);

                            if($course = mysqli_num_rows($dash_category_query_run))
                            {
                                echo '<span class="text-primary font-weight-bold">'.$course.'</span>';
                            }
                            else {
                                echo '<span class="text-primary font-weight-bold">79</span>';
                            }
                    ?>
                </div>

                <div class="card">
                    <div class="card-inner">
                        <p class="text-primary">TOTAL SALES</p>
                        <span class="material-icons-outlined text-red">paid</span>
                    </div>
                    <?php
                        $dash_category_query = "SELECT SUM(amount) AS total_quantity from invoice";
                        $dash_category_query_run = mysqli_query($conn, $dash_category_query);

                        if($dash_category_query_run && mysqli_num_rows($dash_category_query_run) > 0)
                        {
                            $row = mysqli_fetch_assoc($dash_category_query_run);
                            $inventory_quantity = $row['total_quantity'];
                            echo '<span class="text-primary font-weight-bold">'.$inventory_quantity.'</span>';
                        }
                        else {
                            echo '<span class="text-primary font-weight-bold">56</span>';
                        }
                    ?>
                </div>
            </div>

            <div class="charts">

                <div class="charts-card">
                    <p class="chart-title">Top 5 Subjects</p>
                        <div id="bar-chart" style="width:510px; height:300px; margin:30px 20px; padding:10px;"></div>
                </div>
                
                <div class="charts-card">
                    <p class="chart-title">Total Sales</p>
                    <div id="area-chart" margin:30px 20px; padding:10px;></div>
                </div>
                
            </div>
</main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.40.0/apexcharts.min.js"></script>
    <script src="js/scripts.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script>
    google.charts.load('current', { 'packages': ['bar'] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['COURSE ID', 'Students'],
            <?php
            include('config.php');

            $query = "SELECT courseID, COUNT(courseID) AS totalStudents FROM registration GROUP BY courseID";
            $exec = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($exec)) {
                $courseID = $row['courseID'];
                $totalStudents = $row['totalStudents'];

                echo "['$courseID', $totalStudents],";
            }
            ?>
        ]);
        
        var barOptions = {
            chart: {
                fontName: 'Montserrat',
            },
            bars: 'vertical',
            legend: { position: 'none' },
            colors: ['#3366cc'],
        };

        var barChart = new google.charts.Bar(document.getElementById('bar-chart'));
        barChart.draw(data, google.charts.Bar.convertOptions(barOptions));
    }
    </script>

    <script>
        google.charts.load('current', { 'packages': ['corechart'] });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Month', 'Total Sales'],
                <?php
                include('config.php');

                $query = "SELECT MONTH(invDate), SUM(amount) FROM invoice GROUP BY MONTH(invDate)";
                $exec = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_array($exec)) {
                    $month = $row[0];
                    $totalSales = $row[1];

                    echo "['$month', $totalSales],";
                }
                ?>
            ]);

            var options = {
                hAxis: { title: 'Month', titleTextStyle: { color: '#333' } },
                vAxis: { minValue: 0 }
            };

            var chart = new google.visualization.AreaChart(document.getElementById('area-chart'));

            chart.draw(data, options);
        }
    </script>

</body>
</html>

<!-- 
     <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
        // Make an AJAX request to retrieve data from your PHP file
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'getData.php', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
            var responseData = JSON.parse(xhr.responseText);

            var data = google.visualization.arrayToDataTable(responseData);

            var options = {
                hAxis: {title: 'Month',  titleTextStyle: {color: '#333'}},
                vAxis: {minValue: 0}
            };

            var chart = new google.visualization.AreaChart(document.getElementById('area-chart'));
            chart.draw(data, options);
            }
        };
        xhr.send();
        }
    </script>
    <div class="charts-card">
                    <p class="chart-title">Top 5 Subjects</p>
                    <div id="bar-chart"></div>
                </div>


            google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  // Make an AJAX request to retrieve data from your PHP file
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'data.php', true);
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var responseData = JSON.parse(xhr.responseText);

      var data = google.visualization.arrayToDataTable(responseData);

      var options = {
        hAxis: {title: 'Month',  titleTextStyle: {color: '#333'}},
        vAxis: {minValue: 0}
      };

      var chart = new google.visualization.AreaChart(document.getElementById('area-chart'));
      chart.draw(data, options);
    }
  };
  xhr.send();
}
-->