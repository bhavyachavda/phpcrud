<?php 
include 'connect.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "delete from crud where id = $id";

    $result=mysqli_query($con,$sql);
    if($result){
        // echo "Delete successfull";
        header('location:display.php');
    }else{
        die(mysqli_error($con));
    }
}
?>