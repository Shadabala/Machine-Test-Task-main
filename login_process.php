<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rollno = $_POST["rollno"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    
    if ($password) {
        $query = "SELECT * FROM students WHERE rollno = '$rollno'";
        
        try {
            $result = $conn->query($query);
            
            if ($result) {
                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    if (password_verify($password, $row["password"])) {
                        $_SESSION["student_id"] = $row["id"];
                        $_SESSION["success"] = "Login successful!";
                        header("Location: dashboard.php");
                        exit();
                    } else {
                        $_SESSION["error"] = "Incorrect password. Please use a valid password.";
                    }
                } else {
                    $_SESSION["error"] = "Incorrect student.";
                }
            } else {
                throw new Exception("Error executing the query: " . $conn->error);
            }
        } catch (Exception $e) {
            $_SESSION["error"] = "MySQL Error: " . $e->getMessage();
        }
    } else {
        $_SESSION["error"] = "Passwords do not match.";
    }

    header("Location: login.php");
    exit();
}
?>
