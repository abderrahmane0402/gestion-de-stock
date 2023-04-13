<?php
require_once "client.php";
require_once "produit.php";
require_once "categorie.php";
require_once "commande.php";
class dbc{
    static function getPDO($host,$nomDB,$user,$password){
        return new PDO("mysql:host=$host;dbname=$nomDB",$user,$password);
    }
    /*==============================================================*/
    /* Table : administrateur                                       */
    /*==============================================================*/



    
    static function login($login,$password){
        $db = dbc::getPDO("localhost","gestion_de_stock","root","");
        $sql =$db->prepare("select * from administrateur where login=? and password=?");
        $sql->execute(array($login,$password));
        if($sql->rowCount() != 0) return true;
        else return false;
    }




    /*==============================================================*/
    /* Table : Client                                               */
    /*==============================================================*/    





    static function afficheClient(){
        $db = dbc::getPDO("localhost","gestion_de_stock","root","");
        $sql = $db->prepare("select * from client");
        $sql->execute();
        $liste = [];
        while ($r = $sql->fetch()) {
            $liste[] = new client($r['ID_C'],$r['NOM'],$r['ADRESSE'],$r['TELEPHONE'],$r['EMAIL']);
        }
        return $liste;
    }
    static function addClient($nom,$adresse,$tele,$email){
        $db = dbc::getPDO("localhost","gestion_de_stock","root","");
        $sql = $db->prepare("insert into client values(null,?,?,?,?);");
        $sql->execute(array($nom,$adresse,$tele,$email));
    }
    static function delClient($index){
        $db = dbc::getPDO("localhost","gestion_de_stock","root","");
        $sql = $db->prepare("delete from client where ID_C=?");
        $sql->execute([$index]);
    }
    static function updateClient($index,$nom,$adresse,$tele,$email){
        $db = dbc::getPDO("localhost","gestion_de_stock","root","");
        $sql = $db->prepare("UPDATE `client` SET `ID_C` = $index, `NOM` = ?, `ADRESSE` = ?, `TELEPHONE` = ?, `EMAIL` = ? WHERE `ID_C` = $index;");
        $sql->execute(array($nom,$adresse,$tele,$email));
    }
    static function getClient($index){
        $db = dbc::getPDO("localhost","gestion_de_stock","root","");
        $sql = $db->prepare("select * from client where ID_C=?");
        $sql->execute([$index]);
        if($r = $sql->fetch()){
            $client = new client($r['ID_C'],$r['NOM'],$r['ADRESSE'],$r['TELEPHONE'],$r['EMAIL']);
            return $client;
        }
        return NULL;
    }




    /*==============================================================*/
    /* Table : Produit                                              */
    /*==============================================================*/




    static function afficheProduit(){
        $db = dbc::getPDO("localhost","gestion_de_stock","root","");
        $sql = $db->prepare("select * from produit");
        $sql->execute();
        $liste = [];
        while ($r = $sql->fetch()) {
            $liste[] = new produit($r['REFERENCE'],$r['ID_CAT'],$r['LIBELLE'],$r['PRIX_U'],$r['QTE'],$r['PRIX_A'],$r['PRIX_V'],$r['PHOTO'],$r['DESC_PR']);
        }
        return $liste;
    }
    static function addProduit($id,$lib,$pu,$q,$pa,$pv,$p,$d){
        $db = dbc::getPDO("localhost","gestion_de_stock","root","");
        $sql = $db->prepare("insert into produit values(null,?,?,?,?,?,?,?,?);");
        $sql->execute(array($id,$lib,$pu,$q,$pa,$pv,$p,$d));
    }
    static function delProduit($index){
        $db = dbc::getPDO("localhost","gestion_de_stock","root","");
        $sql = $db->prepare("delete from produit where REFERENCE=?");
        $sql->execute([$index]);
    }
    static function updateProduit($index,$id,$lib,$pu,$q,$pa,$pv,$p,$d){
        $db = dbc::getPDO("localhost","gestion_de_stock","root","");
        $sql = $db->prepare("UPDATE `produit` SET `REFERENCE` = $index, `ID_CAT` = ?, `LIBELLE` = ?, `PRIX_U` = ?, `QTE` = ? ,`PRIX_A` = ? ,`PRIX_V` = ? , PHOTO = ? , DESC_PR = ? WHERE `REFERENCE` = $index;");
        $sql->execute(array($id,$lib,$pu,$q,$pa,$pv,$p,$d));
    }
    static function getProduit($index){
        $db = dbc::getPDO("localhost","gestion_de_stock","root","");
        $sql = $db->prepare("select * from produit where REFERENCE=?");
        $sql->execute([$index]);
        if($r = $sql->fetch()){
            $Produit = new produit($r['REFERENCE'],$r['ID_CAT'],$r['LIBELLE'],$r['PRIX_U'],$r['QTE'],$r['PRIX_A'],$r['PRIX_V'],$r['PHOTO'],$r['DESC_PR']);
            return $Produit;
        }
        return NULL;
    }
    static function afficheProduitWithCat(){
        $db = dbc::getPDO("localhost","gestion_de_stock","root","");
        $sql = $db->prepare("select * from produit natural join categorie_produit");
        $sql->execute();
        $liste = [];
        while ($r = $sql->fetch()) {
            $liste[] = new produit($r['REFERENCE'],$r['REFERENCE_CAT'],$r['LIBELLE'],$r['PRIX_U'],$r['QTE'],$r['PRIX_A'],$r['PRIX_V'],$r['PHOTO'],$r['DESC_PR']);
        }
        return $liste;
    }
    static function afficheProduitWithCat_n0(){
        $db = dbc::getPDO("localhost","gestion_de_stock","root","");
        $sql = $db->prepare("select * from produit natural join categorie_produit where QTE > 0");
        $sql->execute();
        $liste = [];
        while ($r = $sql->fetch()) {
            $liste[] = new produit($r['REFERENCE'],$r['REFERENCE_CAT'],$r['LIBELLE'],$r['PRIX_U'],$r['QTE'],$r['PRIX_A'],$r['PRIX_V'],$r['PHOTO'],$r['DESC_PR']);
        }
        return $liste;
    }
    static function afficheProduitWithCatF_n0($num_Apr){
        $db = dbc::getPDO("localhost","gestion_de_stock","root","");
        $sql = $db->prepare("select * from produit natural join contient2 natural join categorie_produit where NUM_APR=?");
        $sql->execute([$num_Apr]);
        $liste = [];
        while ($r = $sql->fetch()) {
            $liste[] = new produit($r['REFERENCE'],$r['REFERENCE_CAT'],$r['LIBELLE'],$r['PRIX_U'],$r['QTE'],$r['PRIX_A'],$r['PRIX_V'],$r['PHOTO'],$r['DESC_PR']);
        }
        return $liste;
    }
    static function afficheProduitWithCat_n0_s($id_cat){
        $db = dbc::getPDO("localhost","gestion_de_stock","root","");
        $sql = $db->prepare("select * from produit natural join categorie_produit where QTE > 0 and ID_CAT=?");
        $sql->execute([$id_cat]);
        $liste = [];
        while ($r = $sql->fetch()) {
            $liste[] = new produit($r['REFERENCE'],$r['ID_CAT'],$r['LIBELLE'],$r['PRIX_U'],$r['QTE'],$r['PRIX_A'],$r['PRIX_V'],$r['PHOTO'],$r['DESC_PR']);
        }
        return $liste;
    }



    /*==============================================================*/
    /* Table : Categorie de Produit                                 */
    /*==============================================================*/






    static function afficheCat_Produit(){
        $db = dbc::getPDO("localhost","gestion_de_stock","root","");
        $sql = $db->prepare("select * from categorie_produit");
        $sql->execute();
        $liste = [];
        while ($r = $sql->fetch()) {
            $liste[] = new categorie($r['REFERENCE_CAT'],$r['ID_CAT'],$r['DESC']);
        }
        return $liste;
    }
    static function addCat_Produit($ref,$d){
        $db = dbc::getPDO("localhost","gestion_de_stock","root","");
        $sql = $db->prepare("insert into categorie_produit values(?,null,?);");
        $sql->execute(array($ref,$d));
    }
    static function delCat_Produit($index){
        $db = dbc::getPDO("localhost","gestion_de_stock","root","");
        $sql = $db->prepare("delete from categorie_produit where ID_CAT=?");
        $sql->execute([$index]);
    }
    static function updateCat_Produit($index,$ref,$d){
        $db = dbc::getPDO("localhost","gestion_de_stock","root","");
        $sql = $db->prepare("UPDATE `categorie_produit` SET `ID_CAT` = $index, `REFERENCE_CAT` = ? , `DESC` = ? WHERE `ID_CAT` = $index;");
        $sql->execute(array($ref,$d));
    }
    static function getCat_Produit($index){
        $db = dbc::getPDO("localhost","gestion_de_stock","root","");
        $sql = $db->prepare("select * from categorie_produit where ID_CAT=?");
        $sql->execute([$index]);
        if($r = $sql->fetch()){
            $categorie = new categorie($r['REFERENCE_CAT'],$r['ID_CAT'],$r['DESC']);
            return $categorie;
        }
        return NULL;
    }







    /*==============================================================*/
    /* Table : Commande                                             */
    /*==============================================================*/







    static function afficheCommande(){
        $db = dbc::getPDO("localhost","gestion_de_stock","root","");
        $sql = $db->prepare("select * from commande");
        $sql->execute();
        $liste = [];
        while ($r = $sql->fetch()) {
            $liste[] = new commande($r['NUM_CMD'],$r['DATE'],$r['ID_C']);
        }
        return $liste;
    }
    static function addCommande($num_cmd,$client,$date){
        $db = dbc::getPDO("localhost","gestion_de_stock","root","");
        $sql = $db->prepare("insert into commande values(?,?,?);");
        $sql->execute(array($num_cmd,$client,$date));
    }
    static function addCommande_produit($num_cmd,$reference,$qte){
        $db = dbc::getPDO("localhost","gestion_de_stock","root","");
        $sql = $db->prepare("insert into contient values(?,?,?);");
        $sql->execute(array($reference,$num_cmd,$qte));
        $Produit = dbc::getProduit($reference);
        $Produit->set_qte($Produit->qte - $qte);
        $Produit->updateProduit();
    }
    static function update_qte($reference,$qte){
        $Produit = dbc::getProduit($reference);
        $Produit->set_qte($Produit->qte - $qte);
        $Produit->updateProduit();
    }
    // static function delCommande($index){
    //     $db = dbc::getPDO("localhost","gestion_de_stock","root","");
    //     $sql = $db->prepare("delete from commande where NUM_CMD=?");
    //     $sql->execute([$index]);
    // }
    // static function updateCommande($index,$ref){
    //     $db = dbc::getPDO("localhost","gestion_de_stock","root","");
    //     $sql = $db->prepare("UPDATE `commande` SET `NUM_CMD` = $index, `REFERENCE_CAT` = ? WHERE `NUM_CMD` = $index;");
    //     $sql->execute(array($ref));
    // }
    // static function getCommande($index){
    //     $db = dbc::getPDO("localhost","gestion_de_stock","root","");
    //     $sql = $db->prepare("select * from commande where NUM_CMD=?");
    //     $sql->execute([$index]);
    //     if($r = $sql->fetch()){
    //         $commande = new commande($r['NUM_CMD'],$r['DATE'],$r['ID_C']);
    //         return $commande;
    //     }
    //     return NULL;
    // }











    /*==============================================================*/
    /* Table : Approvisionnement                                    */
    /*==============================================================*/








    static function afficheApr(){
        $db = dbc::getPDO("localhost","gestion_de_stock","root","");
        $sql = $db->prepare("select * from approvisionnements");
        $sql->execute();
        $liste = [];
        while ($r = $sql->fetch()) {
            $liste[] = new approvisionnement($r['NUM_APR'],$r['ID_F'],$r['DATE']);
        }
        return $liste;
    }
    static function addApr($num_apr,$date,$frns){
        $db = dbc::getPDO("localhost","gestion_de_stock","root","");
        $sql = $db->prepare("insert into approvisionnements values(?,?,?);");
        $sql->execute(array($num_apr,$frns,$date));
    }
    static function addApr_produit($num_apr,$reference,$qte){
        $db = dbc::getPDO("localhost","gestion_de_stock","root","");
        $sql = $db->prepare("insert into contient2 values(?,?,?);");
        $sql->execute(array($num_apr,$reference,$qte));

        $Produit = dbc::getProduit($reference);
        $Produit->set_qte($Produit->qte + $qte);
        $Produit->updateProduit();
    }








    /*==============================================================*/
    /* Table : Fourni                                               */
    /*==============================================================*/    







    static function afficheFourni(){
        $db = dbc::getPDO("localhost","gestion_de_stock","root","");
        $sql = $db->prepare("select * from fournisseur");
        $sql->execute();
        $liste = [];
        while ($r = $sql->fetch()) {
            $liste[] = new fournisseur($r['ID_F'],$r['NOM'],$r['ADRESSE'],$r['TELEPHONE'],$r['EMAIL']);
        }
        return $liste;
    }
    static function addFourni($nom,$adresse,$tele,$email){
        $db = dbc::getPDO("localhost","gestion_de_stock","root","");
        $sql = $db->prepare("insert into fournisseur values(null,?,?,?,?);");
        $sql->execute(array($nom,$adresse,$tele,$email));
    }
    static function delFourni($index){
        $db = dbc::getPDO("localhost","gestion_de_stock","root","");
        $sql = $db->prepare("delete from fournisseur where ID_F=?");
        $sql->execute([$index]);
    }
    static function updateFourni($index,$nom,$adresse,$tele,$email){
        $db = dbc::getPDO("localhost","gestion_de_stock","root","");
        $sql = $db->prepare("UPDATE `fournisseur` SET `ID_F` = $index, `NOM` = ?, `ADRESSE` = ?, `TELEPHONE` = ?, `EMAIL` = ? WHERE `ID_F` = $index;");
        $sql->execute(array($nom,$adresse,$tele,$email));
    }
    static function getFourni($index){
        $db = dbc::getPDO("localhost","gestion_de_stock","root","");
        $sql = $db->prepare("select * from fournisseur where ID_F=?");
        $sql->execute([$index]);
        if($r = $sql->fetch()){
            $Fourni = new fournisseur($r['ID_F'],$r['NOM'],$r['ADRESSE'],$r['TELEPHONE'],$r['EMAIL']);
            return $Fourni;
        }
        return NULL;
    }
}    
?>