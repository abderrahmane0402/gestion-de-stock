<?php
header("Content-Type: application/json; charset=UTF-8");

if(isset($_POST['panier'])){
    echo "good";
    $obj = json_decode($_POST['panier']);
    print_r($obj);
    echo $_POST['length'];
    foreach ($obj as $key => $value) {
        # code...
    }
}