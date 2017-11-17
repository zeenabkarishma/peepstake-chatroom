<?php
$name     = $_POST['name'];
$email    = $_POST['email'];
$password = $_POST['pass1'];
$aid      = $_POST['aid'];

include_once('config.php');


$result1 = mysqli_query ($conn , "SELECT * FROM aid WHERE customer_id = '".$aid."'");
$rows = mysqli_num_rows($result1);
if($rows > 0 ){
    $result = mysqli_query($conn, "INSERT INTO `ajaxdb`.`user`
            (
             `user_name`,
             `user_email`,
             `user_password`,
             `user_status`,
             `alloted_id`)
VALUES (  
        '$name',
        '$email',
        '$password',
        '0',
        '$aid');");
if ($result) {
    
    header('location: practice.php?registeration_successfull=<span style="color:green">You have successfully registered. You can now login.</span>');
} else {
    echo "failed to";
}
}
else
{
    ?>
    <script>alert("enter valid alloted_id");
    location.href="practice.php";
    </script>
    <?php

}


?>