<?php
extract($_GET);
require_once "../class/produit.php";
$r = produit::getProduit($id);
unlink($r->photo);
produit::delProduit($id);
header("location:produit.php?statue=d");
?>