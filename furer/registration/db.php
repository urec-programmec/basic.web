<?php   
    $mysqli = new mysqli("127.0.0.1", "root", "pass", "mysite", 3306);
    $result = $mysqli->query("SELECT * FROM users LIMIT 10");
    while ($x = $result->fetch_assoc()){
        echo " id = " . $x['passwd'] . "\n";
    }
?> 