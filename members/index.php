<?php 
    session_start(); 
    include_once('includes/navbar.php') 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome5/css/fontawesome-all.css">
    <title>หน้าหลัก</title>
    
    
</head>
<body>
    
    
    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <h1 class="display-4">ยินดีต้อนรับ</h1>
            <p class="lead">การฝึกเขียนเว็บไซต์ของ SurviverG ครับ</p>
        </div>
    </div>

    <section class="container py-5">
        <div class="row">
            <div class="col-12">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/CuklIb9d3fI" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>

    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <h1 class="display-4">ให้คำวิจารณ์พิจารณาด้วยครับ</h1>
            <p class="lead">การฝึกเขียนเว็บไซต์ของ SurviverG ครับ</p>
        </div>
    </div>

    <footer class="card bg-dark text-center py-3 text-white">
        © Copyright 2021 <a href="https://www.facebook.com/SurviverG1999" target="_blank">SurviverG</a>
    </footer>


    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>