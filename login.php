<?php include_once('includes/navbar.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome5/css/fontawesome-all.css">
    <title>เข้าสู่ระบบ</title>
</head>

<body>

    <div class="container">
        <div class="row ">
            <div class="offset-md-3 col-md-6 mt-5">
                <div class="card">
                    <h5 class="card-header text-center">เข้าสู่ระบบ</h5>
                    <div class="card-body">
                        <form class="form"  id="formLogin" method="post" action="php/checkLogin.php"> 

                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                                </div>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Username">
                            </div>

                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-key"></i></div>
                                </div>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password">
                            </div>
                            
                            <button type="submit" name="submit" id="submit" class="btn btn-primary btn-block mb-2">เข้าสู่ระบบ</button>
                            <span class="float-right">สมัครสมาชิก <a href="register.php">คลิกที่นี่</a></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/jquery-validation/dist/jquery.validate.min.js"></script>

    <script>
        //formLogin
        $(document).ready(function() {
            $('#formLogin').validate({
                rules:{
                    username: {
                        required: true,
                        minlength: 4
                    },
                    password: {
                        required: true,
                        minlength: 4
                    }
                },
                messages:{
                    username: {
                        required: 'โปรดกรอกข้อมูล ชื่อผู้ใช้งาน',
                        minlength: 'โปรดกรอกข้อมูล ไม่น้อยกว่า 4 ตัว'
                    },
                    password:{
                        required: 'โปรดกรอกรหัสผ่าน',
                        minlength: 'รหัสผ่านต้องมีอย่างน้อย 4 ตัว'
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