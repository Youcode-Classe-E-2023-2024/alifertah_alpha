<?php
// Assuming $db is your database connection object

if (isset($_POST['email'], $_POST['password'], $_POST['username'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash the password
    $username = $_POST['username'];

    // Validate email format
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        // Use prepared statement to prevent SQL injection
        $stmt = $db->prepare("INSERT INTO users (users_email, users_password, users_username) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $email, $hashedPassword, $username);

        if ($stmt->execute()) {
            echo json_encode(array("success" => "User registered successfully"));
        } else {
            echo json_encode(array("error" => "Failed to register user"));
        }
        $stmt->close();
    } else {
        echo json_encode(array("error" => "Please enter a valid email"));
    }
    exit();
}
?>
