<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sts_db";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
   die('Could not Connect My Sql:' .mysql_error());
}
if(isset($_POST['save']))
{	 
	 $current_yr = $_POST['current_yr'];
	 $finance_yr = $_POST['finance_yr'];
	 $percent = $_POST['percent'];
	
	 $sql = "INSERT INTO employee (current_yr,finance_yr,percent)
	 VALUES ('$current_yr','$finance_yr','$percent')";
	 if (mysqli_query($conn, $sql)) {
		echo "New record created successfully !";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>