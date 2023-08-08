<?PHP
# memanggil fail connection.php dari folder luaran
include('config.php');

if (!empty($_GET['courseID'])) {
    $id = $_GET['courseID'];

    $sql = "SELECT * FROM course WHERE courseID='$id'";
    $result = mysqli_query($conn, $sql);

    $record = mysqli_fetch_array($result);
}

?>

<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width-device-width", initial-scale="1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="icon" type="image/icon" href="images/WBLogo.jpeg">
    <title>FA Course Update Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/ItemStyle.css">
</head>
<body>
    <div class="container">

        <div class="product-form-container centered">
            <form action="" method="post" enctype="multipart/form-data">
                <a href="Course.php" class="material-icons-outlined">close</a>
                <h3>Update The Course</h3>
                <input type="text" placeholder="Enter Course ID" name="newcourseid" class="box" value="<?php echo $record['courseID']; ?>">
                <input type="text" placeholder="Enter Course name" name="newcoursename" class="box" value="<?php echo $record['courseName']; ?>">
                <input type="text" placeholder="Enter Course Description" name="newcoursebio" class="box" value="<?php echo $record['courseBio']; ?>">
                <input type="text" placeholder="Enter Course Price" name="newcourseprice" class="box" value="<?php echo $record['coursePrice']; ?>">
                <input type="text" placeholder="Enter Course Credit Hour" name="newcoursecredit" class="box" value="<?php echo $record['courseCredit']; ?>">
                <input type="text" placeholder="Enter Course Period" name="newcourseperiod" class="box" value="<?php echo $record['coursePeriod']; ?>">
                <input type="submit" class="btn" name="update_product" value="update product">
            </form>
        </div>




    </div>

</body>
</html>


<?php
if (!empty($_POST)) {
    // Retrieve the form data
    $newcourseid = $_POST['newcourseid'];
    $newcoursename = $_POST['newcoursename'];
    $newcoursebio = $_POST['newcoursebio'];
    $newcourseprice = $_POST['newcourseprice'];
    $newcoursecredit = $_POST['newcoursecredit'];
    $newcourseperiod = $_POST['newcourseperiod'];
   
    // Prepare the update query
    $query = "UPDATE course SET courseName = '$newcoursename', courseBio = '$newcoursebio',coursePrice = '$newcourseprice', courseCredit = '$newcoursecredit', coursePeriod = '$newcourseperiod' WHERE courseID = '$newcourseid'";

    if (mysqli_query($conn, $query)) {

        echo "<script>alert('Data Save Successfully.'); 
        window.location.href='Course.php';</script>";
    } 
    else {
        // Error handling if the update fails
        echo "<script>alert('Update fail.');
        window.history.back();</script>";
    }
}

?>