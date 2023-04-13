<?php
extract($_GET);
require_once "../class/categorie.php";
categorie::delCat_Produit($id);
header("location:categorie.php?statue=d");
?>