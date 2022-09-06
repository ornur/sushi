<?php

//Connection database
require_once($_SERVER['DOCUMENT_ROOT'] . '/sushi/config/dbcontroller.php');


//Getting data from form
$id= $_POST["id"];
$name=$_POST["name"];
$description=$_POST["description"];
$price=$_POST["price"];

//Saving path of images
if($_FILES["image"]["name"]==""){
  mysqli_query($link, "UPDATE `tbl_roll` SET `name`='$name', `description`='$description', `price`='$price' WHERE `tbl_roll`.`id` = $id");
}else{
  $path = "images/" . time(). $_FILES["image"]["name"];
  move_uploaded_file($_FILES["image"]["tmp_name"], '../' .$path);
  $image = $path; 

  //Changing data from the table
  mysqli_query($link, "UPDATE `tbl_roll` SET `name`='$name', `description`='$description', `price`='$price', `image`='$image' WHERE `tbl_roll`.`id` = $id");
}

//Back to content page
header("Location:../content.php");

?>