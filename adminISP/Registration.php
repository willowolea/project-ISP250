<?PHP include('header.php'); ?> 

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width-device-width", initial-scale="1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
        <link rel="icon" type="image/icon" href="images/WBLogo.jpeg">
        <title>FA Registration Panel</title>
    
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/RegistrationFA.css">
    </head>

    <body>
    <?PHP include('logout.php'); ?>

        <main class="main-container">
            <div class="outer-container">

                <div class="main-title">
                    <h2>REGISTRATION LIST</h2>
                </div>

                <div class="icon-container">
                    <div class="icon" id="formContainersupp">
                        <a href="AddNewRegistration.php"><button class="material-icons-outlined">person_add</button></a>
                    </div>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>Registration ID</th>
                            <th>Register Time</th>
                            <th>Register In</th>
                            <th>Register Out</th>
                            <th>Student ID</th>
                            <th>Course ID</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php

                    include('config.php');

                    $sql = "SELECT * FROM registration";
                    $displaysql=mysqli_query($conn,$sql);

                    if(!$displaysql) {
                        die("Invalid query: " . $connection->error());
                    }

                    while($row = mysqli_fetch_array($displaysql)) {
                        echo "
                        <tr>
                            <td>$row[registrationID]</td>
                            <td>$row[timeSet]</td>
                            <td>$row[dateIn]</td>
                            <td>$row[dateOut]</td>
                            <td>$row[studID]</td>
                            <td>$row[courseID]</td>
                            <td>
                                <a href='UpdateRegistration.php?registrationID=".$row['registrationID']."' class='material-icons-outlined'>edit</a>
                                <a href='delete.php?table=registration&primarykey=registrationID&exprimkey=".$row['registrationID']."' class='material-icons-outlined'>delete</a>
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