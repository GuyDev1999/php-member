<?php
    require_once('connect.php');

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM members WHERE username = ?");
        $stmt->bind_param('s', $username); // s-string, b-blob, i-int
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        
        if(!empty($row)){

            if(password_verify($password, $row['password'])){
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['image'] = $row['image'];
                
                redirect();
                
            } else {
                echo '<script> alert("รหัสผ่านไม่ถูกต้อง") </script>';
                header('Refresh:0; url=../login.php');
            }

        }else {
            echo '<script> alert("ผู้ใช้คนนี้ไม่มีอยู่") </script>';
            header('Refresh:0; url=../login.php');
        }

    } else {
        redirect();
    }

    function redirect(){
        header('location:../index.php');
    }

?>