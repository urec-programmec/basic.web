<?php
    session_start();
    require_once 'connect.php';

// isset($_POST['login']) && isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_repeat']) && isset($age = $_POST['age']) && isset($age = $_POST['gender'])
    if(isset($_POST['login'])  && $_POST['login'] !== "" &&
    isset($_POST['password']) && $_POST['password'] !== "") {
        $login = $_POST['login'];
        $pass = $_POST['password'];
      
        $login = htmlspecialchars($login);
        $pass = htmlspecialchars($pass);
        
        $location = "Location: ../profile.php";
        $message = "Hello, ".$login."!" ;
        $errors = array(
            "errors" => 0,
            "warnings" => 0,
            "success" => 1
        );        

        $result_login = $connect->query("SELECT login FROM mysite.users WHERE login = '$login'");
        
        $login_cnt = 0;
        while ($row = $result_login->fetch_row()) {
            $login_cnt += 1;
        }

        $result_password = $connect->query("SELECT passwd FROM mysite.users WHERE passwd = md5('$pass')");
        $pass_cnt = 0;
        while ($row = $result_password->fetch_row()) {
            $pass_cnt += 1;
        }

        if ($login_cnt === 0 || $pass_cnt === 0){
            $message = "Incorrect login or password";
            $location = "Location: ../index.php";
            $errors["errors"] = 1;
            $errors["warnings"] = 0;
            $errors["success"] = 0;
        }
            
        $_SESSION['message'] = $message;
        if ($errors["errors"] == 1)
            $_SESSION['errors'] = 1;    
        if ($errors["warnings"] == 1)
            $_SESSION['warnings'] = 1;    
        if ($errors["success"] == 1)
            $_SESSION['success'] = 1;
        header($location);        
    }
    else {
        $_SESSION['message'] = "Incorrect filling of fields";
        $_SESSION['errors'] = 1;
        header("Location: ../index.php");
    }
?>