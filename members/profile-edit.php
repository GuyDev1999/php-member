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
    .img-profile {
        width: 150px;
        height: 150px;
        display: block;
        margin: 0 auto;
    }

    .profile-top {
        margin-top: -100px;
    }

    html {
        height: 100%;
    }

    body {
        min-height: 100%;
        padding: 0;
        margin: 0;
        position: relative;
    }

    body::after {
        content: '';
        display: block;
        height: 100px;
    }

    footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 80px;
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
                <img src="assets/images/<?php echo $_SESSION['image']; ?>" class=" img-profile rounded-circle img-thumbnail"
                    alt="Image Profile">
                <!-- Button trigger modal -->
                <button type="button" class="btn mx-auto d-block my-3 btn-primary" data-toggle="modal"
                    data-target="#exampleModal">
                    เปลี่ยนรูปภาพ
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">อัปโหลดรูปภาพ</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="php/updateImage.php" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="file" id="customFile">
                                        <label class="custom-file-label" for="comtomFile">Choose file...</label>
                                    </div>
                                    <figure class="figure text-center d-none mt-2">
                                        <img id="imgUpload" class="figure-img img-fluid rounded" alt="">
                                    </figure>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <form id="formUpdate" method="POST" action="php/updateMember.php">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="username">ชื่อผู้ใช้งาน</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                        value="<?php echo $row['username']; ?>" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">ชื่อ - นามสกุล</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="<?php echo $row['name']; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">อีเมล</label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        value="<?php echo $row['email']; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone">เบอร์โทรศัพท์</label>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        value="<?php echo $row['phone']; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="address">ที่อยู่</label>
                                <textarea class="form-control" id="address" name="address"
                                    rows="5"><?php echo $row['address']; ?></textarea>
                            </div>

                            <a href="profile.php" class="btn btn-warning float-left">
                                ย้อนกลับ
                            </a>
                            <input type="submit" name="submit" class="btn btn-primary float-right" value="บันทึกข้อมูล">
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
        $('#formUpdate').validate({
            rules: {
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
                address: 'required'
            },
            messages: {
                name: 'โปรดกรอกข้อมูล ชื่อ - นามสกุล',
                email: {
                    required: 'โปรดกรอกข้อมูล Email',
                    email: 'โปรดกรอก Email ให้ถูกต้อง'
                },
                phone: {
                    required: 'โปรดกรอกข้อมูล เบอร์โทรศัพท์',
                    number: 'โปรดกรอกตัวเลขเท่านั้น',
                    maxlength: 'โปรดกรอกตัวเลขไม่เกิน 20 ตัว'
                },
                address: 'โปรดกรอกข้อมูลที่อยู่'
            },

            errorElement: 'div',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback')
                error.insertAfter(element)
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid').removeClass('is-valid')
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).addClass('is-valid').removeClass('is-invalid')
            }
        });
    });

    $('.custom-file-input').on('change', function() {
        var fileName = $(this).val().split('\\').pop() 
        $(this).siblings('.custom-file-label').html(fileName)
        if (this.files[0]) {
            var reader = new FileReader()
            $('.figure').addClass('d-block')
            reader.onload = function(e) {
                $('#imgUpload').attr('src', e.target.result)
            }
            reader.readAsDataURL(this.files[0])
        }
    }) 


    </script>

</body>

</html>