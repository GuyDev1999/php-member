<meta charset="UTF-8">
<?php   
    include_once('../authen.php');

    if (isset($_POST['submit'])) {
        $temp = explode('.',$_FILES['file']['name']);
        $new_name = round(microtime(true)*9999) . '.' . end($temp);
        $url = '../../../assets/images/'. $new_name ;

        if ( move_uploaded_file($_FILES['file']['tmp_name'], $url ) ) {
            $sql = "UPDATE members SET image =  '".$new_name."' WHERE id = '".$_GET['id']."' ";
            $result = $conn->query($sql) or die($conn->error);

            if($result) {
                echo '<script> alert("อัพเดทรูปภาพสำเร็จแล้ว") </script>' ;
                header('Refresh:0; url=form-edit.php?id='.$_GET['id']);
            }

        }


    } else {
        header('location:index.php') ;
    }

?>