<?php
session_start();
require_once 'config.php';

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    
    $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
    $stmt->bind_param("s", $email); 
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['register_error'] = 'Email is already registered!';
        $_SESSION['active_form'] = 'register';
        header("Location: login.php");
        exit();
    } else {
 
        $insert = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $insert->bind_param("sss", $name, $email, $password);
        
        if ($insert->execute()) {
            $_SESSION['register_success'] = 'Registration successful!';
        }
    }

    header("Location: login.php");
    exit();
}
?>