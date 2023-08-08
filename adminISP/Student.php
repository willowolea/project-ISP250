<?PHP include('header.php'); ?>

<!DOCTYPE html>
<html lang="eng">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width-device-width", initial-scale="1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
        <link rel="icon" type="image/icon" href="images/WBLogo.jpeg">
        <title>FA Student Panel</title>
    
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/StudentFA.css">
</head>
<body>
<?PHP include('logout.php'); ?>

    <main class="main-container">

        <div class="outer-container">
        <div class="main-title">
            <h2 class="font-weight-bold">STUDENT LIST</h2>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>IC Number</th>
                    <th>No. Telephone</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Registration ID </th>


                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            
            <?php

            include('config.php');

            $sql = "SELECT * FROM student";
            $displaysql=mysqli_query($conn,$sql);

            if(!$displaysql) {
                die("Invalid query: " . $connection->error());
            }

            while($row = mysqli_fetch_array($displaysql)) {
                echo "
                <tr>
                    <td>$row[studID]</td>
                    <td>$row[studName]</td>
                    <td>$row[studIC]</td>
                    <td>$row[studPhone]</td>
                    <td>$row[studPass]</td>
                    <td>$row[studEmail]</td>
                    <td>$row[studAddress]</td>
                    <td>$row[statusID]</td>
                    <td>$row[registrationID]</td>

                    <td>
                    <a href='UpdateStudent.php?studID=".$row['studID']."' class='material-icons-outlined'>edit</a>
                        <a href='delete.php?table=student&primarykey=studID&exprimkey=".$row['studID']."' class='material-icons-outlined'>delete</a>
                    </td>
                </tr>
                ";
            }
            ?>
            </tbody>
        </table>
        </div>
    </main>
</body>
</html>