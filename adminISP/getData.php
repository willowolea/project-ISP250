<?php
include('config.php');

$query = "SELECT MONTH(invDate) AS month, SUM(amount) AS totalAmount FROM invoice GROUP BY MONTH(invDate)";
$exec = mysqli_query($conn, $query);

$data = array();
while ($row = mysqli_fetch_assoc($exec)) {
    $month = (int) $row['month'];
    $sales = (float) $row['totalAmount'];
    $data[] = array($month, $sales);
}

// Return the data as JSON
echo json_encode($data);
?>