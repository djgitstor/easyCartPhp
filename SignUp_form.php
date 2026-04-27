<!DOCTYPE html>

<head>
    <?php
    $showerror = false;
    $showalart = false;
    $exists = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST['userid'])) {
            if (!empty($_POST['pass'])) {


                $host = "localhost";
                $user = "root";
                $dbpass = "";
                $db = "easycart";
                $con = mysqli_connect($host, $user, $dbpass, $db);
                $uid = $_POST['userid'];
                $fname = $_POST['fname'];
                $sname = $_POST['sname'];
                $mob = $_POST['mob'];
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $cpass = $_POST['cpass'];

                // $sql = "SELECT * FROM customers WHERE userid ='$uid' || email ='$email' || mpb = '$mob'";
                // $result = mysqli_query($con, $sql);
                // $num = mysqli_num_rows($result);
                // if ($num == 1){
                //     $exists = true;

                // }
                // else{
                //     $exists = false;
                // }
                if (($pass  == $cpass) /*&& $exists = false*/) {

                    $sql = "INSERT INTO `customers`(`userid`, `fname`, `sname`, `mob`, `email`, `pass`) VALUES ('$uid','$fname','$sname','$mob','$email','$pass')";
                    $result = mysqli_query($con, $sql);
                    if ($result) {
                        $showalart = true;
                    }
                } else {
                    $showerror = "Password Do Not Match";
                }
            }
            else{
                $passalart = "please enter Password";
            }
        }
        else{
            $idalart = "Please enter user id";
        }
    }
    ?>
    <title>EasyCart - Sign Up</title>
    <link rel="stylesheet" href="CSS/style.css" type="text/css">
    <link rel="icon" href="logo.png">


    <style>
        input[name] {
            font-family: 'Heebo', sans-serif;
            font-size: 25px;
            padding: 8px;
            border-radius: 5px;
            width: 100%;
            margin-bottom: 50px;
        }

        #SignUp_div {
            width: 50%;
            background-color: #dddddd;
            padding: 50px;
            border :1px solid #a5a5a5;
            border-radius: 1px;
        }

        .SignUp_form {
            display: flex;
            flex-direction: column;
            width: auto;

        }

        .SignUp_form label {
            text-shadow: 2px 2px 2px #8b8b8b;
            color:black;
            text-align:center;
            font-size:25px;
        }

        button[type="submit"] {
            width: 300px;
            font-family: 'Heebo', sans-serif;
            font-size: 25px;
            padding: 8px;
            margin: 20px auto;
            border-radius: 5px;
            color: rgb(28, 28, 68);
            cursor: pointer;
        }


        button[type="submit"]:hover {
            cursor: pointer;
            border-color: white;
            background-color: rgb(44, 34, 131);
            color: beige;
        }
    </style>

</head>

<body>
    <?php require('partials/_header.php'); ?>

    <?php
    if ($showalart) {
        header("location:Signin.php");
        // echo "success";
    } elseif ($showerror) {
        echo "$showalart";
    } elseif ($exists){
        echo "record exists";
    }
    ?>

    <div class="content">
        <div id="SignUp_div">
            <form class="SignUp_form" method="POST" action="SignUp_form.php">
                <label for="First_Name:">First Name:</label>

                <input type="text" name="fname" placeholder="Enter First Name...">

                <label for="Last_Name">Last Name:</label>

                <input type="text" name="sname" placeholder="Enter Last Name...">

                <label for="First_Name:">User Name:</label>
                <?php
                if(isset($passalart) && $passalart=true){
                    echo "<p style='color:red;'> Please Enter Password</p>";
                }
                    ?>

                <input type="text" name="userid" placeholder="Enter a uniq username...">




                <label for="Mobile_No">Mobile No:</label>


                <input type="text" name="mob" placeholder="Enter Mobile No...">

                <label for="E-mail">E-mail:</label>


                <input type="text" name="email" placeholder="Enter E-mail Address...">

                <label for="Password">Password:</label>
                
                <?php
                if(isset($passalart) && $passalart=true){
                    echo "<p style='color:red;'> Please Enter Password</p>";
                }
                    ?>
                
                <input type="password" name="pass" placeholder="Create Password...">

                <label for="Confirm_Password">Confirm Password:</label>


                <input type="password" name="cpass" placeholder="Confirm Your Password...">


                <button type="submit">Submit</button>

            </form>
        </div>




    </div>
    <?php require('partials/_footer.php'); ?>
</body>

</html>