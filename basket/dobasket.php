<?php
include_once "../templates/headers.php";
include_once "../src/helpers.php";
$pdo = getPDO();
$type = $_GET["type"];
$id = $_GET["id"];
$id_busk = $_COOKIE["id_busk"];
if($type==1){
    $stmt = $pdo->prepare("SELECT * FROM basket_goods
    WHERE goods_id = :id AND basket_id = :id_busk");
    $stmt->execute(['id' => $id, 'id_busk' => $id_busk]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result !== false)
    {
        $stmt = $pdo->prepare("UPDATE basket_goods SET kolvo=kolvo+1
                                     WHERE goods_id = :id AND basket_id = :id_busk");
        $stmt->execute(['id' => $id, 'id_busk' => $id_busk]);

    }
    else
    {
        $stmt = $pdo->prepare("INSERT INTO basket_goods (basket_id, goods_id, kolvo) VALUES (:id_busk, :goods_id, 1)");
        $stmt->execute(['id_busk' => $id_busk, 'goods_id' => $id]);
    }
}
if($type==2)
{
    $stmt = $pdo->prepare("SELECT * FROM basket_goods
    WHERE goods_id = :id AND basket_id = :id_busk");
    $stmt->execute(['id' => $id, 'id_busk' => $id_busk]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result!== false){
        if ($result["kolvo"]>1){
            $stmt = $pdo->prepare("UPDATE basket_goods SET kolvo=kolvo-1
                                     WHERE goods_id = :id AND basket_id = :id_busk");
            $stmt->execute(['id' => $id, 'id_busk' => $id_busk]);
        }
        else
        {
            $stmt = $pdo->prepare("DELETE FROM basket_goods WHERE goods_id = :id AND basket_id = :id_busk");
            $stmt->execute(['id' => $id, 'id_busk' => $id_busk]);
        }
    }
}
if($type == 3)
{
    $stmt = $pdo->prepare("DELETE FROM basket_goods WHERE goods_id = :id AND basket_id = :id_busk");
    $stmt->execute(['id' => $id, 'id_busk' => $id_busk]);
}
if($type == 4)
{
    $stmt = $pdo->prepare("DELETE FROM basket_goods WHERE basket_id = :id_busk");
    $stmt->execute(['id_busk' => $id_busk]);
}
include_once ("../cart/cart.php");
