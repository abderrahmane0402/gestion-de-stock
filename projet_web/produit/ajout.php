<?php
require_once "../class/produit.php";
require_once "../class/categorie.php";
session_start();
if(isset($_POST['submit'])){
  extract($_POST);
  $photo = $_FILES['photo'];
  $filename=$photo['tmp_name'];
  $extension = pathinfo($photo['name'] , PATHINFO_EXTENSION);
  $destination = "../images/produit/$libelle.$extension";
  move_uploaded_file($filename,$destination);
  $produit = new produit(NULL,$categorie,$libelle,$prix_u,$qte,$prix_a,$prix_v,$destination,$description);
  $produit->addProduit();
  $statue = true;
}else{
  $statue = false;
}
?>
<!DOCTYPE html>
<html>

<head>
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
    <link href="../plugins/material/css/materialdesignicons.min.css" rel="stylesheet" />
    <link href="../plugins/simplebar/simplebar.css" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="../plugins/nprogress/nprogress.css" rel="stylesheet" />


    <link href="../plugins/prism/prism.css" rel="stylesheet" />



    <link href="../plugins/select2/css/select2.min.css" rel="stylesheet" />

    <link href="../plugins/bootstrap-select/bootstrap-select-1.13.14/dist/css/bootstrap-select.min.css"
        rel="stylesheet" />


    <!-- MONO CSS -->
    <link id="main-css-href" rel="stylesheet" href="../css/style.css" />




    <!-- FAVICON -->
    <link href="../images/favicon.png" rel="shortcut icon" />

    <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <script src="../plugins/nprogress/nprogress.js"></script>
    <style>
        
.dropdown{
  width: 100%!important;
}
    </style>
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
                <?php if($statue == true){ ?>
                <div class="alert alert-success alert-icon" role="alert">
                    <i class="mdi mdi-checkbox-marked-outline"></i> SUCCESS !!! le produit a ete ajouter
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <?php } ?>
                <div class="content">
                    <div class="row">
                        <div class="col-xl-12">
                            <!-- Basic Examples -->
                            <div class="card card-default">
                                <div class="card-header">
                                    <h2>Ajouter un produit</h2>
                                </div>
                                <div class="card-body">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="libelle">
                                                Libelle produit
                                            </label>
                                            <input type="text" class="form-control" id="libelle"
                                                placeholder="Enter le libelle" name="libelle" />
                                        </div>
                                        <div class="form-group">
                                            <label for="prix_u">Prix Unitaire</label>
                                            <input type="number" class="form-control" id="prix_u"
                                                placeholder="Enter le prix unitaire" name="prix_u" />
                                        </div>
                                        <div class="form-group">
                                            <label for="prix_a">Prix Achat</label>
                                            <input type="number" class="form-control" id="prix_a"
                                                placeholder="Enter le prix d'achat" name="prix_a" />
                                        </div>
                                        <div class="form-group">
                                            <label for="prix_v">Prix Vente</label>
                                            <input type="number" class="form-control" id="prix_v"
                                                placeholder="Enter le prix de vente" name="prix_v" />
                                        </div>
                                        <div class="form-group">
                                            <label for="qte">Quantite de Stock</label>
                                            <input type="number" class="form-control" id="qte"
                                                placeholder="Enter la quantite de stock" name="qte" />
                                        </div>
                                        <div class="form-group">
                                            <label for="categorie" class="text-dark font-weight-medium">Categorie de
                                                produit</label>
                                            <select class="form-control" id="categorie" name="categorie">
                                                <?php 
                                                $liste = categorie::afficheCat_Produit();
                                                $i=1;
                                                foreach($liste as $i=>$p){
                                                ?>
                                                <option value="<?= $p->id_cat ?>"><?= $p->reference ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea 
                                            class="form-control" 
                                            id="description" rows="3" 
                                            name="description"
                                            placeholder="Enter le Description du produit"
                                            ></textarea>
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
    <script src="../plugins/jquery/jquery.min.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../plugins/simplebar/simplebar.min.js"></script>
    <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>



    <script src="../plugins/prism/prism.js"></script>



    <script src="../plugins/select2/js/select2.min.js"></script>



    <script src="../plugins/jquery-mask-input/jquery.mask.min.js"></script>

    <script src="../plugins/bootstrap-select/bootstrap-select-1.13.14/dist/js/bootstrap-select.min.js"></script>


    <script src="../js/mono.js"></script>
    <script src="../js/chart.js"></script>
    <script src="../js/map.js"></script>
    <script src="../js/custom.js"></script>
    <script>
    document.querySelector(".page-title").innerHTML = "Produit";

    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
    </script>
</body>

</html>