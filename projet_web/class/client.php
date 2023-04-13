<?php
require_once "dbc.php";
class client{
    private $id,$nom,$adresse,$tele,$email;
    function __construct($i,$n,$a,$t,$e){
        $this->id=$i;
        $this->nom=$n;
        $this->adresse=$a;
        $this->tele=$t;
        $this->email=$e;
    }
    function __get($prop){
		switch ($prop) {
			case 'id':  return $this->id;  break;
			case 'nom':  return $this->nom;  break;
			case 'adresse':  return $this->adresse;  break;
			case 'tele':  return $this->tele;  break;
			case 'email':  return $this->email;  break;
		}
	}
    function addClient(){
        dbc::addClient($this->nom,$this->adresse,$this->tele,$this->email);
    }
    static function delClient($index){
        dbc::delClient($index);
    }
    static function afficheClient(){
        return dbc::afficheClient();
    }
    function updateClient(){
        dbc::updateClient($this->id,$this->nom,$this->adresse,$this->tele,$this->email);
    }
    static function getClient($index){
        return dbc::getClient($index);
    }
}