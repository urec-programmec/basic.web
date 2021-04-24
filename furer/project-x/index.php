<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="shortcut icon" href="assets/images/icon.png" type="image/png">        
    
    <title>Signing in</title>

    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="assets/js/cookie.js" type="text/javascript"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=reCAPTCHA_site_key"></script>
    <script src="assets/js/index.js"></script>
    <script>
        function onSubmit(token) {
            document.getElementById("demo-form").submit();
        }
    </script>  
</head>
<body>

<!-- Форма регистрации -->

    <form action="vendor/signin.php" method="post" class="form">
        <label>Login</label>
        <input type="text" name="login" placeholder="Input your login" class="input">

        <label>Password</label>
        <input type="password" name="password" placeholder="Input your password" class="input" id="password-input">

        <button class="button-send g-recaptcha" 
        data-sitekey="reCAPTCHA_site_key" 
        data-callback='onSubmit' 
        data-action='submit'>Sign in</button>
        <div class="wrapper-container">
            <p class="">Have not an account yet?</p>
            <a href="registration.php" class="links">Sign up</a>
        </div>
    </form>

    <div id="change-theme" class="wrapper-container">
        <p>Dark theme</p>
    </div>

    <div id="message" class="wrapper-container">
            <?php                         
            if (isset($_SESSION['message'])){
                echo '<script> $("#message").css({display:"flex"}); </script>';
                if (isset($_SESSION['errors'])){
                    echo '<script> $("#message").addClass("error"); </script>';    
                    unset($_SESSION['errors']);
                }
                else if (isset($_SESSION['warnings'])){
                    echo '<script> $("#message").addClass("warning"); </script>';    
                    unset($_SESSION['warnings']);
                }
                else if (isset($_SESSION['success'])){
                    echo '<script> $("#message").addClass("success"); </script>';    
                    unset($_SESSION['success']);
                }
            }
            else {
                echo '<script>
                $("#message").css({display:"none"});
                </script>';
            }?>    
            <p> 
            <?php                         
            if (isset($_SESSION['message']))
                echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
        </p>
    </div>    
</body>
</html>