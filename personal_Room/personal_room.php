<?php
include_once "../templates/headers.php";
include_once "../src/helpers.php";
$goods = checkGoods();
checkAuth();
$user = currentUser();
$pdo = getPDO();
$order_id = $_SESSION['user']['id'];
$stmt = $pdo->prepare("SELECT order_id, date_order FROM orders WHERE order_id = :order_id ORDER BY date_order DESC");
$stmt->execute(['order_id' => $order_id]);


while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
    $order_id = $row["order_id"];
    $goods_stmt = $pdo->prepare(
        "SELECT id, title, price, order_id, goods_id, kolvo FROM goods, order_goods 
                                  WHERE goods.id = order_goods.goods_id AND order_id = :order_id"
    );
    $goods_stmt->execute(['order_id' => $order_id]);


    $order_goods = [];
    while ($goods_row = $goods_stmt->fetch(\PDO::FETCH_ASSOC)) {
        $order_goods[] = $goods_row;
    }


    $orders[] = [
        'order_id' => $order_id,
        'date_order' => $row['date_order'],
        'goods' => $order_goods
    ];
}
?>
<div class="bg-white">
    <div class="header">
        <div class="wrapper">
            <div class="header-top">
                <div class="logo"><a href="/home.php"><span class="logo-image"></span><span>KostyaStore</span></a></div>
                <div class="header-info">
                    <form action="../src/actions/logout.php" method="post">
                        <button role="button">Выйти из аккаунта</button>
                    </form>
                    <div class="user-profile">
                        <img src="<?php echo $user['avatar'] ?>" alt="<?php echo $user['name'] ?>">
                        <span><?php echo $user['name'];?></span>
                    </div>
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
<form action="../personal_Room/change.php" method="post">
    <label for="name">Имя:</label>
    <input type="text" id="name" name="name" value="<?php echo $user['name'] ?>"><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $user['email'] ?>"><br>
    <button type="submit">Сохранить изменения</button>
</form>
<section class="catalog">
    <div class="wrapper">
        <div class="grid">
            <div class="grid-item grid-item-title">
                <h2 class="title-h2">История заказов</h2>
            </div>
            <?php foreach ($orders as $order): ?>
                <?php foreach ($order['goods'] as $good): ?>
                    <div class="grid-item grid-item-img">
                    </div>
                    <div class="grid-item grid-item-catalog">
                        <div class="bg-white">
                            <p class="grid-title"><?php echo $good['title']; ?></p>
                            <p class="grid-price"><?php echo $good['price']; ?> ₽</p>
                            <p class="grid-price">Количество: <?php echo $good['kolvo']; ?>
                            <p class="grid-price"><?php echo $order['date_order'] ?></p>
                            <p class="grid-price"><?php  ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
