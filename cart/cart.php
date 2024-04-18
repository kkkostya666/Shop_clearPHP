<?php
include_once "../templates/headers.php";
include_once "../src/helpers.php";
$pdo = getPDO();
$id_busk = $_COOKIE["id_busk"];
$stmt = $pdo->prepare("SELECT COUNT(*) as count FROM basket_goods WHERE basket_id = :id_busk");
$stmt->execute(['id_busk' => $id_busk]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
if ($result["count"] == 0) {
    ?>
    <?php
} else {
    $stmt = $pdo->prepare("SELECT goods_id, goods.title, goods.price, goods.discr, basket_goods.kolvo, basket_goods.basket_id 
    FROM goods 
    JOIN basket_goods ON goods.id = basket_goods.goods_id 
    WHERE basket_goods.basket_id = :id_busk");
    $stmt->execute(['id_busk' => $id_busk]);
}
?>
<div class="bg-white">
    <div class="header">
        <div class="wrapper">
            <div class="header-top">
                <div class="logo"><a href="/home.php"><span class="logo-image"></span><span>KostyaStore</span></a></div>
                <div class="header-info">
                    <form action="../login.php" method="get">
                        <button type="submit">Авторизация</button>
                    </form>
                </div>
            </div>
        </div>
        <hr>
        <div class="wrapper">
            <div class="header-bottom">
                <ul class="nav">
                    <li><a href="../sort/old_phone.php">Б/У Iphone</a></li>
                    <li><a href="../sort/new_phone.php">NEW Iphone</a></li>
                    <li><a href="../macbook.php">Macbook</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<section class="catalog">
    <div class="wrapper">
        <div class="grid">
            <div class="grid-item grid-item-title">
                <form action="../basket/dobasket.php" method="get">
                    <input type="hidden" name="type" value="4">
                    <button type="submit" class="grid-btn">Удалить корзину</button>
                </form>
                <form action="../cart/order.php" method="get">
                    <button type="submit" class="grid-btn">Купить!</button>
                </form>
            </div>
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="grid-item grid-item-catalog">
                    <div class="bg-white">

                        <p class="grid-title"><?php echo $row['title']; ?></p>
                        <p class="grid-price"><?php echo $row['price']; ?> ₽ </p>
                        <p class="grid-descr"><?php echo $row['discr']; ?></p>
                        <p class="grid-descr"> Количество: <?php echo $row['kolvo']; ?></p>
                        <form action="../basket/dobasket.php" method="get">
                            <input type="hidden" name="type" value="2">
                            <input type="hidden" name="id" value="<?php echo $row['goods_id']; ?>">
                            <button type="submit" class="grid-btn">Уменьшить</button>
                        </form>
                        <form action="../basket/dobasket.php" method="get">
                            <input type="hidden" name="type" value="3">
                            <input type="hidden" name="id" value="<?php echo $row['goods_id']; ?>">
                            <button type="submit" class="grid-btn">Удалить</button>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>




<?php
include_once "../templates/footer.php";
?>
