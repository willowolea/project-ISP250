<?PHP
# memanggil fail connection.php dari folder luaran
include('config.php');
# menyemak kewujudan data GET
if(!empty($_GET['staffID']))
{
	# mengambil data get
	$id=$_GET['staffID'];
	
	$sql = "SELECT * FROM staff WHERE staffID='$id'";
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
    <title>FA Staff Update Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/UpdateStaffFA.css">
</head>

<body>

    <div class="update-container">
        <div class="update-form">
            <a href="Staff.php" class="material-icons-outlined">arrow_back</a>
            <h4>Update Staff Information</h4>
            <form method="POST">
                <input type="text" id="name" name="newStaffid" placeholder="Enter Staff ID" value="<?php echo $record['staffID']; ?>"><br>
                <input type="text" id="name" name="newStaffname" placeholder="Enter Staff Name" value="<?php echo $record['staffName']; ?>"><br>
                <input type="text" id="name" name="newStaffic" placeholder="Enter Staff IC No." value="<?php echo $record['staffIC']; ?>"><br>
                <input type="text" id="name" name="newStaffnoTel" placeholder="Enter No. Tel" value="<?php echo $record['staffPhone']; ?>"><br>
                <input type="text" id="name" name="newStaffpass" placeholder="Enter Password" value="<?php echo $record['staffPass']; ?>"><br>
                <input type="text" id="name" name="newStaffemail" placeholder="Enter Staff Email" value="<?php echo $record['staffEmail']; ?>"><br>
                <input type="text" id="name" name="newStaffjob" placeholder="Enter Staff Job" value="<?php echo $record['staffJob']; ?>"><br>
                <input type="text" id="name" name="newStaffsalary" placeholder="Enter Staff Salary" value="<?php echo $record['staffSalary']; ?>"><br>
                <input type="text" id="name" name="newStaffAddress" placeholder="Enter Address" value="<?php echo $record['staffAddress']; ?>"><br>
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
    $newStaffid = $_POST['newStaffid'];
    $newStaffname = $_POST['newStaffname'];
    $newStaffic = $_POST['newStaffic'];
    $newStaffnoTel = $_POST['newStaffnoTel'];
    $newStaffpass = $_POST['newStaffpass'];
    $newStaffemail = $_POST['newStaffemail'];
    $newStaffjob = $_POST['newStaffjob'];
    $newStaffsalary = $_POST['newStaffsalary'];
    $newStaffAddress = $_POST['newStaffAddress'];

    // Prepare the update query
    $query = "UPDATE staff SET staffName = '$newStaffname', staffIC = '$newStaffic', staffPhone = '$newStaffnoTel',staffPass = '$newStaffpass',staffEmail = '$newStaffemail', staffJob = '$newStaffjob', staffSalary = '$newStaffsalary', staffAddress = '$newStaffAddress' WHERE staffID = '$newStaffid'";

    if (mysqli_query($conn, $query)) {

        echo "<script>alert('Data Save Successfully.'); 
        window.location.href='Staff.php';</script>";
    } 
    else {
        // Error handling if the update fails
        echo "<script>alert('Update fail.');
        window.history.back();</script>";
    }
}

?>