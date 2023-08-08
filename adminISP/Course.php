<?php
include('config.php');

if(!empty($_POST))
{
	# mengambil data POST
	$courseID=$_POST['courseID'];
	$courseName=$_POST['courseName'];
    $courseBio=$_POST['courseBio'];
    $coursePrice=$_POST['coursePrice'];
	$courseCredit=$_POST['courseCredit'];
    $coursePeriod=$_POST['coursePeriod'];

	
	# semak data yang diambil empty atau tidak
	if(empty($courseID) or empty($courseName)  or empty($coursePrice) or empty($courseBio) or empty($courseCredit) or empty($coursePeriod))
	{
		die("<script>alert('Fill in information'); window.history.back();</script>");
	}

    $sql_insert="insert into course
	(courseID, courseName, courseBio,coursePrice, courseCredit, coursePeriod)
	values
	('$courseID','$courseName','$courseBio','$coursePrice','$courseCredit', '$coursePeriod')";

    if(mysqli_query($conn,$sql_insert))
    {
		echo "<script>alert('Data Save Successfully.');
        window.location.href='Course.php';</script>;";
	
	}
	else
	{
		echo "<script>alert('Please try again');
        window.history.back;</script>";
	}
}


?>

<?php include('header.php'); ?>

<!DOCTYPE html>
<html lang="eng">
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width-device-width", initial-scale="1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
        <link rel="icon" type="image/icon" href="images/WBLogo.jpeg">
        <title>FA Course Panel</title>
    
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/CourseFA.css">
    </head>
<body>
<?PHP include('logout.php'); ?>
<?php 
    if(isset($message)) {
        foreach($message as $message) {
            echo '<span class="message">'.$message.'</span>';
        }
    }
?>


<main class="main-container">
    <div class="outer-container">

        <div class="main-title">
            <h2>COURSE LIST</h2>
        </div>

        <div class="product-form-container">
            <form action="" method="POST" enctype="multipart/form-data">
                <h3>Add New Course</h3>
                <input type="text" placeholder="Enter Course ID" name="courseID" class="box">
                <input type="text" placeholder="Enter Course Name" name="courseName" class="box">
                <input type="text" placeholder="Enter Course Description" name="courseBio" class="box">
                <input type="text" placeholder="Enter Course Price" name="coursePrice" class="box">
                <input type="text" placeholder="Enter Course Credit Hour" name="courseCredit" class="box">
                <input type="text" placeholder="Enter Course Period" name="coursePeriod" class="box">
                <input type="submit" class="btn" name="addCourse" value="Add Course">
            </form>
        </div>

        <div class="item-display">
            <table class="item-display-table">
                <thead>
                    <tr>
                        <th>Course ID</th>
                        <th>Course Name</th>
                        <th>Course Description</th>
                        <th>Course Price</th>
                        <th>Course Credit</th>
                        <th>Course Period</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>

                <?php 
                include('config.php');

                $sql = "SELECT * FROM course";
                $displaysql=mysqli_query($conn,$sql);
        
                if(!$displaysql) {
                    die("Invalid query: " . $connection->error());
                }

                while($row = mysqli_fetch_assoc($displaysql)) {
                echo "
                <tr>
                    
                    <td>$row[courseID]</td>
                    <td>$row[courseName]</td>
                    <td>$row[courseBio]</td>
                    <td>$row[coursePrice]</td>
                    <td>$row[courseCredit]</td>
                    <td>$row[coursePeriod]</td>
                    <td>
                        <a href='UpdateCourse.php?courseID=".$row['courseID']."' class='material-icons-outlined'>edit</a>
                        <a href='delete.php?table=course&primarykey=courseID&exprimkey=".$row['courseID']."' class='material-icons-outlined'>delete</a>
                    </td>
                </tr>
                ";
                } 
                ?>

            </table>
        </div>
    </div>
 </main>
</body>
</html>


<!--
    <td><img src = "uploaded_img/<?php $row['images']; ?>" height="100" alt=""></td>
    <td><?php $row['name']; ?></td>
-->