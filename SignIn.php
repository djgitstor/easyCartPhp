<?php
$login = false;
$showerror = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $con = mysqli_connect("localhost", "root", "",);
    // $db = mysqli_select_db($con, "easycart");
    require('partials/db_connect.php');


    $userid = $_POST["UserId"];

    $pass = $_POST["Password"];

    $sql = "SELECT * FROM customers WHERE userid ='$userid' AND pass='$pass'";
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['userid'] = $userid;
        header('location:index.php?welcome=' . $userid);
        exit;
    } else {
        header("location:Signin.php");
    }
}

?>

<!DOCTYPE html>


<head>
    <title>EasyCart- Sign In to proceed</title>
    <link rel="stylesheet" href="CSS/style.css" type="text/css">
    <link rel="icon" href="logo.png">
    <style>
        .SignIndiv {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 800px;
            width: auto;
            overflow: hidden;
            background-size: cover;
            background-position: center;
        }

        .Login {
            background-color: #dddddd;
            border :1px solid #a5a5a5;
            margin: auto;
            padding: 50px;
        }

        #SignInform input {
            font-family: 'Heebo', sans-serif;
            font-size: 30px;
            padding: 8px;
            border-radius: 1px;
            margin: 20px;
        }

        .Signbutton:hover {
            cursor: pointer;
            border-color: white;
            background-color: rgb(98 137 78);
            color: beige;
        }

        .recoverpwd a {
            font-family: 'Heebo', sans-serif;
            font-size: 30px;
            text-decoration: none;
            color: rgb(28, 160, 39);
            text-shadow: 2px 2px black;
        }

        .recoverpwd a:hover {
            color: rgb(35, 188, 47);

        }

        .recoverpwd {
            text-align: center;

        }

        .signup {
            display: block;
            margin: 20px auto;
            width: max-content;
        }

        .signup a {
            padding: 10px;
            border: 2px groove white;
            border-radius: 5px;
            text-align: center;
            background-color: rgb(3, 160, 32);
            color: beige;
            text-shadow: 1px 1px black;
            text-decoration: none;
        }

        .signup a:hover {
            background-color: rgb(5, 180, 37);

        }
    </style>
</head>

<body>
    <?php require('partials/_header.php'); ?>



    <div class="SignIndiv">
        <div class="Login">
            <form method="POST" Id="SignInform" action="SignIn.php">
                <center>
                    <h1>Log in</h1>
                </center>
                <Table>
                    <tr>
                        <td><Input type="text" name="UserId" placeholder="User ID,Email,Mobile No"></td>

                    </tr>
                    <tr>
                        <td><Input type="password" name="Password" placeholder="Enter Password"></td>

                    </tr>
                    <tr>
                        <th><input class="Signbutton" type="submit" value="Log In"></th>

                    </tr>

                    <tr>
                        <td class="recoverpwd">
                            <a href="RecoverPass.php">Forgot Password</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="signup">
                            <a href="SignUp_form.php">Create New Account</a>
                        </td>

                    </tr>
                </Table>

            </form>
        </div>
    </div>

    </div>




    <?php require('partials/_footer.php'); ?>

</body>

</html>