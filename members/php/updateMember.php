<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Document</title>
</head>
<body>

<?php  
    require_once('connect.php');
    
    //echo '<pre>'; // ทดค่าไว้ดู
    //print_r($_POST);
    //echo '</pre>';

    if (isset($_POST['submit']) && isset($_SESSION['id'])) {
        $sql = "UPDATE members SET 
                name =  '".$_POST['name']."',
                email = '".$_POST['email']."',
                phone = '".$_POST['phone']."',
                address = '".$_POST['address']."'
                WHERE id = '".$_SESSION['id']."' ";
        
        $result = $conn->query($sql);

        if($result) {
            $_SESSION['name'] = $_POST['name'];
            echo "<script>";
            echo  "Swal.fire({
                    icon: 'success',
                    title: 'อัพเดทโปรไฟล์สำเร็จ',
                    showConfirmButton: false,
                    timer: 2500
                }).then((result) => {
                    if (result.isDismissed) {
                    window.location.href = '../profile.php';
                    }
                });";
            echo "</script>";
           
        } else {
            echo "<script>";
                    echo  "Swal.fire({
                                icon: 'error',
                                title: 'มีบางอย่างผิดพลาด'         
                             });";    
                    echo "</script>"; 
                header('Refresh:1; url=../profile.php');
        }
    } else {
        header('location:../index.php');
    }


?>

</body>
</html>



