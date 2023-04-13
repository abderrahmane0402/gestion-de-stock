<?php
require_once "dbc.php";
class produit{
    private $reference,$id_cat,$libelle,$prix_u,$qte,$prix_a,$prix_v,$photo,$desc;
    function __construct($r,$id,$lib,$pu,$q,$pa,$pv,$p,$d)
    {
        $this->reference = $r;
        $this->id_cat = $id;
        $this->libelle = $lib;
        $this->prix_u = $pu;
        $this->qte = $q;
        $this->prix_a = $pa;
        $this->prix_v = $pv;
        $this->photo = $p;
        $this->desc = $d;
    }
    function set_qte($q){
        $this->qte = $q;
    }
    function __get($prop){
		switch ($prop) {
			case 'reference':  return $this->reference;  break;
			case 'id_cat':  return $this->id_cat;  break;
			case 'libelle':  return $this->libelle;  break;
			case 'prix_u':  return $this->prix_u;  break;
			case 'qte':  return $this->qte;  break;
			case 'prix_a':  return $this->prix_a;  break;
			case 'prix_v':  return $this->prix_v;  break;
			case 'photo':  return $this->photo;  break;
			case 'desc':  return $this->desc;  break;
		}
        
	}
    function addProduit(){
        dbc::addProduit($this->id_cat,$this->libelle,$this->prix_u,$this->qte,$this->prix_a,$this->prix_v,$this->photo,$this->desc);
    }
    static function delProduit($index){
        dbc::delProduit($index);
    }
    static function afficheProduit(){
        return dbc::afficheProduit();
    }
    function updateProduit(){
        dbc::updateProduit($this->reference,$this->id_cat,$this->libelle,$this->prix_u,$this->qte,$this->prix_a,$this->prix_v,$this->photo,$this->desc);
    }
    static function getProduit($index){
        return dbc::getProduit($index);
    }
    static function afficheProduitWithCat(){
        return dbc::afficheProduitWithCat();
    }
    static function afficheProduitWithCat_n0(){
        return dbc::afficheProduitWithCat_n0();
    }
    static function afficheProduitWithCat_n0_s($id){
        return dbc::afficheProduitWithCat_n0_s($id);
    }
    static function update_qte($reference,$qte){
        return dbc::update_qte($reference,$qte);
    }
}

?>