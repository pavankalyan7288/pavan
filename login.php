<?php
session_start();

function validateUsername($username) {
    $pattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{6,20}$/';
    return preg_match($pattern, $username);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (validateUsername($username)) {
        $con = mysqli_connect("localhost", "root", "", "loginsystem");
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $query = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        $count = mysqli_num_rows($result);

        if ($count == 1 && password_verify($password, $row["password"])) {
            $_SESSION["username"] = $username;
            header("Location: dashboard.php");
            exit();
        } else {
            $loginError = "Invalid username or password";
        }

        mysqli_close($con);
    } else {
        $loginError = "Invalid username. Username should contain at least one uppercase letter, one lowercase letter, one digit, and have a length between 6 and 20 characters.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="icon" type="image/x-icon" href="https://freepngimg.com/thumb/facebook/62487-bluetie-icons-computer-facebook-login-icon-email.png">
    <style>
    body {font-family: Arial, Helvetica, sans-serif;}
    form {border: 3px solid #f1f1f1;}

    input[type=text], input[type=password] {
        width: 50%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    button {
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    button:hover {
        opacity: 0.8;
    }

    .login-button {
        padding: 12px;
        background: greenyellow;
        color: black;
        font-size: 18px;
    }

    .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
    }

    .link {
        padding: 12px;
        font-size: 18px;
        color: black;
        background-color: #f44336;
        width: 160px;
        text-align: center;
    }

    .container {
        padding: 16px;
    }

    span.psw {
        float: right;
        padding-top: 16px;
    }

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }
        .cancelbtn {
            width: 100%;
        }
    }
    </style>
</head>
<body>
    <form class="form" method="post" name="login">
        <center>
            <h1 class="login-title">Login</h1>
            <?php if (isset($loginError)) { ?>
                <p style="color: red;"><?php echo $loginError; ?></p>
            <?php } ?>
            <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
            <input type="password" class="login-input" name="password" placeholder="Password"/><br><br>
            <input type="submit" value="Login" name="submit" class="login-button"/>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
            <div class="container" style="background-color:#f1f1f1">
                <button type="button" class="cancelbtn">Cancel</button>
                <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
        </center>
        <p class="link"><a href="registration.php">New Registration</a></p>
    </form>
</body>
</html>
