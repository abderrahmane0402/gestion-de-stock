<?php
extract($_GET);
require_once "../class/client.php";
client::delClient($id);
header("location:client.php?statue=d");
?>