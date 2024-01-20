<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}
require_once('config.php');
function getBlogs($conn, $student_id) {
    $blogs = array();
    $query = "SELECT * FROM blogs WHERE student_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $blogs[] = $row;
    }
    $stmt->close();
    return $blogs;
}

$student_id = $_SESSION["student_id"];
$blogs = getBlogs($conn, $student_id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Averia+Serif+Libre|Noto+Serif|Tangerine" rel="stylesheet">
    <!-- Styling for public area -->
    <link rel="stylesheet" href="static/css/public_styling.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>Dashboard</title>
</head>
<body style="background: white;">

<div class="navbar" style="height: 75px; margin-top: -10px">
    <div class="logo_div">
        <a href="index.php"><img src="static/images/logo-yellow-black.png" height="40" width="220" alt="" title="Eminence Innovation"></a>
    </div>
    <ul>
        <li><a class="active" href="table.php">Create Tables</a></li>
        <li><a class="active" href="blog.php">Blog</a></li>
        <li><a class="active" href="index.php">Logout</a></li>
    </ul>
</div>

<div class="content">
<h2 class="content-title">Your Blog List</h2>
<hr>
<div class="container">
    <div class="row" style="display: contents;">
        <?php
        foreach ($blogs as $post) : ?>
            <div class="col">
                <div class="post">
                    <img src="<?php echo BASE_URL  . $post['image']; ?>" class="rounded-circle mt-3" alt="blog" style="height: 150px; width: 180px; margin-left: 60px">
                    <div class="post_info">
                        <div class="info mt-3 text-primary">
                            <h3><?php echo htmlspecialchars($post['title']); ?></h3>
                        </div>
                            <blockquote class="blockquote">
                                <p><?php echo htmlspecialchars($post['description']); ?></p>
                                <footer class="blockquote-footer">shadab</footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div></div>

<div class="container-fluid">
    <div class="footer" style="margin-bottom: -20px;">
        <div class="row">
            <div class="col-8 text-align-end">
            <p>Shadab Alam -my.shadabalam@gmail.com &copy; <?php echo date('Y'); ?></p>
        </div>
        <div class="col-4">
            +919807770015
        </div>
    </div>
</div>