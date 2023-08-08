<?php
if(!empty($_GET))
{
	
	include("config.php");
	
	
	$table=$_GET['table'];
	$primarykey=$_GET['primarykey'];
	$exprimkey=$_GET['exprimkey'];
	
	$sql= "delete from $table where $primarykey='$exprimkey'";
	
	if(mysqli_query($conn, $sql))
	{
		echo "<script>alert('Data has been deleted');
		window.history.back();</script>";
	}
	else
	{
		echo "<script>alert('Data failed to be deleted');
		window.history.back();</script>";
	}
}
?>