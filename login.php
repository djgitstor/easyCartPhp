<?php
$login = false;
$showerror = false;
// $con=mysqli_connect("localhost","root","",);
// $db=mysqli_select_db($con,"easycart");
require('partials/db_connect.php');

$userid=$_POST["UserId"];

$pass=$_POST["Password"];

$sql = "SELECT * FROM customers WHERE userid ='$userid' AND pass='$pass'";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);
if ($num == 1){
    $login = true;
    session_start();
    $_SESSION['loggedin']=true;
    $_SESSION['userid']=$userid;
    header('location:index.php');
    exit;

}
else{
    header("location:Signin.php");
}




// // $z="insert into signin value('$a','$b')";
// mysqli_query($con,$z);
// mysqli_close($con);

// echo "<h2>Your Detail has been successfully Submitted...</h2>";

?>