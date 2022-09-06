<HTML>

<HEAD>
	<meta charset="UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-2020.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<TITLE>Sushi Bar</TITLE>
    <style>
        html{scroll-behavior: smooth;}
        body {font-family:"Times New Roman", serif}
        h1,h2,h3,h4,h5,h6 {font-family:serif; letter-spacing:5px}
    </style>
</HEAD>

<BODY class="w3-white w3-monospace">
	<header class="w3-top w3-bar w3-wide w3-card w3-2020-flame-scarlet w3-tag">
        <div class="w3-hide-small">    
            <a href="#" class="w3-left"><img src="logos/logo.png" height="72" alt="SUSHI BAR" /></a>
            <a href="#" class="w3-bar-item w3-left w3-wide w3-button w3-hover-yellow" style="font-size: 35px;"><b>Sýshı Bar Kafesi</b></a>
            <div class="w3-bar-item w3-wide w3-2020-flame-scarlet w3-right" style="font-size: 25px;">
                <a href="#about" class="w3-hover-yellow w3-button"><span>О нас</span></a>
                <a href="index.php" class="w3-hover-yellow w3-button"><span>Меню</span></a>
                <a href="#contact" class="w3-hover-yellow w3-button"><span>Контакты</span></a>
            </div>
        </div>
        <div class="w3-hide-large w3-hide-medium">    
            <a href="#" class="w3-left"><img src="logos/logo.png" height="50" alt="SUSHI BAR" /></a>
            <a href="#" class="w3-bar-item w3-left w3-wide w3-button w3-hover-yellow" style="font-size: 20px;"><b>Sýshı Bar Kafesi</b></a>
            <div class="w3-bar-item w3-wide w3-2020-flame-scarlet w3-right" style="font-size: 15px;">
                <a href="#about" class="w3-hover-yellow w3-button"><span>О нас</span></a>
                <a href="index.php" class="w3-hover-yellow w3-button"><span>Меню</span></a>
                <a href="#contact" class="w3-hover-yellow w3-button"><span>Контакты</span></a>
            </div>
        </div>
	</header>
    <img class="w3-image" src="https://sxodim.com/uploads/shymkent/2017/11/optimized/oriental-food-fish-preparation_1522x570-q-85.jpg" style="margin-top:70px;"/>
    <main class="w3-white w3-container">
        <!-- About -->
        <div id="about" class="w3-padding-top-64">
            <div class="w3-row">
                <div class="w3-half w3-padding-large w3-hide-small">
                    <img src="https://i0.wp.com/post.healthline.com/wp-content/uploads/2021/09/sushi-sashimi-1296x728-header.jpg?w=1155&h=1528" class="w3-round w3-image w3-opacity-min" style="width:100%">
                </div>
                <div class="w3-half w3-padding-large">
                    <h1 class="w3-center">О кафе</h1><br>
                    <h5 class="w3-center">Работаем с 🕘10:00-00:00</h5>
                    <p class="w3-large">
                    Мы относимся к нашим блюдам тщательно , и поэтому используем правильную рецептуру и продукты, заказывая из лучших фабрик Казахстана!</p>
                    <p class="w3-large w3-text-grey w3-hide-medium">
                    Мы стараемся для вас, наши дорогие друзья! Следите за новостями. Мы готовим для вас много интересного.</p>
                </div>
            </div>
        </div>
        <!-- Contact -->
        <div id="contact" class="w3-container w3-padding-64">
            <h1>Контакты</h1>
            <p class="w3-text-blue-grey w3-large">
                <b>Суши Бар, просп. Кунаева 37, 160400 город Кентау </b></p>
            <p>Вы также можете связаться с нами по телефону 8 702 567 7726 и вы можете оставить нам отзыв:</p>
            <form action="review.php" method="POST">
                <p><input class="w3-input w3-padding-16" name="name" type="text" placeholder="Имя" required></p>
                <p><input class="w3-input w3-padding-16" name="email" type="email" placeholder="Почта" required></p>
                <p><input class="w3-input w3-padding-16" name="date" type="datetime-local" placeholder="Date and time" required value="2022-01-01T12:00"></p>
                <p><input class="w3-input w3-padding-32" name="message" type="text" placeholder="Сообщение" required></p>
                <p><button class="w3-button w3-2020-flame-scarlet w3-section w3-hover-yellow" type="submit">Отправить сообщение</button></p>
            </form>
            </div>  
        </div>
    </main>
<footer class="w3-black w3-center w3-mobile">
    <p class="w3-panel w3-small">
        Сеть ресторана Sushi Bar предлагает качественные суши и другие блюда японской кухни по доступным ценам в теплой и дружелюбной обстановке.<br> Что отличает Sushi Bar от других, так это индивидуальный подход к подаче свежеприготовленных суши на заказ, чтобы клиенты могли выбрать их и насладиться.
    </p>
    <div class="w3-large">Подпишитесь на нас в<br>
        <a href="https://vk.com/bizdenagizsushibar/" target="_blank">
        <img src="https://img.icons8.com/material-outlined/38/ffffff/instagram-new--v1.png" height="7%"/>
        </a>
        <a href="https://www.instagram.com/sushi.kentau/" target="_blank">
        <img src="https://img.icons8.com/ios-glyphs/40/ffffff/vk-circled.png" height="7%"/>
        </a>
    </div>
    <div class="copyright">&copy; Sushi Bar 2021. Все права защищены. </div>
</footer>
</BODY>
</HTML>