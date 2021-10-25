<?php

    require_once './db.php';
    //lay du lieu tu form
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    
    
//insert du lieu vao db
    $query = "insert into users
            (id,name,password,email)
    values
            ('','$name','$password','$email')";
            $conn->exec($query);
           

?>   