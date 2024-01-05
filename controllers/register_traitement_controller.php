<?php
if(isset($_POST['email'])){

    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = $_POST['username'];
    
    $db->query("INSERT INTO users
    (users_email, users_password, users_username)
    VALUES
    ('$email', '$password', '$username')
    ");
}
exit();