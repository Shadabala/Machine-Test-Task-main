<?php
require_once('config.php');
require_once(ROOT_PATH . '/includes/head_section.php');?>

<body style="background: white;">
<?php include(ROOT_PATH . '/includes/navbar.php');?>
<div class="container mt-3">
<div class="card">
  <div class="card-header"><h1>Create a table (students) and insert data</h1></div>
  <div class="card-body">

  <div class="row">
        <h5><p><mark>Step1</mark> : Create a MySQL database (let's call it school_db): <kbd>CREATE DATABASE school_db;</kbd></p>
    </div>
    <div class="row">
    <h5><p><mark>Step2</mark> : Switch to the created database: <kbd>USE school_db;</kbd></p>
    </div>
    <div class="row">
    <h5><p><mark>Step3</mark> : Create a table (students) for storing student information: <kbd>CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255),
    roll_number VARCHAR(20),
    password VARCHAR(8)
);</kbd></p>
    </div>
    <div class="row">
    <h5><p><mark>Step4</mark> : Insert Dummy Data: <kbd>INSERT INTO students (name, email, roll_number, password) VALUES ('Shadab', 'my.shadabalam@gmail.com', '9807770015', '12345678')";</kbd></p></h5>
    </div>

  </div>
</div>
    

</div>


<?php include(ROOT_PATH . '/includes/footer.php') ?>
</body>
</html>
