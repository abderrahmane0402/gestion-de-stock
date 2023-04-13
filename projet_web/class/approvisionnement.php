<?php
require_once "dbc.php";
class approvisionnement{
    private $num_Apr,$date,$frns;
    function __construct($n,$f,$d){
        $this->num_Apr = $n;
        $this->date=$d;
        $this->frns=$f;
    }
    function __get($prop){
		switch ($prop) {
			case 'num_Apr':  return $this->num_Apr;  break;
			case 'date':  return $this->date;  break;
			case 'frns':  return $this->frns;  break;
		}
	}
    function addApr(){
        dbc::addApr($this->num_Apr,$this->frns,$this->date);
    }
    static function afficheApr(){
        return dbc::afficheApr();
    }
    function addApr_produit($reference,$qte){
        dbc::addApr_produit($this->num_Apr,$reference,$qte);
    }
    static function afficheProduitWithCatF_n0($num_Apr){
        return dbc::afficheProduitWithCatF_n0($num_Apr);
    }
}