<?php require_once('config.php') ?>
<?php require_once( ROOT_PATH . '/includes/public_functions.php') ?>

<?php require_once( ROOT_PATH . '/includes/head_section.php') ?>
        <title>LifeBlog | Home </title>
</head>
<body>
<div class="navbar">
    <div class="logo_div">
        <a href="index.php"><img src="static/images/logo-yellow-black.png" height="40" width="220" alt="" title="Eminence Innovation"></a>
    </div>
    <ul>
        <li><a class="active" href="blog.php">Blog</a></li>
        <li><a class="active" href="index.php">Logout</a></li>
    </ul>
</div>

<div class="main-w3layouts wrapper">
    <h1>SignUp Form</h1>
    <div class="main-agileinfo">
        <div class="agileits-top">
            <form action="blog_process.php" method="post" enctype="multipart/form-data">
                <input class="text" type="text" name="title" placeholder="Blog Title" required="">
                <input class="text" type="text" name="description" placeholder="Blog Description" required="">
                <input type="file" name="image" class="text" accept=".jpg" style="width:400px; ">

                <input type="submit" value="Post Blog!">
            </form>
        </div>
    </div>
    <ul class="colorlib-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>

<?php include( ROOT_PATH . '/includes/footer.php') ?>