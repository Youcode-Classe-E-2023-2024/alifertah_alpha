<?php
if (isset($_POST['email'], $_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Assuming you have a database connection established and stored in $db

    $stmt = $db->prepare("SELECT users_password FROM users WHERE users_email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($hashedPassword);
    $stmt->fetch();
    $stmt->close();

    if ($hashedPassword && password_verify($password, $hashedPassword)) {
        $_SESSION['email'] = $email;
        echo json_encode(array("success" => "Login successful"));
    } else {
        echo json_encode(array("error" => "Invalid email or password"));
    }
    exit();
}
?>
