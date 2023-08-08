<?PHP include('header.php'); ?>

<!DOCTYPE html>
<html lang="eng">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width-device-width", initial-scale="1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
        <link rel="icon" type="image/icon" href="images/WBLogo.jpeg">
        <title>FA Report Panel</title>
    

        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/reportFA.css">
    </head>

    <body>
    <?PHP include('logout.php'); ?>
        <main class="main-container">

            <div class="container">
                <div class="main-title">
                    <h2>REPORT LIST</h2>
                </div>

                <div class="report-form"> 
                    <form action="" method="POST" enctype="multipart/form-data">
                    <select name='month' required>
                            <option value selected disabled>Choose Month</option>
                            <option value='-01-'>January</option>
                            <option value='-02-'>February</option>
                            <option value='-03-'>March</option>
                            <option value='-04-'>April</option>
                            <option value='-05-'>May</option>
                            <option value='-06-'>June</option>
                            <option value='-07-'>July</option>
                            <option value='-08-'>August</option>
                            <option value='-09-'>September</option>
                            <option value='-10-'>October</option>
                            <option value='-11-'>November</option>
                            <option value='-12-'>December</option>
                            </select>
                        <input type="submit" value="Search" class="btn">
                        </select>
                    </form>
                </div>
            
            
                <?PHP
                if(!empty($_POST['month']))
                {
                    include('config.php');

                    $invoicesql = "SELECT * FROM invoice, student, course 
                    WHERE student.studID = invoice.studID AND
                    course.courseID = invoice.courseID AND
                    invoice.invDate LIKE '%".$_POST['month']."%'";

                    $sql = mysqli_query($conn, $invoicesql);

                    $sum = "SELECT SUM(invoice.amount) as Total FROM invoice
                    WHERE invoice.invDate like '%".$_POST['month']."%'";

                    $doSum = mysqli_query($conn,$sum);
                    $sum_record=mysqli_fetch_array($doSum);

                    if(mysqli_num_rows($sql)>0) {
                        echo"
                        <div class='report-display'>
                        <table class='report-table-invoice' id='report'>
                            <head>
                            <tr>
                            <td colspan='9' align='right'>Total Profit Month of ".$_POST['month'].": </td>
                            <td><b>RM ".$sum_record['Total']."</b></td>
                            </tr>

                            <tr>
                                <th>Bil</th>
                                <th>Student ID</th>
                                <th>Invoice ID</th>
                                <th>Student Name</th>
                                <th>Course ID</th>
                                <th>Course Name</th>
                                <th>Invoice Date</th>
                                <th>Invoice Time</th>
                                <th>Amount</th>
                            </tr>
                            </head>
                        ";

                        $bil=0;

                        while($row=mysqli_fetch_array($sql)) {
                            echo "
                                <tr>
                                    <td>".++$bil."</td>
                                    <td>".$row['studID']."</td>
                                    <td>".$row['InvID']."</td>
                                    <td>".$row['studName']."</td>
                                    <td>".$row['courseID']."</td>
                                    <td>".$row['courseName']."</td>
                                    <td>".$row['invDate']."</td>
                                    <td>".$row['invTime']."</td>
                                    <td>".$row['amount']."</td>
                                </tr>";
                        }
                        echo "</table>
                        </div>";
                    }
                }
                else
                {
                echo"
                <div class='display-container'>
                    <h3>No record found</h3>
                </div>
                ";
                }

                ?>
            </div>
            <button id="btnReport" onclick="printTable()" class="btn-print">Print</button>
        </main>

        <script>
        function printTable() {
            var table = document.getElementById("report");
            var printWindow = window.open('', '', 'width=800,height=600');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Print Table</title>');
            printWindow.document.write('<style>table{border-collapse:collapse;width:100%;}th,td{border:1px solid black;padding:8px;text-align:left;}</style>');
            printWindow.document.write('</head><body>');
            printWindow.document.write('<h1>Table Report</h1>');
            printWindow.document.write(table.outerHTML);
            printWindow.document.close();
            printWindow.print('');
        }
  </script>
    </body>
</html>