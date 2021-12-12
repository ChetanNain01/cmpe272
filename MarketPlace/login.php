<?php
require_once 'php/db.php';
session_start();
$serverResponse = '';
$_SESSION['emailId'] = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['emailId']) && isset($_POST['password'])) {
        $emailId = mysqli_real_escape_string($mysqli, $_POST['emailId']);
        $password = mysqli_real_escape_string($mysqli, $_POST['password']);
        $sql = "SELECT emailId, password FROM user WHERE emailId = '$emailId' and password = '$password'";
        $result = mysqli_query($mysqli, $sql);
        $row = $result->fetch_row();
        $count = mysqli_num_rows($result);
        if ($count != 0) {
            $_SESSION['emailId'] = $row[0];
            $serverResponse = "LoggedIn successfully!";
        } else {
            $serverResponse = "Invalid username or password";
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
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                    </div>

                    <div class="signin-form">
                        <h4 style="color: red" id="errorArea"><?php echo $serverResponse ?></h4>
                        <h2 class="form-title">Sign In</h2>
                        <form method="POST" class="register-form" id="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="emailId" id="your_name" placeholder="Email Id" />
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="your_pass" placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#">
                                        <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
                                        </fb:login-button>
                                        <div id="status">
                                        </div>
                                </li>
                            </ul>
                        </div>
                        <a href="register.php" class="signup-image-link">Not a member yet? Get Registered.</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/config.js"></script>
    <script>
        function loadPage() {
            setTimeout(() => {
                if (document.getElementById('errorArea').innerHTML == "LoggedIn successfully!") {
                    window.location = "http://" + window.location.host + "/MarketPlace/home.php"
                }
            }, 1500);
        }

        // This is called with the results from from FB.getLoginStatus().
        function statusChangeCallback(response) {
            console.log('statusChangeCallback');
            console.log(response);
            // The response object is returned with a status field that lets the
            // app know the current login status of the person.
            // Full docs on the response object can be found in the documentation
            // for FB.getLoginStatus().
            if (response.status === 'connected') {
                // Logged into your app and Facebook.
                testAPI();
            } else if (response.status === 'not_authorized') {
                // The person is logged into Facebook, but not your app.
                //document.getElementById('status').innerHTML = 'Login with Facebook ';
            } else {
                // The person is not logged into Facebook, so we're not sure if
                // they are logged into this app or not.
                //document.getElementById('status').innerHTML = 'Login with Facebook ';
            }
        }
        // This function is called when someone finishes with the Login
        // Button. See the onlogin handler attached to it in the sample
        // code below.
        function checkLoginState() {
            FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });
        }
        window.fbAsyncInit = function() {
            FB.init({
                appId: '888081491867584',
                cookie: true, // enable cookies to allow the server to access
                // the session
                xfbml: true, // parse social plugins on this page
                version: 'v2.2' // use version 2.2
            });
            FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });
        };
        // Load the SDK asynchronously
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        // Here we run a very simple test of the Graph API after login is
        // successful. See statusChangeCallback() for when this call is made.
        function testAPI() {
            console.log('Welcome! Fetching your information.... ');
            FB.api('/me?fields=name,email', function(response) {
                sessionStorage.setItem('emailId', response.email);
                window.location = `${getConfig().hostName}/home.php`;
                //document.getElementById("status").innerHTML = '<p>Welcome '+response.name+'! <a href=login.php?name='+ response.name.replace(" ", "_") +'&email='+ response.email +'>Continue with facebook login</a></p>'
            });
        }
    </script>
</body>

</html>