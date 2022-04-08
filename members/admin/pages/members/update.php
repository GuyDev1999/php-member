<?php include_once('../authen.php') ?>
<?php
    
    if( isset($_POST['submit']) ) {
        $sql = "UPDATE members 
                SET `name` = '".$_POST['name']."',
                    `email` = '".$_POST['email']."',
                    `phone` = '".$_POST['phone']."',
                    `address` = '".$_POST['address']."',
                    `created_at` = '".date("Y-m-d H:i:s")."'
                WHERE `members`.`id` = '".$_POST['id']."' ";
        
        $result = $conn->query($sql);
        if( $result ) {
            echo '<script> alert("Finished Updating!")</script>';
            header('Refresh:0; url=index.php'); 
        }
    }
?>