<?php
$id_busk = $_COOKIE["id_busk"];
if (!isset($id_busk))
{
    $uniq_ID = uniqid("ID");
    setcookie("id_busk",$uniq_ID, time()+60*60*24*14);
}
else
    setcookie("id_busk",$id_busk, time()+60*60*24*14);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IphoneStore</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<header>
    <div class="wrapper">
        <nav>
            <ul class="nav">
                <li><a href="/cart/cart.php">Корзина</a></li>
                <li><a href="../home.php">Главное меню</a></li>
                <li><a href="../personal_Room/personal_room.php">Личный кабинет</a></li>
            </ul>
        </nav>
    </div>
</header>
