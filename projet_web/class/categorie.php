<?php
require_once "dbc.php";
class categorie{
    private $id_cat,$reference,$desc;
    function __construct($ref,$id,$d){
        $this->id_cat = $id;
        $this->reference = $ref;
        $this->desc = $d;
    }
    function __get($prop){
		switch ($prop) {
			case 'reference':  return $this->reference;  break;
			case 'id_cat':  return $this->id_cat;  break;
			case 'desc':  return $this->desc;  break;
		}
	}
    function addCat_Produit(){
        dbc::addCat_Produit($this->reference,$this->desc);
    }
    static function delCat_Produit($index){
        dbc::delCat_Produit($index);
    }
    static function afficheCat_Produit(){
        return dbc::afficheCat_Produit();
    }
    function updateCat_Produit(){
        dbc::updateCat_Produit($this->id_cat,$this->reference,$this->desc);
    }
    static function getCat_Produit($index){
        return dbc::getCat_Produit($index);
    }
}