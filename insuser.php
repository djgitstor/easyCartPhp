<?php
$esist=false;
$passalert=false;
$host = "localhost";
$user = "root";
$pass = "";
$db = "easycart";
$con = mysqli_connect($host, $user, $pass, $db);
$uid = $_POST['userid'];
$fname = $_POST['fname'];
$sname = $_POST['sname'];
$mob = $_POST['mob'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$cpass = $_POST['cpass'];
if(isset($_POST['userid'])){
if ($pass == $cpass){
    $sql = "INSERT INTO `customers`(`userid`, `fname`, `sname`, `mob`, `email`, `pass`) VALUES ('$uid','$fname','$sname','$mob','$email','$pass')";
    // $sql = "insert into customers value('','$fname','$sname','$mob','$email','$pass')";
    if(($sql)!=NULL){
    $result = mysqli_query($con, $sql);
    
}
    if ($result) {
        echo "your data has been susseccfully submitted";

        session_start();
        $_SESSION['userid'] = "$uid";
        $_SESSION['mob'] = "$mob";
        echo "We have saved your session";
        header('location:index.php');
    }
}
 else {
    $showerror = "password do not match";
    echo 'Something went wrong';
    header('location:SignUp_form.php');
    
}
}
else{
    header('location:SignUp_form.php');

    echo "Please enter Vailid Credentials";
}
?>