<?php
    session_start();
    require_once 'connect.php';

// isset($_POST['login']) && isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_repeat']) && isset($age = $_POST['age']) && isset($age = $_POST['gender'])
    if(isset($_POST['login'])  && $_POST['login'] !== "" &&
    isset($_POST['name']) && $_POST['name'] !== "" &&
    isset($_POST['surname']) && $_POST['surname'] !== "" &&
    isset($_POST['email']) && $_POST['email'] !== "" &&
    isset($_POST['password']) && $_POST['password'] !== "" &&
    isset($_POST['password_repeat']) && $_POST['password_repeat'] !== "" &&
    isset($_POST['age']) && $_POST['age'] !== "" &&
    isset($_POST['gender']) && $_POST['gender'] !== "") {
        $login = $_POST['login'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $pass_repeat = $_POST['password_repeat'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
    
    
        if ($pass === $pass_repeat){
            $login = htmlspecialchars($login);
            $name = htmlspecialchars($name);
            $surname = htmlspecialchars($surname);
            $email = htmlspecialchars($email);
            $pass = htmlspecialchars($pass);
            $pass_repeat = htmlspecialchars($pass_repeat);
            $age = htmlspecialchars($age);
            $gender = htmlspecialchars($gender);
            

            $location = "Location: ../index.php";
            $message = "Register succesfuly";
            $errors = array(
                "errors" => 0,
                "warnings" => 0,
                "success" => 1
            );

            if (strlen($login) < 2 || strlen($login) > 100){
                $message = "Login is too long";
                $location = "Location: ../registration.php";
                $errors["errors"] = 1;
                $errors["warnings"] = 0;
                $errors["success"] = 0;
            }

            $result = $connect->query("SELECT login FROM mysite.users WHERE login = '$login'");
            $login_cnt = 0;
            while ($row = $result->fetch_row()) {
                $login_cnt += 1;
            }

            if ($errors["success"] == 1 && $login_cnt !== 0){
                $message = "This login is already exist";
                $location = "Location: ../registration.php";
                $errors["errors"] = 1;
                $errors["warnings"] = 0;
                $errors["success"] = 0;
            }

            if ($errors["success"] == 1 && !filter_var($email, FILTER_VALIDATE_EMAIL)){
                $message = "Email is not valid";
                $location = "Location: ../registration.php";
                $errors["errors"] = 1;
                $errors["warnings"] = 0;
                $errors["success"] = 0;
            }


            if ($errors["errors"] == 1)
                $_SESSION['errors'] = 1;    
            if ($errors["warnings"] == 1)
                $_SESSION['warnings'] = 1;    
            if ($errors["success"] == 1){
                $result = $connect->query("INSERT INTO mysite.users (email, login, passwd, firstname, lastname, sex, age) values ('$email', '$login', md5('$pass'), '$name', '$surname', '$gender', '$age')");
                
                if ($result)
                    $_SESSION['success'] = 1;                                            
                else { 
                    $_SESSION['errors'] = 1;                            
                    $message = "Internal error";
                    $location = "Location: ../registration.php";                    
                }
            }
                
            $_SESSION['message'] = $message;
            header($location);
        }
        else {
            $_SESSION['message'] = "Password mismatch";
            $_SESSION['errors'] = 1;
            header("Location: ../registration.php");
        }
    }
    else {
        $_SESSION['message'] = "Incorrect filling of fields";
        $_SESSION['errors'] = 1;
        header("Location: ../registration.php");
    }
?>