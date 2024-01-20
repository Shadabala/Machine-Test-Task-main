<?php require_once('config.php');
require_once( ROOT_PATH . '/includes/public_functions.php');
require_once( ROOT_PATH . '/includes/head_section.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $rollno = $_POST["rollno"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if ($password == $confirm_password) {
        registerUser($conn, $name, $email, $mobile, $rollno, $password);
    } else {
        $_SESSION['error'] = 'Passwords do not match.';
        header('Location: signup.php');
        exit();
    }
} ?>
</head>
<body>
<?php include( ROOT_PATH . '/includes/navbar.php') ?>

<?php if (!empty($_SESSION['error'])) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>Error:</strong> <?php echo $_SESSION['error']; ?>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php elseif (!empty($_SESSION['success'])) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>Success:</strong> <?php echo $_SESSION['success']; ?>
    </div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>


<div class="main-w3layouts wrapper">
    <h1>SignUp Form</h1>
    <div class="main-agileinfo">
        <div class="agileits-top">
            <form action="#" method="post">
                <input class="text" type="text" name="name" placeholder="Name" required="">
                <input class="text" type="email" name="email" placeholder="Email" required="">
                <input class="text" type="text" name="mobile" placeholder="Mobile Number" required="">
                <input class="text" type="text" name="rollno" placeholder="Roll Number" required="">
                <input class="text" type="password" name="password" placeholder="Password" required="">
                <input class="text" type="password" name="confirm_password" placeholder="Confirm Password" required="">
                
                <div class="wthree-text pt-3" style="margin-left:16px">
                    <label class="anim">
                        <input type="checkbox" class="checkbox" required="">
                        <span>I Agree To The Terms & Conditions</span>
                    </label>
                    <div class="clear"> </div>
                </div>
                <input type="submit" value="SIGNUP">
            </form>
            <p>Already have an Account? <a href="login.php"> Login Now!</a></p>
        </div>
    </div>
    <div class="colorlibcopy-agile">
        <p>© 2018 Colorlib Signup Form. All rights reserved | Design by <a href="https://colorlib.com/" target="_blank">Colorlib</a></p>
    </div>
    <!-- //copyright -->
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

<!-- footer -->
<?php include( ROOT_PATH . '/includes/footer.php') ?>