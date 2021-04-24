<?php
    session_start();

    if (!isset($_SESSION['message']))            
        header("Location: index.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="shortcut icon" href="assets/images/icon.png" type="image/png">        
    
    <title>Profile</title>

    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="assets/js/cookie.js" type="text/javascript"></script>
    <script src="assets/js/index.js"></script>
</head>
<body>   
    <div id="change-theme" class="wrapper-container">
        <p>Dark theme</p>
    </div>

    <div id="message" class="wrapper-container text">
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
            // unset($_SESSION['message']);
            ?>
        </p>
    </div>
    <a class="form links" href="vendor/logout.php">Logout</a>
</body>
</html>