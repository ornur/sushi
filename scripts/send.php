<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/sushi/config/dbcontroller.php');

//Telegram Bot identifications
$token = "1932997024:AAH9tJG5rUgZ9OZfqNxiiVOhdU8MOih5brk";
$chat_id = "-605345517";

//Data from the order form
$name = $_POST['name'];
$phone = $_POST['phone'];
$adress = $_POST['adress'];
$total_price = 0;
$total_quantity = 0;
$txt = NULL;



//Saving user information from a form in a variable
$txt .= "👤 Имя пользователя: " . $name . "%0A🔢 Телефон: ". $phone . "%0A🏠 Адрес: " . $adress . "%0A%0A";

//Getting data from the cart through a session in a loop
foreach ($_SESSION["cart_item"] as $item) {
	$item_price = $item["quantity"] * $item["price"];
	$total_quantity += $item["quantity"];
	$total_price += ($item["price"] * $item["quantity"]);

	$arr = array(
		'🛒Заказ:' => $item["name"] . ' - ' . $item["quantity"],
		'💲 Цена:' => $item["price"] . "₸",
	);
	foreach ($arr as $key => $value) {
		$txt .= "<b>" . $key . "</b> " . $value . "%0A";
		$db .= $key. $value."<br>";
	};
}
$txt .= "%0A💰 Общая Цена: " .number_format($total_price) . "₸%0A";

mysqli_query($link, "INSERT INTO `ordered`(`id`, `name`, `phone`, `adress`, `orders`) VALUES (NULL,'$name','$phone','$adress','$db')");
//Sending the collected data to Telegram
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}", "r");
if ($sendToTelegram) {
	header('Location: ..sushi/');
} else {
	echo "Error";
}
?>