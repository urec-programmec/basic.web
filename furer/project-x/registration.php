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
    
    <title>Signing up</title>    

    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="assets/js/cookie.js" type="text/javascript"></script>
    <script src="assets/js/index.js"></script>
</head>
<body>

<!-- Форма регистрации -->

    <form action="vendor/signup.php" method="post" class="form">
        <label>Login</label>
        <input type="text" name="login" placeholder="Your login" class="input" autocomplete="off">

        <label>Name</label>
        <input type="text" name="name" placeholder="Your name" class="input" autocomplete="off">

        <label>Surname</label>
        <input type="text" name="surname" placeholder="Your surname" class="input" autocomplete="off">

        <label>Email</label>
        <input type="email" name="email" placeholder="Your email" class="input" autocomplete="off">

        <label>Password</label>
        <input type="password" name="password" placeholder="Your password" class="input" id="password" autocomplete="off">

        <label>Password repeat</label>
        <input type="password" name="password_repeat" placeholder="Promise your password" class="input" id="password-repeat" autocomplete="off">

        <label>Age policy</label>         
        <p class="input">
            <select class="form-select" name="age">
                <option value="yes">I'm 18 years old</option>
                <option value="no">I'm less then 18 years old</option>
            </select>
        </p>

        <label>Privacy policy</label>
        <div class="wrapper-container-around input">
            <input type="checkbox" class="checkbox" id="chbox">
            <label for="chbox"></label> 
            <p>I read and agree with <a href="#" class="links-min">privacy policy</a></p>        
        </div>
         
        <label>Gender</label>
        <div class="wrapper-container-left wrapper-container-column input">
            <p><input name="gender" value="male" type="radio" class="radio" id="rdbox1">
            <label for="rdbox1"></label>Male</p>
            <p><input name="gender" value="female" type="radio" class="radio" id="rdbox2">
            <label for="rdbox2"></label>Female</p>
            <p><input name="gender" value="other" type="radio" class="radio" id="rdbox3" checked>
            <label for="rdbox3"></label>Other/privacy</p>
        </div>

        <button class="button-send">Sign up</button>
        <div class="wrapper-container">
            <p class="">Have an account yet?</p>
            <a href="index.php" class="links">Sign in</a>
        </div>
    </form>

    <div id="change-theme" class="wrapper-container">
        <p>Dark theme</p>
    </div>

    <div id="message" class="wrapper-container">
            <?php   
            // unset($_SESSION['message']);
                                          
            if (isset($_SESSION['message'])){
                echo '<script> $("#message").css({display:"flex"}); </script>';
                if (isset($_SESSION['errors'])){
                    echo '<script> $("#message").addClass("error"); </script>';    
                    unset($_SESSION['errors']);
                    unset($_SESSION['warnings']);
                    unset($_SESSION['success']);
                }
                else if (isset($_SESSION['warnings'])){
                    echo '<script> $("#message").addClass("warning"); </script>';    
                    unset($_SESSION['errors']);
                    unset($_SESSION['warnings']);
                    unset($_SESSION['success']);
                }
                else if (isset($_SESSION['success'])){
                    echo '<script> $("#message").addClass("success"); </script>';    
                    unset($_SESSION['errors']);
                    unset($_SESSION['warnings']);
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