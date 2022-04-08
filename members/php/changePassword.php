<?php 

    require_once('connect.php');

    if (isset($_POST['submit'])) {
        $oldpassword = $_POST['oldpassword'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];

        if ($password == $repassword) {
            $sql = "SELECT * FROM members WHERE id = '".$_SESSION['id']."' ";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            if (password_verify($oldpassword, $row['password']) ) {
               $hashed_password = password_hash($password, PASSWORD_DEFAULT);
               $sql_pw = "UPDATE `members` SET
                        `password` = '".$hashed_password."'
                        WHERE id = '".$_SESSION['id']."' ";

                $result_pw = $conn->query($sql_pw) or die($conn->error);
                if ($result_pw) {
                    echo '<script> alert("เปลี่ยนรหัสผ่านสำเร็จ") </script>';
                    header('Refresh:0; url=../profile.php');
                }


            } else {
                echo '<script> alert("รหัสผ่านเดิมไม่ถูกต้อง") </script>';
                header('Refresh:0; url=../password.php');
            }

        } else {
            echo '<script> alert("รหัสผ่านใหม่ไม่ตรงกัน") </script>';
            header('Refresh:0; url=../password.php');
        }

    } else {
        header('location:../index.php');
    }


?>