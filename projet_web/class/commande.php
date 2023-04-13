<?php
require_once "dbc.php";
class commande{
    private $num_commande,$date,$client;
    function __construct($n,$d,$c){
        $this->num_commande = $n;
        $this->date=$d;
        $this->client=$c;
    }
    function __get($prop){
		switch ($prop) {
			case 'commmande':  return $this->num_commande;  break;
			case 'date':  return $this->date;  break;
			case 'client':  return $this->client;  break;
		}
	}
    function addCommande(){
        dbc::addCommande($this->num_commande,$this->client,$this->date);
    }
    // static function delCommande($index){
    //     dbc::delCommande($index);
    // }
    static function afficheCommande(){
        return dbc::afficheCommande();
    }
    // function updateCommande(){
    //     dbc::updateCommande($this->num_commande,$this->date,$this->client);
    // }
    // static function getCommande($index){
    //     return dbc::getCommande($index);
    // }
    function addCommande_produit($reference,$qte){
        dbc::addCommande_produit($this->num_commande,$reference,$qte);
    } 
}