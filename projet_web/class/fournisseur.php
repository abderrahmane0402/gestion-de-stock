<?php
require_once "dbc.php";
class fournisseur{
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
    function addFourni(){
        dbc::addFourni($this->nom,$this->adresse,$this->tele,$this->email);
    }
    static function delFourni($index){
        dbc::delFourni($index);
    }
    static function afficheFourni(){
        return dbc::afficheFourni();
    }
    function updateFourni(){
        dbc::updateFourni($this->id,$this->nom,$this->adresse,$this->tele,$this->email);
    }
    static function getFourni($index){
        return dbc::getFourni($index);
    }
}