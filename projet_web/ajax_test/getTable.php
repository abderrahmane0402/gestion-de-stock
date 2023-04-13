<?php
require_once "../class/client.php";
$pdo = new PDO("mysql:host=localhost;dbname=gestion_de_stock","root","");
$client = $pdo->prepare("select * from client");
$client->execute();
$data = [];
while ($row =$client->fetch()) {
    $data[] = $row;
}
echo json_encode($data);
?>