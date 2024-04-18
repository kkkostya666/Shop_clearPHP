<?php
include_once "../templates/headers.php";
include_once "../src/helpers.php";
$pdo = getPDO();
$stmt = $pdo->prepare("SELECT g.title, g.price, g.discr
                            FROM goods AS g
                            JOIN category_goods AS cg ON g.id = cg.goods_id
                            WHERE cg.category_id = 1;");
$result = $stmt->fetch(PDO::FETCH_ASSOC);
echo $result;
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
                    <li><a href="old_phone.php">Б/У Iphone</a></li>
                    <li><a href="new_phone.php">NEW Iphone</a></li>
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
                <h2 class="title-h2">Специальные предложения</h2>
            </div>
            <?php
            include_once "../src/helpers.php";
            $pdo = getPDO();
            $stmt = $pdo->prepare("SELECT g.id, g.title, g.price, g.discr
FROM goods AS g
JOIN category_goods AS cg ON g.id = cg.goods_id
WHERE cg.category_id = 1;");
            $stmt->execute();
            $goods = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
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
                        <p class="grid-price">Б/У</p>
                        <form action="../basket/dobasket.php" method="get">
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
include_once ("../templates/footer.php");