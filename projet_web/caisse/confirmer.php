<?php
require_once "../class/produit.php";
extract($_POST);
$key=1;
$i=0;
foreach ($produits as $key => $prd) {
    echo 
    produit::update_qte($prd,$qte[$i]);
    $i+=1;
}
header("location:caisse.php");