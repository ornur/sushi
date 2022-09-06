<?php
session_start();
require_once ("config/dbcontroller.php");
$db_handle = new DBController();
if (!empty($_GET["action"])){
    //This is the adding food to array
    switch ($_GET["action"]){
        case "add1":
            //Get the quantity that was posted from the form
            if (!empty($_POST["quantity"])){

                //Gets the unique code from the form
                $productByCode = $db_handle->runQuery
                ("SELECT * FROM tbl_roll WHERE code='" . $_GET["code"] . "'");
                $itemArray = array(
                    $productByCode[0]["code"] => array(
                        'name' => $productByCode[0]["name"],
                        'code' => $productByCode[0]["code"],
                        'quantity' => $_POST["quantity"],
                        'price' => $productByCode[0]["price"],
                        'image' => $productByCode[0]["image"],
                        'description' => $productByCode[0]["description"]
                    )
                );
                //New array for storing food data connected with quanity of food
                if (!empty($_SESSION["cart_item"])){
                    if (in_array($productByCode[0]["code"], array_keys($_SESSION["cart_item"]))){
                        foreach ($_SESSION["cart_item"] as $k => $v){
                            if ($productByCode[0]["code"] == $k){
                                if (empty($_SESSION["cart_item"][$k]["quantity"])){
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                        }
                    }
                    else{//Merges two arrays
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                    }
                }
                else{//Сombines two arrays
                    $_SESSION["cart_item"] = $itemArray;
                }
            }
        break;
        case "add2":
            if (!empty($_POST["quantity"]))
            {
                $productByCode = $db_handle->runQuery("SELECT * FROM tbl_sushi WHERE code='" . $_GET["code"] . "'");
                $itemArray = array(
                    $productByCode[0]["code"] => array(
                        'name' => $productByCode[0]["name"],
                        'code' => $productByCode[0]["code"],
                        'quantity' => $_POST["quantity"],
                        'price' => $productByCode[0]["price"],
                        'image' => $productByCode[0]["image"],
                        'description' => $productByCode[0]["description"]
                    )
                );

                if (!empty($_SESSION["cart_item"]))
                {
                    if (in_array($productByCode[0]["code"], array_keys($_SESSION["cart_item"])))
                    {
                        foreach ($_SESSION["cart_item"] as $k => $v)
                        {
                            if ($productByCode[0]["code"] == $k)
                            {
                                if (empty($_SESSION["cart_item"][$k]["quantity"]))
                                {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                        }
                    }
                    else
                    {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                    }
                }
                else
                {
                    $_SESSION["cart_item"] = $itemArray;
                }
            }
        break;
        case "remove":
            if (!empty($_SESSION["cart_item"]))
            {
                foreach ($_SESSION["cart_item"] as $k => $v)
                {
                    if ($_GET["code"] == $k) unset($_SESSION["cart_item"][$k]);
                    if (empty($_SESSION["cart_item"])) unset($_SESSION["cart_item"]);
                }
            }
            break;
        case "empty":
            unset($_SESSION["cart_item"]);
        break;
        }
    }
?>