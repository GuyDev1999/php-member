<?php 
    require_once('php/connect.php');
    if(!isset($_SESSION['id'])) {
        header('location:index.php');
    }
    $sql = "SELECT * FROM `members` WHERE `id` = '".$_SESSION['id']."' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if(!$result->num_rows){
        header('location:index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome5/css/fontawesome-all.css">
    <title>ประวัติส่วนตัว</title>

    <style>
        .img-profile{
            width : 150px;
            height: 150px;
            display: block;
            margin: 0 auto;
        }
        .profile-top{
            margin-top: -100px;
        }

        html{ 
            height:100%; 
        }

        body{ 
            min-height:100%; 
            padding:0; 
            margin:0; 
            position:relative; 
        }

        body::after{ 
            content:''; 
            display:block; 
            height:100px; 
        }

        footer{ 
            position:absolute; 
            bottom:0; 
            width:100%; 
            height:80px; 
        }
    </style>

</head>

<body>
    <?php include_once('includes/navbar.php') ?>

    <section class="jumbotron jumbotron-fluid text-center">
        <div class="container my-5 my-sm-1">
            <h1>ประวัติส่วนตัว</h1>
        </div>
    </section>

    <section class="container my-3">
        <div class="row">
            <div class="col-12 profile-top">
                <img src="assets/images/<?php echo $row['image']; ?>" class="my-3 img-profile rounded-circle img-thumbnail" alt="Image Profile">

                <div class="card">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="username">ชื่อผู้ใช้งาน</label>
                                <input type="text" class="form-control" id="username" value="<?php echo $row['username']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">ชื่อ-สกุล</label>
                                <input type="text" class="form-control" id="name" value="<?php echo $row['name']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">อีเมล</label>
                                <input type="text" class="form-control" id="email" value="<?php echo $row['email']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">เบอร์โทรศัพท์</label>
                                <input type="text" class="form-control" id="phone" value="<?php echo $row['phone']; ?>" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address">ที่อยู่</label>
                            <textarea class="form-control" id="address" rows="5" disabled><?php echo $row['address']; ?></textarea>
                        </div>

                        <a href="profile-edit.php" class="btn btn-dark float-right">แก้ไขข้อมูล</a>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer class=" bg-dark text-center py-3 text-white">
        © Copyright 2021 <br>
        <a href="https://www.facebook.com/SurviverG1999">SurviverG</a>
    </footer>


    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>