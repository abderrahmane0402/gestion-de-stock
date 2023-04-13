<?php
require_once "dbc.php";
class admin{
    private $login,$password;
    function __construct($l,$p){
        $this->login = $l;
        $this->password = $p;
    }
    function verify(){
        return dbc::login($this->login,$this->password);
    }
}
?>