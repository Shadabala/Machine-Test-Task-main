<?php
function registerUser($conn, $name, $email, $mobile, $rollno, $password)
{
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO students (name, email, mobile, rollno, password) VALUES ('$name', '$email', '$mobile', '$rollno', '$hashedPassword')";

    try {
        $result = $conn->query($query);

        if ($result) {
            $_SESSION['success'] = 'User registered successfully!';
            header('Location: signup.php');
            exit();
        } else {
            throw new Exception("Error executing the query: " . $conn->error);
        }
    } catch (Exception $e) {
        $_SESSION['error'] = 'Error registering user: ' . $e->getMessage();
        header('Location: signup.php');
        exit();
    }
}
?>
