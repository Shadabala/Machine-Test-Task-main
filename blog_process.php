<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $student_id = $_SESSION["student_id"];

    $checkStudentQuery = "SELECT * FROM students WHERE id = $student_id";
    $result = $conn->query($checkStudentQuery);

    if ($result->num_rows == 1) {
        if (isset($_FILES["image"])) {
            $target_dir = "static/images/uploads/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $insertBlogQuery = $conn->prepare("INSERT INTO blogs (student_id, title, description, image) VALUES (?, ?, ?, ?)");
                $insertBlogQuery->bind_param("isss", $student_id, $title, $description, $target_file);
                
                if ($insertBlogQuery->execute()) {
                    header("Location: dashboard.php?success=1");
                    exit();
                } else {
                    echo "Error: " . $conn->error;
                }
            } else {
                echo "Error uploading image.";
            }
        } else {
            echo "Error: Image not found.";
        }
    } else {
        echo "Error: Student does not exist.";
    }
}
?>
