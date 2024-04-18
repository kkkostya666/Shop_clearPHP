<?php
include_once "../src/helpers.php";
$pdo = getPDO();
$id = $_SESSION['user']['id'];
$name = $_POST["name"];
$email = $_POST["email"];
if($name !="" && $email != "")
{
    $stmt = $pdo->prepare("UPDATE users SET name=:name, email=:email WHERE id = :id");
    $stmt->execute(['name' => $name, 'email' => $email, 'id'=>$id]);
}
redirect("/home.php");
?>hiklu