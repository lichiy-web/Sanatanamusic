<?
header("Content-type: text/html; charset=utf-8");
error_reporting(-1);

if (!empty($_GET)){
    $current_page = $_GET['page'];
} else {
    $current_page = 1;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="icons/trident.ico">
    <title>Sanatana</title>
<link href="main.css" rel="stylesheet"></head>
<body>
    <!-- Глобальный контейнер главной страницы -->    
    <div class="cont-home clearfix">
        <!-- Вращающиеся при прокрутке мандалы -->
        <div class="mandala"></div>
        <div class="mandala"></div>
        <div class="mandala"></div>
        <div class="mandala"></div>
        <div class="mandala"></div>
        <div class="mandala"></div>
        <!-- Конец блоков с мандалами -->

        <!-- Начало блока с мобильным меню -->
        <div id="mobile-menu">           
            <nav>
                <a id="menu-news" href="">news</a>
                <a id="menu-band" href="">band</a>
                <a id="menu-video" href="">video</a>
                <a id="menu-pictures" href="">pictures</a>
                <a id="menu-events" href="">events</a>
                <a id="menu-about" href="">about</a>
                <a id="menu-shop" href="">shop</a>
                <a id="menu-lyrics" href="">lyrics</a>
                <a id="menu-contacts" href="">contacts</a>
                <span id="menu-close">✖</span>
            </nav>

            <img src="svg/home/trident.svg" alt="">
            <div id="mobile-menu-btn">
                <hr>
                <hr>
                <hr>
            </div>
            <div class="menu-btn-backgr clearfix"></div>
        </div>
        <!-- Конец блока с мобильным меню -->

        <!-- Блок с логотипом -->
        <div class="box-logo">
            <img src="svg/home/sanatana_logo.svg" alt="Sanatana-logo" id="logo">
        </div>

        <!-- Начало блока превью магазина группы -->
        <div id="buy-disk">
            <span>
                <h2>BRAHMA VIDYA</h2>
            </span>
            <span>
                <h3>OUT NOW</h3>
            </span>
            <div class="disks">
                <img src="img/home/disk_1.png" alt="disk1">
                <img src="img/home/disk_2.png" alt="disk2">
            </div>
            <button id="buy-now-btn">BUY NOW</button>
        </div>
        <!-- Начало блока превью магазина группы -->

        <!-- Начало блока превьюшек новостей -->
        <div id="news">
            <h2>NEWS</h2>
            <div id="year-filter" class="clearfix">
                <span id="all-yers">ВСЕ</span>
                <span id="year-0">2019</span>
                <span id="year-1">2018</span>
                <span id="year-2">2017</span>
                <span id="year-3">2016</span>
                <span id="year-4">2015</span>
                <span id="year-5">2014</span>
                <span id="year-6">2013</span>
            </div>

            <!-- Начало контейнера с превьюшками новостей -->
            <div id="newsband-preview" class="clearfix">
                <div id="newsband-col-left"></div>
                <div id="newsband-col-right"></div>

                <section></section>
                <section></section>
                <section></section>
                <section></section>
                <section></section>
                <section></section>
                            
            </div>
            <!-- Конец контейнера с превьюшками новостей -->

            <!-- Начало пагинатора -->
            <div id="news-paginator" data-current_page="<?=$current_page?>">                
                <div id="hexogon-box" class="clearfix">
                    <div class="hexogon"><span></span></div>
                    <div class="hexogon"><span></span></div>
                    <div class="hexogon"><span></span></div>
                    <div class="hexogon"><span></span></div>
                    <div class="hexogon"><span></span></div>
                    <div class="hexogon"><span></span></div>
                    <div class="hexogon mngr-btn" data-btn="1">
                        <span></span>
                    </div>
                    <div class="hexogon"><span></span></div>
                    <div class="hexogon"><span></span></div>
                    <div class="hexogon mngr-btn" data-btn="3">
                        <span></span>
                    </div>
                    <div class="hexogon"><span></span></div>
                    <div class="hexogon"><span></span></div>
                    <div class="hexogon mngr-btn" data-btn="5">
                        <span></span>
                    </div>
                    <div class="hexogon"><span></span></div>
                    <div class="hexogon mngr-btn" data-btn="2">
                        <span></span>
                    </div>
                    <div class="hexogon"><span></span></div>
                    <div class="hexogon"><span></span></div>
                    <div class="hexogon mngr-btn" data-btn="4">
                        <span></span>
                    </div>
                    <div class="hexogon"><span></span></div>
                </div>
            </div>
            <!-- Конец пагинатора -->

        </div>
        <!-- Конец блока превьюшек новостей -->

        <!-- Начало подвала -->
        <footer>
            <div id="form-male-sign">
                <div class="trident">
                    <img src="svg/home/trident.svg" alt="">
                </div>
                <div class="subscribe-text">Подпишитесь <br>
                        на новости и получайте даты
                        концертов, бесплатные билеты и многое другое!
                </div>
                <form action="email-sign">
                    <input id="name" type="text" placeholder="Ваше имя"  required>
                    <input id="email" type="email" placeholder="Ваше email"  required>
                    <input type="submit">
                </form>            
            </div>
            <div id="socnet-sign">
                <div class="subscribe-text">
                    Подпишитесь на нас в соцсетях:
                </div>
                <div id="soc-icons">
                    <a href=""><img src="svg/home/vk.svg" alt="vk"></a>
                    <a href=""><img src="svg/home/fb.svg" alt="facebook"></a>
                    <a href=""><img src="svg/home/twitter.svg" alt="twitter"></a>
                    <a href=""><img src="svg/home/youtube.svg" alt="youtube"></a>
                    <a href=""><img src="svg/home/soundcloud.svg" alt="soundcloud"></a>
                    <a href=""><img src="svg/home/bandcamp.svg" alt="bandcamp"></a>
                </div>
            </div>
            <div class="rights">
                © 2017 Sanatana. All rights reserved
            </div>
        </footer>
        <!-- Конец подвала -->

    </div>
<script type="text/javascript" src="bundle.js"></script></body>
</html>
