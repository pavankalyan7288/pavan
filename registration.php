<?php
$showAlert = false;
$showError = false;
$exists = false;

function validateUsername($username) {
    $pattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{6,20}$/';
    return preg_match($pattern, $username);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db.php';

    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    if (validateUsername($username)) {
        $query = "SELECT * FROM `users` WHERE username='$username'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $rows = mysqli_num_rows($result);

        if ($rows == 0) {
            if ($password == $cpassword && !$exists) {
                $hash = password_hash($password, PASSWORD_DEFAULT);

                $insertquery = "INSERT INTO `users` (`username`, `password`)
                                VALUES ('$username', '$hash')";
                $iquery = mysqli_query($con, $insertquery);

                if ($iquery) {
                    $showAlert = true;
                } else {
                    $showError = "Data insertion unsuccessful.";
                }
            }
        } else {
            $exists = "Username not available";
        }
    } else {
        $showError = "Invalid username. Username should contain at least one uppercase letter, one lowercase letter, one digit, and have a length between 6 and 20 characters.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
        crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="https://freepngimg.com/thumb/facebook/62487-bluetie-icons-computer-facebook-login-icon-email.png">

</head>

<body>
    <?php
    if ($showAlert) {
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your account is now created and you can login.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
    }

    if ($showError) {
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> <?php echo $showError; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
    }

    if ($exists) {
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> <?php echo $exists; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
    }
    ?>

    <div class="container my-4">
        <h1 class="text-center">Registration Here</h1>
        <form action="registration.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="cpassword">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword" required>
                <small class="form-text text-muted">Make sure to type the same password</small>
            </div>

            <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</body>
</html>
