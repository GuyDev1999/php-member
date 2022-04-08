<?php 
    require_once('connect.php');

    if(isset($_POST['submit'])) {
        $secretKey = "6LecW7cbAAAAADzByZtLoLmzstYAilnK5BZXHVku";
        $responseKey = $_POST['g-recaptcha-response'];
        $remoteIP = $_SERVER['REMOTE_ADDR'];
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$remoteIP";
        $response = json_decode(file_get_contents($url));
        if($response->success){
            $check_sql = "SELECT * FROM members WHERE username = '".$_POST['username']."' ";

            $check_username = $conn->query($check_sql) or die($conn->error);
            
            
            if(!$check_username->num_rows){
                $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $sql_create = "INSERT INTO members ( name, email, phone, username, password, created_at)
                                VALUES ('".$_POST['name']."',
                                        '".$_POST['email']."',
                                        '".$_POST['phone']."',
                                        '".$_POST['username']."',
                                        '".$hashed_password."',
                                        '".date("Y-m-d")."' );";
                
                $result = $conn->query($sql_create) or die($conn->error);

                if ($result) {
                    echo "<script> alert('สมัครสมาชิกสำเร็จ'); </script>";
                    redirect('index');
                }else{
                    "<script> alert('สมัครสมาชิกไม่สำเร็จ โปรดติดต่อผู้ดูแลระบบ'); </script>";
                    redirect('register');
                }
                
            }else{
                echo '<script> alert("ชื่อผู้ใช้นี้ ถูกใช้ไปแล้ว \nโปรดกรอกข้อมูลใหม่อีกครั้ง") </script>';
                redirect('register');
            }
            

        } else {
            echo "<script> alert('Verification Failed!'); </script>";
            redirect('register');
        }

    } else {
        redirect('register');
    }

    function redirect($path) {
        header('Refresh:0; url=../'.$path.'.php');
    }

?>