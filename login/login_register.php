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
//melakukan penghijauan github
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $s_SESSION['name']= $user['name'];
            $s_SESSION['email'] = $emai['email'];

            if($user['role'] === 'admin') {
                header("Location ../admin/admin_dashboard.php");
            }
            else {header("location ../main.php");}
        }
        exit();
    }
    $_SESSION['login_error'] = 'Password atau email salah';
    $_SERVER['active_form'] = 'login';
    header("Location ../main.php");
    exit();
}
?>