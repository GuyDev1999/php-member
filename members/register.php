<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome5/css/fontawesome-all.css">
    <title>สมัครสมาชิก</title>
</head>

<body>
    <?php include_once('includes/navbar.php')  ?>
    <div class="container">
        <div class="row ">
            <div class="offset-md-3 col-md-6 mt-5">
                <div class="card">
                    <h5 class="card-header text-center">สมัครสมาชิก</h5>
                    <div class="card-body">
                        <form class="form" id="formRegister" method="post" action="php/createMember.php"> 

                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                                </div>
                                <input type="text" class="form-control" id="name" name="name" placeholder="ชื่อ - นามสกุล">
                            </div>

                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                                </div>
                                <input type="text" class="form-control" id="email" name="email" placeholder="example@email.com">
                            </div>

                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-phone"></i></div>
                                </div>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="เบอร์โทรศัพท์">
                            </div>

                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                                </div>
                                <input type="text" class="form-control" id="username" name="username" placeholder="ชื่อผู้ใช้">
                            </div>

                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-key"></i></div>
                                </div>
                                <input type="password" class="form-control" id="password" name="password" placeholder="รหัสผ่าน">
                            </div>

                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-key"></i></div>
                                </div>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="ยืนยันรหัสผ่าน">
                            </div>
                            
                            <div class="form-group mb-2 mr-sm-2">
                                <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6LecW7cbAAAAADjapzgmxGC9BBPfYqUn4R5rmx9m"></div>
                            </div>

                            <button type="submit" name="submit" id="submit" disabled class="btn btn-primary btn-block mb-2">สมัครสมาชิก</button>
                            <span class="float-right">เข้าสู่ระบบ <a href="login.php">คลิกที่นี่</a></span>
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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    

    <script>
        //formRegister
        $(document).ready(function() {
            $('#formRegister').validate({
                rules:{
                    name: 'required',
                    email: {
                        required: true,
                        email: true
                    },
                    phone: {
                        required: true,
                        number: true,
                        maxlength: 20
                    },
                    username: {
                        required: true,
                        minlength: 4
                    },
                    password: {
                        required: true,
                        minlength: 4
                    },
                    confirm_password: {
                        required: true,
                        minlength: 4,
                        equalTo: '#password'
                    }

                },
                messages:{
                    name: 'โปรดกรอกข้อมูล ชื่อ - นามสกุล',
                    email: {
                        required: 'โปรดกรอกข้อมูล email',
                        email: 'โปรดกรอก email ให้ถูกต้อง'
                    },
                    phone: {
                        required: 'โปรดกรอกข้อมูล เบอร์โทรศัพท์',
                        number: 'โปรดกรอกตัวเลขเท่านั้น ',
                        maxlength: 'โปรดกรอกตัวเลขไม่เกิน 20 ตัว'
                    },
                    username: {
                        required: 'โปรดกรอกข้อมูล ชื่อผู้ใช้งาน',
                        minlength: 'โปรดกรอกข้อมูล ไม่น้อยกว่า 4 ตัว'
                    },
                    password: {
                        required: 'โปรดกรอกข้อมูล รหัสผ่าน',
                        minlength: 'โปรดกรอกข้อมูล ไม่น้อยกว่า 4 ตัว'
                    },
                    confirm_password: {
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

        function recaptchaCallback() {
            $('#submit').removeAttr('disabled');
        }
        
    </script>
</body>

</html>