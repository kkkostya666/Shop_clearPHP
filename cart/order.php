<?php
include_once "../src/helpers.php";
$pdo = getPDO();
$order_id = $_SESSION['user']['id'];
$id_busk = $_COOKIE["id_busk"];
echo $order_id;
if (!isset($_SESSION['user']['id']))
{
    $message = "<tr><td bgcolor='#ff9999' align='center'><b>Вы не авторизованы!</b></td></tr>";
    echo $message;
}
else
{

    $stmt_order = $pdo->prepare("INSERT INTO orders (order_id, date_order) VALUES (:order_id, CURDATE())");
    $stmt_order->execute(['order_id' => $order_id]);


    $stmt_basket = $pdo->prepare("SELECT * FROM basket_goods WHERE basket_id = :id_busk");
    $stmt_basket->execute(['id_busk' => $id_busk]);

    while ($row = $stmt_basket->fetch(\PDO::FETCH_ASSOC)) {

        $stmt_check = $pdo->prepare("SELECT * FROM order_goods WHERE order_id = :order_id AND goods_id = :goods_id");
        $stmt_check->execute(['order_id' => $order_id, 'goods_id' => $row['goods_id']]);
        $existing_row = $stmt_check->fetch();

        if ($existing_row) {
            $kolvo = $existing_row['kolvo'] + 1;
            $stmt_update = $pdo->prepare(
                "UPDATE order_goods SET kolvo = :kolvo WHERE order_id = :order_id AND goods_id = :goods_id"
            );
            $stmt_update->execute(['kolvo' => $kolvo, 'order_id' => $order_id, 'goods_id' => $row['goods_id']]);
        } else {
            $goods_stmt = $pdo->prepare(
                "INSERT INTO order_goods (order_id, goods_id, kolvo) VALUES (:order_id, :goods_id, :kolvo)"
            );
            $goods_stmt->execute(['order_id' => $order_id, 'goods_id' => $row['goods_id'], 'kolvo' => 1]);
        }
    }
    $stmt_delete = $pdo->prepare("DELETE FROM basket_goods WHERE basket_id = :basket_id");
    $stmt_delete->execute(['basket_id' => $id_busk]);
    redirect("/home.php");
}


