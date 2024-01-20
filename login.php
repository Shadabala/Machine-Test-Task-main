<?php require_once('config.php') ?>
<?php require_once( ROOT_PATH . '/includes/public_functions.php') ?>
<?php require_once( ROOT_PATH . '/includes/head_section.php') ?>
        <title>LifeBlog | Home </title>
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
        <h1>SignIn Form</h1>
		<div class="main-agileinfo">
        <?php
            if (isset($_SESSION["error"])) {
                echo "<h2><p style='color: red;'>" . $_SESSION["error"] . "</p></h2>";
                unset($_SESSION["error"]);
            }
        ?>
        <div class="agileits-top">
            <form action="login_process.php" method="post">					
                <input class="text" type="text" name="rollno" placeholder="Roll Number" required="">
                <input class="text" type="password" name="password" placeholder="Password" required="">
                <!-- <input class="text" type="password" name="confirm_password" placeholder="Confirm Password" required=""> -->
                <div class="wthree-text pt-3" style="margin-left:16px">
                    <label class="anim">
                        <input type="checkbox" class="checkbox" required="">
                        <span>I Agree To The Terms & Conditions</span>
                    </label>
                    <div class="clear"> </div>
                </div>
                <input type="submit" value="SIGNIN">
            </form>
            <p>Don't have an Account? <a href="signup.php"> Register Now!</a></p>
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

 <!-- footer -->
 <?php include( ROOT_PATH . '/includes/footer.php') ?>