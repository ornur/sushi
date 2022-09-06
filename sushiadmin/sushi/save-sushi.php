<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/sushi/config/dbcontroller.php');


$id= $_POST["id"];
$name=$_POST["name"];
$description=$_POST["description"];
$price=$_POST["price"];

if($_FILES["image"]["name"]==""){
    mysqli_query($link, "UPDATE `tbl_sushi` SET `name`='$name', `description`='$description', `price`='$price' WHERE `tbl_sushi`.`id` = $id");
}else{
    $path = "images/" . time(). $_FILES["image"]["name"];
    move_uploaded_file($_FILES["image"]["tmp_name"], '../' .$path);
    $image = $path; 

    mysqli_query($link, "UPDATE `tbl_sushi` SET `name`='$name', `description`='$description', `price`='$price', `image`='$image' WHERE `tbl_sushi`.`id` = $id");
}



header("Location:../content.php");

?>