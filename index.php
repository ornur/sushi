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
<HTML>

<HEAD>
	<meta charset="UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-2020.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" >
	<link rel="stylesheet" href="assets/css/sitestyle.css" type="text/css"  />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script type="text/javascript">
    //The function stops updating after posting 
    $(function(){
        $('#formsender').submit(function(){
            var form = $(this);
            $.ajax({
                    type: "POST",
                    url: "scripts/send.php",
                    data: form.serialize(),
                    //The loading section is activated
                    beforeSend: (function(){ 
                        $('#submit').css("display","none");
                        $("#waiting").css("display","block");
                    }),
                    //If there are errors, an error is displayed
                    error: function(XMLHttpRequest, textStatus, errorThrown){
                        $('.error-data').slideDown();
                    },
                    //If everything is in order, a success message will be displayed
                    success: setTimeout(function() { 
                        $("#waiting").css("display","none");
                        $('#successtxt').css("display","block");
                },4000),
            })
            return false;
        })
    })
    </script>
	<TITLE>Sushi Bar</TITLE>
</HEAD>

<BODY class="w3-yellow w3-opensans">
<header class="w3-container w3-top w3-2020-flame-scarlet">
    <div class="w3-hide-small">
        <a href="#" title="SUSHI BAR"><img src="logos/logo.png" height="63" alt="SUSHI BAR" /></a>
        <a href="#roll" class="w3-bar-item w3-hover-yellow w3-mobile w3-button w3-tag w3-2020-flame-scarlet"><span><b>Роллы </b></span></a>
        <a href="#sushi" class="w3-bar-item w3-hover-yellow w3-mobile w3-button w3-tag w3-2020-flame-scarlet"><span><b>Суши</b></span></a>
        <div class="w3-right w3-margin-right">
            <b>🕘10:00-00:00</b>
            <a class="w3-bar-item w3-button w3-mobile" onclick="location.href='home.php'" title="Домой"><img src="https://img.icons8.com/material-rounded/50/000000/home.png"/></a>
            <a class="w3-bar-item w3-button w3-mobile" onclick="location.href='/sushi/registration/login.php'" title="Пользователь"><img src="https://img.icons8.com/material-outlined/48/000000/user--v1.png"/></a>
            <a class="w3-bar-item w3-button w3-mobile" href="#korzina" title="Корзина"><img src="https://img.icons8.com/material-outlined/48/000000/fast-cart.png"/></a>
            <a class="w3-bar-item w3-button w3-mobile" href="tel:+7-702-567-7726"><img src="https://img.icons8.com/windows/45/000000/phone.png"/></a>
        </div>
    </div>
    <div class="w3-bar-block w3-hide-large w3-hide-medium">
        <a href="#" title="SUSHI BAR"><img src="logos/logo.png" height="50" alt="SUSHI BAR" /></a>
        <a href="#roll" class="w3-hover-yellow w3-button w3-tag w3-2020-flame-scarlet"><span><b>Роллы </b></span></a>
        <a href="#sushi" class="w3-hover-yellow w3-button w3-tag w3-2020-flame-scarlet"><span><b>Суши</b></span></a>
        <div class="w3-center">
            <a class="w3-button" onclick="location.href='home.php'" title="Домой"><img src="https://img.icons8.com/material-rounded/30/000000/home.png"/></a>
            <a class="w3-button" onclick="location.href='/sushi/registration/login.php'" title="Пользователь"><img src="https://img.icons8.com/material-outlined/30/000000/user--v1.png"/></a>
            <a class="w3-button" href="#korzina" title="Корзина"><img src="https://img.icons8.com/material-outlined/30/000000/fast-cart.png"/></a>
            <a class="w3-button" href="tel:+7-702-567-7726"><img src="https://img.icons8.com/windows/32/000000/phone.png"/></a>
    
        </div>
    </div>
</header>
<main class="w3-padding-48 w3-margin w3-yellow">
    <div class="w3-container" id = "roll">
        <h1><b>Роллы</b></h1>
        <?php $product_array = $db_handle->runQuery("SELECT * FROM tbl_roll ORDER BY id ASC");
        //Getting from database and record in array
        if (!empty($product_array)){
            //Giving variables 
            foreach ($product_array as $key => $value){ ?>
            <div class="w3-row w3-quarter w3-content w3-hover-shadow">
                <!-- After posting the link, the product code is given-->
                <form class="w3-sand w3-card-4 formproduct" method="post"
                action="?action=add1&code=<?php echo $product_array[$key]["code"]; ?>#korzina">
                    <!-- Image of product -->
                    <div class="w3-image"><img src="<?php echo $product_array[$key]["image"]; ?>"
                    class="w3-round-xxlarge" style="width:100%"></div>
                    <div class="w3-center">
                        <!-- Name of product -->
                        <div class="w3-xlarge ">
                            <b><?php echo $product_array[$key]["name"]; ?></b>
                        </div>
                        <!-- Description of product -->
                        <div class="w3-cell-middle w3-small w3-margin" style="height:5%">
                            <?php echo $product_array[$key]["description"]; ?>
                        </div>
                        <!-- Price of product -->
                        <div class="w3-large">
                            <?php echo $product_array[$key]["price"] . "₸"; ?>
                        </div>
                        <!-- Quantity of product and submit button -->
                        <div class="w3-center">
                            <fieldset data-quantity><legend>Change quantity</legend></fieldset>
                            <button type="submit" class="cart-button w3-margin w3-animate-fading">
                                <span>Добавить</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        <?php }} ?>
    </div>
    <div class="w3-container" id="sushi">
    <h1><b>Суши</b></h1>
    <?php $product_array = $db_handle->runQuery("SELECT * FROM tbl_sushi ORDER BY id ASC");
    if (!empty($product_array))
    {
        foreach ($product_array as $key => $value)
        { ?>
		<div class="w3-row w3-quarter w3-content w3-hover-shadow">
			<form class="w3-sand w3-card-4 formproduct" method="post" action="?action=add2&code=<?php echo $product_array[$key]["code"]; ?>#korzina">
            <input type="hidden" name="action" value="submit" />
				<div class="w3-image"><img src="<?php echo $product_array[$key]["image"]; ?>" class="w3-round-xxlarge" style="width:100%"></div>
				<div class="w3-center">
					<div class="w3-xlarge "><b><?php echo $product_array[$key]["name"]; ?></b></div>
					<div class="w3-cell-middle w3-small w3-margin" style="height:5%"><?php echo $product_array[$key]["description"]; ?></div>
					<div class="w3-large"><?php echo $product_array[$key]["price"] . "₸"; ?></div>
					<div class="w3-center"><fieldset data-quantity><legend>Change quantity</legend></fieldset>
                        <button type="submit" class="cart-button w3-margin w3-animate-fading"><span>Добавить</span></button>
                    </div>
				</div>
            </form>
        </div>
	    <?php
        }
    } ?>
    </div>
</main>
<footer>
    <div id="korzina" class="w3-container w3-margin s1">
        <!-- Getting data from array -->
        <?php if (isset($_SESSION["cart_item"])){
            $total_quantity = 0;
            $total_price = 0; ?>
        <!-- Link to clean the cart -->
        <a href="?action=empty"
        class="w3-right w3-button w3-2020-flame-scarlet w3-hover-yellow w3-round-large">
        Очистить корзину
        </a><br><br>
        <!-- Shopping cart table -->
        <table class="w3-border w3-mobile" cellpadding="10" cellspacing="1">
            <tbody>
                <tr class="w3-2020-flame-scarlet">
                    <th class="w3-left-align" width="25%">Имя</th>
                    <th class="w3-right-align" width="10%">Количества</th>
                    <th class="w3-right-align" width="25%">Количества Цена</th>
                    <th class="w3-right-align" width="20%">Цена</th>
                    <th class="w3-center" width="15%">Удалить</th>
                </tr>
                <!-- Loop for these products in a row -->
                <?php foreach ($_SESSION["cart_item"] as $item){
                    $item_price = $item["quantity"] * $item["price"]; ?>
                <tr>
                    <td><img src="<?php echo $item["image"]; ?>" 
                    style="width:30%" class="w3-image w3-round-xxlarge " />
                    <b><?php echo $item["name"]; ?></b></td>

                    <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                    <td style="text-align:right;"><?php echo $item["price"] . "₸"; ?></td>
                    <td style="text-align:right;">
                        <?php echo number_format($item_price, 0) . "₸"; ?>
                    </td>
                    <td style="text-align:center;">
                        <a href="?action=remove&code=<?php echo $item["code"]; ?>">
                            <img src="https://img.icons8.com/ios-glyphs/30/000000/trash--v3.png"/>
                        </a></td>
                </tr>
                <!-- Calculation of product prices -->
                <?php $total_quantity += $item["quantity"];
                    $total_price += ($item["price"] * $item["quantity"]);
                } ?>
                <tr class="w3-2020-flame-scarlet">
                    <td align="left">Общая цена:</td>
                    <td align="right"><?php echo $total_quantity; ?></td>
                    <td align="right" colspan="3">
                        <strong><?php echo number_format($total_price) . "₸"; ?></strong>
                    </td>
                </tr>
            </tbody>
        </table><br>
        <!-- Button to open the order form -->
        <button onclick="document.getElementById('zakaz').style.display='block'"
        class="w3-right w3-button w3-green w3-xlarge w3-round-large">
            Заказать
        </button>
        <?php }else{ ?>
        <!-- Showing that the cart is empty -->
        <div style="font-size: 40px;" class="w3-animate-fading w3-panel w3-center">
            Ваша корзина пуста
        </div> 
        <?php } ?>
    </div>
        
    <div id="zakaz" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
            <div id= "submit">
                <div class="w3-center"><br>
                    <span onclick="document.getElementById('zakaz').style.display='none'" class="w3-button w3-hover-red w3-xlarge w3-transparent w3-display-topright" title="Закрыть">×</span>
                    <img src="logos/icons8-in-transit.gif" style="width:30%">
                </div>
                <form action="../sushi/scripts/send.php" id="formsender"  class="w3-container" method="POST">
                    <div class="w3-section">
                        <label><b>Ваше имя</b></label>
                        <input name="name" type="text" placeholder="Только русскими буквами" class="w3-input w3-border w3-margin-bottom" pattern="^[А-Яа-яЁё\s]+$" required>
                        <label><b>Номер телефона</b></label>
                        <input name="phone" type="tel" placeholder="7ХХХХХХХХХХ" class="w3-input w3-border w3-margin-bottom" pattern="7[0-9]{3,3}[0-9]{3,3}[0-9]{4,4}" required>
                        <label><b>Ваш адрес</b></label>
                        <input name="adress" type="text" placeholder="Введите вашу адрес доставки" class="w3-input w3-border w3-margin-bottom" pattern="[А-Яа-яЁё\s0-9]+" required>
                        
                        <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Заказать</button>
                    </div>
                    
                </form>
            </div>
            <div class="w3-center" style="width:100%;height:80%;display:none;" id = "waiting">
                <img src="/sushi/logos/loading.gif" style="width:100%;height:100%" frameborder=0/>
            </div>
            <div id= "successtxt" class="w3-animate-zoom w3-2020-flame-scarlet w3-panel w3-xxlarge" style="display:none;">
                <span onclick="document.getElementById('zakaz').style.display='none';" class="w3-button w3-hover-red w3-large w3-transparent w3-display-topright" title="Закрыть">×</span>
                <span class="w3-center "><h1 style="text-shadow:2px 2px 0 #444">Успешно отправлен заказ.<br> Вам позвонить наш оператор.</h1></span>
            </div>
        </div>
    </div>
</footer>
<div class="w3-black w3-center w3-mobile">
    <p class="w3-panel w3-small">
	    Сеть ресторана Sushi Bar предлагает качественные суши и другие блюда японской кухни по доступным ценам в теплой и дружелюбной обстановке.<br> Что отличает Sushi Bar от других, так это индивидуальный подход к подаче свежеприготовленных суши на заказ, чтобы клиенты могли выбрать их и насладиться.
    </p>
    <div class="w3-large">Подпишитесь на нас в<br>
        <a href="https://vk.com/bizdenagizsushibar/" target="_blank">
          <img src="https://img.icons8.com/material-outlined/38/ffffff/instagram-new--v1.png"/>
        </a>
        <a href="https://www.instagram.com/sushi.kentau/" target="_blank">
          <img src="https://img.icons8.com/ios-glyphs/40/ffffff/vk-circled.png"/>
        </a>
    </div>
    <div class="copyright">&copy; Sushi Bar 2021. Все права защищены. </div>
</div>
</BODY>
<script type="module">
    //Importing Javascript from other file
    import QuantityInput from './scripts/quantity.js';
    //The function responsible for the quantity animation
    (function(){
        let quantities = document.querySelectorAll('[data-quantity]');
        if (quantities instanceof Node) quantities = [quantities];
        if (quantities instanceof NodeList) quantities = [].slice.call(quantities);
        if (quantities instanceof Array) {
            quantities.forEach(div => (div.quantity = new QuantityInput(div, 'Down', 'Up')));
        }
    })();
    //Constat data
    const cartButtons = document.querySelectorAll('.cart-button');
        cartButtons.forEach(button => {
            button.addEventListener('click', cartClick);
    });
    //Function after clicking
    function cartClick() {
        let button = this;
        button.
        classList.add('clicked');
    }
</script>
</HTML>
