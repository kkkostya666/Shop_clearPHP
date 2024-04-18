<?php
require_once __DIR__ . '/src/helpers.php';
$goods = checkGoods();
checkAuth();
$user = currentUser();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IphoneStore</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header>
    <div class="wrapper">
        <nav>
            <ul class="nav">
                <li><a href="/cart/cart.php">Корзина</a></li>
                <li><a href="/home.php">Главное меню</a></li>
                <li><a href="/personal_Room/personal_room.php">Личный кабинет</a></li>
            </ul>
        </nav>
    </div>
    <div class="bg-white">
        <div class="header">
            <div class="wrapper">
                <div class="header-top">
                    <div class="logo"><a href="/home.php"><span class="logo-image"></span><span>KostyaStore</span></a></div>
                    <div class="header-info">
                        <form action="src/actions/logout.php" method="post">
                            <button role="button">Выйти из аккаунта</button>
                        </form>
                        <div class="user-profile">
                            <img src="<?php echo $user['avatar'] ?>" alt="<?php echo $user['name'] ?>">
                            <span><?php echo $user['name'] ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="wrapper">
                <div class="header-bottom">
                    <ul class="nav">
                        <li><a href="/sort/old_phone.php">Б/У Iphone</a></li>
                        <li><a href="/sort/new_phone.php">NEW Iphone</a></li>
                        <li><a href="macbook.php">Macbook</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
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
                                <img src="<?php echo $good['img']; ?>" alt="<?php echo $good['title']; ?> width="200" height="200"">
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