<?php
require_once 'php/db.php';
session_start();
$serverResponse = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST['firstName']) &&
        isset($_POST['emailId']) &&
        isset($_POST['lastName']) &&
        isset($_POST['password']) &&
        isset($_POST['cellPhone']) &&
        isset($_POST['address']) &&
        isset($_POST['homePhone'])
    ) {
        $firstName = mysqli_real_escape_string($mysqli, $_POST['firstName']);
        $lastName = mysqli_real_escape_string($mysqli, $_POST['lastName']);
        $emailId = mysqli_real_escape_string($mysqli, $_POST['emailId']);
        $password = mysqli_real_escape_string($mysqli, $_POST['password']);
        $cellPhone = mysqli_real_escape_string($mysqli, $_POST['cellPhone']);
        $homePhone = mysqli_real_escape_string($mysqli, $_POST['homePhone']);
        $address = mysqli_real_escape_string($mysqli, $_POST['address']);

        $sql = "INSERT INTO user (firstName, lastName, emailId, password, cellPhone, homePhone, address) VALUES (?, ?, ?, ?, ?, ?, ?)";
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("sssssss", $param_firstName, $param_lastName, $param_emailId, $param_password, $param_cellPhone, $param_homePhone, $param_address);
            $param_firstName = $firstName;
            $param_lastName = $lastName;
            $param_emailId = $emailId;
            $param_password = $password;
            $param_cellPhone = $cellPhone;
            $param_homePhone = $homePhone;
            $param_address = $address;
            if ($stmt->execute()) {
                $_SESSION["emailId"] = $emailId;
                $_SESSION["firstName"] = $firstName;
                $_SESSION["lastName"] = $lastName;
                $serverResponse =  "Registered successfully!";
            }
            $stmt->close();
        }
    } else {
        $serverResponse = "Invalid Request";
    }
    $mysqli->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body onload="loadPage()">
    <div class="main">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h4 style="color: red" id="errorArea"><?php echo $serverResponse ?></h4>
                        <h2 class="form-title">Sign up</h2>
                        <form class="register-form" id="register-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="firstName" id="name" placeholder="First Name" />
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="lastName" id="name" placeholder="Last Name" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="emailId" id="email" placeholder="Your Email" />
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-smartphone-android material-icons-name"></i></label>
                                <input type="text" name="cellPhone" id="name" placeholder="Cell Phone" />
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-phone material-icons-name"></i></label>
                                <input type="text" name="homePhone" id="name" placeholder="Home Phone" />
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-email material-icons-name"></i></label>
                                <input type="text" name="address" id="name" placeholder="Address" />
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        function loadPage() {
            setTimeout(() => {
                if (document.getElementById('errorArea').innerHTML == "Registered successfully!") {
                    window.location = "http://" + window.location.host + "/MarketPlace/home.php"
                }
            }, 1500);
        }
    </script>
</body>

</html>