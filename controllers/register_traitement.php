<?php
// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
// header("Access-Control-Allow-Headers: *");
// header("Content-Type: application/json");
include("../_config/db.php");
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$db->query("INSERT INTO users (users_email, users_password, users_username)
VALUES($email, $password, $username)");
