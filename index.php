<?php
require_once('config.php');
require_once(ROOT_PATH . '/includes/head_section.php');

function getBlogs($conn)
{
    $blogs = array();
    $query = "SELECT blogs.*, students.name AS student_name FROM blogs INNER JOIN students ON blogs.student_id = students.id";

    try {
        $result = $conn->query($query);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $blogs[] = $row;
            }
        } else {
            // Handle the exception (display a message, log the error, etc.)
            throw new Exception("Error executing the query: " . $conn->error);
        }
    } catch (Exception $e) {
        // Handle the exception (display a message, log the error, etc.)
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Error:</strong> <?php echo $e->getMessage(); ?> . Please create Table.
        </div>
        <?php
        $blogs = array(); // Set an empty array to avoid issues with the foreach loop
    }

    return $blogs;
}
?>

<body style="background: white;">
    <?php include(ROOT_PATH . '/includes/navbar.php');
    $blogs = getBlogs($conn);?>
    <div class="content">
        <h2 class="content-title">Recent Articles</h2>
        <hr>
        <div class="container">
            <div class="row">
                <?php
                foreach ($blogs as $post) : ?>
                    <div class="col mb-4">
                        <div class="post">
                            <img src="<?php echo BASE_URL  . $post['image']; ?>" class="rounded-circle mt-3" alt="blog" style="height: 150px; width: 180px; margin-left: 60px">
                            <div class="post_info">
                                <div class="info mt-3 text-primary">
                                    <h3><?php echo htmlspecialchars($post['title']); ?></h3>
                                </div>
                                <blockquote class="blockquote">
                                    <p><?php echo htmlspecialchars($post['description']); ?></p>
                                    <footer class="blockquote-footer"><?php echo htmlspecialchars($post['student_name']); ?></footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>

    <?php include(ROOT_PATH . '/includes/footer.php') ?>
</body>
</html>
