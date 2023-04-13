<?php 
    require_once "../class/produit.php"; 
    session_start();
    extract($_POST);
    $r = produit::getProduit($_GET['id']);
    if(isset($_POST['submit'])){
      $photo = $_FILES['photo'];
      $filename=$photo['tmp_name'];
      if($filename != NULL){
        $extension = pathinfo($photo['name'] , PATHINFO_EXTENSION);
        $destination = "../images/produit/$libelle.$extension";
        move_uploaded_file($filename,$destination);
      }else{
        $destination = $r->photo;
      }
      $produit = new produit($r->reference,$categorie,$libelle,$prix_u,$qte,$prix_a,$prix_v,$destination,$description);
      $produit->updateProduit();
      header("location:produit.php?statue=u");
    }
?>
<!DOCTYPE html>
<html>

<head>
    <?php require "../index/head.html"; ?>
</head>

<body class="navbar-fixed sidebar-fixed" id="body">
    <script>
    NProgress.configure({
        showSpinner: false
    });
    NProgress.start();
    </script>
    <!-- ====================================
    ——— WRAPPER
    ===================================== -->
    <div class="wrapper">
        <?php require "../index/nav.html"; ?>
        <div class="page-wrapper">
            <?php require "../index/header.php"; ?>
            <div class="content-wrapper">
                <div class="content">
                    <div class="row">
                        <div class="col-xl-12">
                            <!-- Basic Examples -->
                            <div class="card card-default">
                                <div class="card-header">
                                    <h2>Modifier un Produit</h2>
                                </div>
                                <div class="card-body">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="libelle">
                                                Libelle produit
                                            </label>
                                            <input type="text" class="form-control" id="libelle"
                                                placeholder="Enter le libelle" name="libelle" 
                                                value="<?= $r->libelle ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="prix_u">Prix Unitaire</label>
                                            <input type="number" class="form-control" id="prix_u"
                                                placeholder="Enter le prix unitaire" name="prix_u" 
                                                value="<?= $r->prix_u ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="prix_a">Prix Achat</label>
                                            <input type="number" class="form-control" id="prix_a"
                                                placeholder="Enter le prix d'achat" name="prix_a" 
                                                value="<?= $r->prix_a ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="prix_v">Prix Vente</label>
                                            <input type="number" class="form-control" id="prix_v"
                                                placeholder="Enter le prix de vente" name="prix_v" 
                                                value="<?= $r->prix_v ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="qte">Quantite de Stock</label>
                                            <input type="number" class="form-control" id="qte"
                                                placeholder="Enter la quantite de stock" name="qte" 
                                                value="<?= $r->qte ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="categorie" class="text-dark font-weight-medium">Categorie de
                                                produit</label>
                                            <select class="form-control" id="categorie" name="categorie">
                                                <?php 
                                                $liste = categorie::afficheCat_Produit();
                                                $i=1;
                                                foreach($liste as $i=>$p){
                                                  if($p->id_cat == $r->id_cat){
                                                ?>
                                                <option value="<?= $p->id_cat ?>" selected><?= $p->reference ?></option>
                                                <?php }else{ ?>
                                                  <option value="<?= $p->id_cat ?>"><?= $p->reference ?></option>
                                                <?php }} ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea 
                                            class="form-control" 
                                            id="description" rows="3" 
                                            name="description"
                                            placeholder="Enter le Description du produit"
                                            ><?= $r->desc ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="photo">Photo</label>
                                            <input type="file" class="form-control-file" id="photo" name="photo">
                                        </div>
                                        <div class="form-footer mt-6">
                                            <input type="submit" name="submit" class="btn btn-primary btn-pill"
                                                value="Submit">
                                            <input type="reset" class="btn btn-light btn-pill" value="Cancel">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require "../index/jslinks.html";?>
    <script>
    document.querySelector(".page-title").innerHTML = "Produit";
    </script>

</body>

</html>