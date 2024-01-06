<?php
if (isset($_POST["send"])) {
    $email = $_POST["email"];
    $token = bin2hex(random_bytes(32));
    $reset_link = "http://localhost/alifertah_alphaa/index.php?page=reset_password&email=$email&token=$token";
    $result = $db->query("SELECT users_email FROM users WHERE users_email = '$email'");
    if($result->num_rows){
        echo "Password Reset , Click the following link to reset your password: . $reset_link ";
    } 
    
}
?>
