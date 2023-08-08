<?php  
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width-device-width", initial-scale="1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
        <link rel="icon" type="image/icon" href="images/WBLogo.jpeg">
        <title>Administration Login</title>

        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/LoginStyleAdmin.css">
    </head>
    <body>

        <div class="container">
            <div class="myform">
                <form action="" method="POST">
                    <h2>ADMIN LOGIN</h2>
                    <input type="text" name="staffId" placeholder="Enter Staff ID" required>
                    <input type="Password" name="password" placeholder="Enter Password" required>
                    <button type="submit" name="submit">LOGIN</button><br>
                    <a href="LoginUser.php">Switch to User</a>
                </form>
            </div>
            <div class="image">
                
            </div>
        </div>
    </body>
</html>

<?PHP
# Step 2 : menyemak kewujudan data POST
// if(!empty($_POST))
// {
// 	# Step 3 : Mengambil data POST
// 	$staffId=$_POST['staffId'];
// 	$password=$_POST['password'];
	
// 	# Step 5 : Memanggil fail connection 
// 	include ('config.php');
	
// 	# Step 6 : Menyediakan arahan mencari SQL
// 	$searchsql="select * from staff where staff_id='".$staffId."' and
// 	staff_pass='".$password."' limit 1";
	
// 	# Step 7 : Melaksanakan arahan mencari SQL
// 	$findsql=mysqli_query($conn,$searchsql);
	
// 	# Step 8 : Membandingkan jumlah rekod yang ditemui semasa carian
// 	if(mysqli_num_rows($findsql)==1)
// 	{
// 		# Step 9 : Mengambil data yang ditemui secara carian
// 		$record=mysqli_fetch_array($findsql);
		
// 		# Step 10 : mengumpukan kepada nilai session
// 	    $_SESSION['staff_name']=$record['staff_name'];
// 	    $_SESSION['staff_notel']=$record['staff_notel'];
		
// 		echo "<script>window.location.href='IndexAdmin.php';</script>";
// 	}
// 	else
// 	{
// 	# Step 11 : Jika proses log masuk gagal
// 	    echo "<script>alert('Login Failed');
// 		     window.history.back();</script>";
// 	}
// }

include "config.php";

if(isset($_POST['submit'])){
    // echo "submit clicked";
    // get value from html input field
    $username = $_POST['staffId'];
    $password = $_POST['password'];

    if(!empty($username) && !empty($password)){
        // echo "username and password entered";
        $query = "SELECT * FROM `staff` WHERE staffID = '$username' limit 1";
        $result = mysqli_query($conn , $query);

        if($result){
        
            if($result && mysqli_num_rows($result) >0)
            {

                $staff_data = mysqli_fetch_assoc($result);
                if($staff_data['staffPass'] === $password){
                   
                    // echo "<script>window.location.href='Home.html.php';</script>";
                    header("Location: IndexAdmin.php?staffID=$staff_data[staffID]");
                    die;
                }

            }
        }
        echo "<script>alert('Login Failed');</script>";
    }

    else{
        echo "<script>Please enter some valid information</script>";
    }
}

?>