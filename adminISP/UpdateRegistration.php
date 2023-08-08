<?PHP
# memanggil fail connection.php dari folder luaran
include('config.php');
# menyemak kewujudan data GET
if(!empty($_GET['registrationID']))
{
	# mengambil data get
	$id=$_GET['registrationID'];
	
	#menyediakan penyataan SQL untuk memilih rekod admin yang mempunyai
	#nokp yang sama seperti yang dipilih dari senarai
	$sql = "SELECT * FROM registration WHERE registrationID='$id'";
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
    <title>Staff Update</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/Supplier.css">
</head>

<body>

    <div class="update-container">
        <div class="update-form">
            <a href="Registration.php" class="material-icons-outlined">arrow_back</a>
            <h4>Update Information</h4>
            <form method="POST">
                <input type="text" id="name" name="regid" placeholder="Enter Registration ID"  value="<?php echo $record['registrationID']; ?>"><br>
                <input type="time" id="name" name="regtime" placeholder="Enter Registration Time"  value="<?php echo $record['timeSet']; ?>"><br>
                <input type="date" id="name" name="regin" placeholder="Registration In Date"  value="<?php echo $record['dateIn']; ?>"><br>
                <input type="date" id="name" name="regout" placeholder="Registration Out Date"  value="<?php echo $record['dateOut']; ?>"><br>
                <input type="text" id="name" name="studid" placeholder="Enter Student ID"  value="<?php echo $record['studID']; ?>"><br>
                <input type="text" id="name" name="courseid" placeholder="Enter Course ID"  value="<?php echo $record['courseID']; ?>"><br>
                <button type="submit">Save</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>
</html>

<?php

if (!empty($_POST)) {
    // Retrieve the form data
    $regid = $_POST['regid'];
    $regtime = $_POST['regtime'];
    $regin = $_POST['regin'];
    $regout = $_POST['regout'];
    $studid = $_POST['studid'];
    $courseid = $_POST['courseid'];

    
    include('config.php');

    // Prepare the update query
    $query = "UPDATE registration  SET  timeSet = '$regtime', dateIn = '$regin' ,dateOut = '$regout', studID = '$studid', courseID = '$courseid' WHERE registrationID = '$regid'";

    if (mysqli_query($conn, $query)) {

        echo "<script>alert('Data Save Successfully.'); 
        window.location.href='Registration.php';</script>";
    } 
    else {
        // Error handling if the update fails
        echo "<script>alert('Update fail.');
        window.history.back;</script>";
    }
}

?>