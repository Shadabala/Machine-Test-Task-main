<?php
include 'config.php'; 

// $tableName = 'students';
$tableName = 'blogs'; 

$sql = "SHOW TABLES LIKE '$tableName'";
$result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     echo "Table '$tableName' exists in the database.";
// } else {
    // $sql = "CREATE TABLE students (
    //     id INT AUTO_INCREMENT PRIMARY KEY,
    //     name VARCHAR(255) NOT NULL,
    //     email VARCHAR(255) NOT NULL,
    //     mobile VARCHAR(20) NOT NULL,
    //     rollno VARCHAR(20) NOT NULL,
    //     password VARCHAR(255) NOT NULL
    // )";

    
//     if ($conn->query($sql) === TRUE) {
//         echo "Student table created successfully!";
//     } else {
//         echo "Error creating table: " . $conn->error;
//     }
    
//     $conn->close();
// }

if ($result->num_rows > 0) {
    echo "Table '$tableName' exists in the database.";
}else {
    $sql = "CREATE TABLE blogs (
        id INT AUTO_INCREMENT PRIMARY KEY,
        student_id INT NOT NULL,
        title VARCHAR(255) NOT NULL,
        description TEXT NOT NULL,
        image VARCHAR(255) NOT NULL,
        FOREIGN KEY (student_id) REFERENCES students(id)
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Blogs table created successfully!";
        $insertDataSql = "INSERT INTO blogs (student_id, title, description, image) VALUES (1, 'First Blog', 'This is my first blog post.', 'image1.jpg')";

        if ($conn->query($insertDataSql) === TRUE) {
            echo " Sample data inserted successfully!";
        } else {
            echo "Error inserting sample data: " . $conn->error;
        }
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $conn->close();
}


?>
