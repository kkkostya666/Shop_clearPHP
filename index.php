<?php
include_once "templates/headers.php";
?>
            <div class="bg-white">
                <div class="header">
                    <div class="wrapper">
                        <div class="header-top">
                            <div class="logo"><span class="logo-image"></span><span>KostyaStore</span></div>
                            <div class="header-info">
                                <form action="login.php" method="get">
                                    <button type="submit">Авторизация</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="wrapper">
                        <div class="header-bottom">
                            <ul class="nav">
                                <li><a href="sort/old_phone.php">Б/У Iphone</a></li>
                                <li><a href="sort/new_phone.php">NEW Iphone</a></li>
                                <li><a href="/macbook.php">Macbook</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <section class="banner">
            <div class="wrapper">
                <h1 class="title">Iphone 15 Pro Max</h1>
                <p>Топовый флагман Apple 2023 года, который не стали переименовывать в iPhone 15 Ultra. Ему нет равных ни в дизайне, ни в характеристиках, ни в цене, потому что стал ещё дороже, чем iPhone 14 Pro Max</p>
                <a class="btn" href="#">Подробнее</a>
            </div>
        </section>
        <?php
        include_once "src/helpers.php";
        $goods = checkGoods();
        ?>
<section class="catalog">
    <div class="wrapper">
        <div class="grid">
            <div class="grid-item grid-item-title">
                <h2 class="title-h2">Специальные предложения</h2>
            </div>
            <?php foreach ($goods as $good): ?>
                <div class="grid-item grid-item-img">
                </div>
                <div class="grid-item grid-item-catalog">
                    <div class="bg-white">
                        <div class="thumb">
                            <img src="<?php echo $good['img']; ?>" alt="<?php echo $good['title']; ?>" width="200" height="200">
                        </div>
                        <p class="grid-title"><?php echo $good['title']; ?></p>
                        <p class="grid-price"><?php echo $good['price']; ?> ₽ </p>
                        <form action="basket/dobasket.php" method="get">
                            <input type="hidden" name="type" value="1">
                            <input type="hidden" name="id" value="<?php echo $good['id']; ?>">
                            <button type="submit" class="grid-btn">Купить</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php
include_once "templates/footer.php";
?>
</body>
</html>