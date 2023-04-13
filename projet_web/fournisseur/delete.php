<?php
extract($_GET);
require_once "../class/fournisseur.php";
fournisseur::delFourni($id);
header("location:fournisseur.php?statue=d");
?>