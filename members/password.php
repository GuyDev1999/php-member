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
    <title>เปลี่ยนรหัสผ่าน</title>

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
            <h1>เปลี่ยนรหัสผ่าน</h1>
        </div>
    </section>

    <section class="container my-3">
        <div class="row justify-content-center">
            <div class="col-6 profile-top">
                <img src="assets/images/<?php echo $row['image']; ?>" class="my-3 img-profile rounded-circle img-thumbnail" alt="Image Profile">

                <div class="card">
                    <div class="card-body">
                        <form action="php/changePassword.php" method="post" id="fromPassword">
                            <div class="from-group col-md-12">
                                <label for="oldpassword">รหัสผ่านเดิม</label>
                                <input type="password" class="form-control" name="oldpassword" id="oldpassword">
                            </div>
                            <div class="from-group col-md-12">
                                <label for="password">รหัสผ่านใหม่</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                            <div class="from-group col-md-12">
                                <label for="repassword">ยืนยันรหัสผ่านใหม่</label>
                                <input type="password" class="form-control" name="repassword" id="repassword">
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary btn-block mt-3" value="บันทึกข้อมูล">
                        </form>
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
    <script src="node_modules/jquery-validation/dist/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#fromPassword').validate({
                rules:{
                    oldpassword: {
                        required: true,
                        minlength: 4
                    },
                    password: {
                        required: true,
                        minlength: 4
                    },
                    repassword: {
                        required: true,
                        minlength: 4,
                        equalTo: '#password'
                    }

                },
                messages:{
                    oldpassword: {
                        required: 'โปรดกรอกข้อมูล รหัสผ่าน',
                        minlength: 'โปรดกรอกข้อมูล ไม่น้อยกว่า 4 ตัว'
                    },
                    password: {
                        required: 'โปรดกรอกข้อมูล รหัสผ่าน',
                        minlength: 'โปรดกรอกข้อมูล ไม่น้อยกว่า 4 ตัว'
                    },
                    repassword: {
                        required: 'โปรดกรอกข้อมูล รหัสผ่าน',
                        minlength: 'โปรดกรอกข้อมูล ไม่น้อยกว่า 4 ตัว',
                        equalTo: 'โปรดกรอกข้อมูลรหัสผ่านให้ตรงกัน'
                    }
                },
                errorElement: 'div',
                errorPlacement: function(error, element) {
                    error.addClass( 'invalid-feedback' )
                    error.insertAfter(element)
                },
                highlight: function (element, errorClass, validClass) {
                    $( element ).addClass( 'is-invalid' ).removeClass( 'is-valid' )
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).addClass( 'is-valid' ).removeClass( 'is-invalid' )
                }
            });
        })
    </script>

</body>
</html>