<?PHP include('header.php'); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width-device-width", initial-scale="1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
        <link rel="icon" type="image/icon" href="images/WBLogo.jpeg">
        <title>FA Staff Panel</title>
    
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/StaffFA.css">
    </head>

<body>
<?PHP include('logout.php'); ?>

    <main class="main-container">

        <div class="outer-container">
            <div class="main-title">
                <h2 class="font-weight-bold">STAFF LIST</h2>
            </div>
            
        <div class="icon-container">
            <div class="icon" id="formContainer">
                <a href ='AddNewStaff.php'><button class="material-icons-outlined">person_add</button></a>
            </div>
        </div>
        <table>
            <thead>

                <tr>
                    <th>Staff ID</th>
                    <th>Name</th>
                    <th>IC Number</th>
                    <th>No Tel</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Job</th>
                    <th>Salary</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            <?php

            include('config.php');

            $sql = "SELECT * FROM staff";
            $displaysql=mysqli_query($conn,$sql);

            if(!$displaysql) {
                die("Invalid query: " . $connection->error());
            }

            while($row = mysqli_fetch_array($displaysql)) {
                echo "
                <tr>
                    <td>$row[staffID]</td>
                    <td>$row[staffName]</td>
                    <td>$row[staffIC]</td>
                    <td>$row[staffPhone]</td>
                    <td>$row[staffPass]</td>
                    <td>$row[staffEmail]</td>
                    <td>$row[staffJob]</td>
                    <td>$row[staffSalary]</td>
                    <td>$row[staffAddress]</td>
                    <td>
                        <a href='UpdateStaff.php?staffID=".$row['staffID']."' class='material-icons-outlined'>edit</a>
                        <a href='delete.php?table=staff&primarykey=staffID&exprimkey=".$row['staffID']."' class='material-icons-outlined'>delete</a>
                    </td>
                </tr>
                ";
            }
            ?>
                
            </tbody>
        </table>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>
</html>