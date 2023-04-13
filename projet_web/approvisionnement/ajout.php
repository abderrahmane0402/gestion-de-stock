<?php
session_start();
require_once "../class/produit.php";
require_once "../class/categorie.php";
require_once "../class/approvisionnement.php";
require_once "../class/fournisseur.php";
if(isset($_POST['submit'])){
  extract($_POST);
  $approvisionnement = new approvisionnement($num_cmd,$date,$client);
  $approvisionnement->addApr();
  $key=1;$i=0;
  foreach ($produits as $key => $prd) {
    $approvisionnement->addApr_produit($prd,$quantite[$i]);
    $i+=1;
  }
  $statue = true;
}else{
  $statue = false;
}
?>
<!DOCTYPE html>
<html lang="en">

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
        body{
  overflow: hidden;
        }
    .dropdown {
        width: 100% !important;
    }

    .produit-liste {
        width: 90%;
        height: auto;
        max-height: 650px;
        position: absolute;
        top: 70%;
        left: 50%;
        transform: translate(-50%, -50%);
        overflow: auto;
        display: none;
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
                    <i class="mdi mdi-checkbox-marked-outline"></i> SUCCESS !!! le Approvisionnement a ete ajouter
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
                                    <h2>Ajouter un approvisionnement</h2>
                                </div>
                                <div class="card-body">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="num_cmd">Numero de approvisionnement</label>
                                            <input type="number" class="form-control" id="num_cmd"
                                                placeholder="Enter la numero d'approvisionnement" name="num_cmd" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="date">Date</label>
                                            <input type="date" class="form-control" id="date"
                                                placeholder="Enter la date" name="date" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="client">Client</label>
                                            <select class="selectpicker" data-live-search="true"
                                                name="client" required>
                                                <?php
                                                    $liste = fournisseur::afficheFourni();
                                                    $i=1;
                                                    foreach($liste as $i=>$p){
                                                ?>
                                                <option value="<?= $p->id ?>"><?= $p->nom ?>-<?= "0".$p->tele ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <!-- <div class="form-group">
                                            <button type="button" class="btn btn-info" id="produits">Taper pour
                                                selectioner les
                                                produits</button>
                                        </div>
                                        <div class="produit-liste">
                                            <div class="col-xl-12">
                                                <div class="card card-default" id="liste-p"
                                                    style="
                                                    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;transform: rotateY(90deg);transition:all 1s ease 0s;">
                                                    <div class="card-header">
                                                        <h2>Liste des Produits</h2>
                                                        <a href="#" class="btn btn-outline-secondary"
                                                            id="close-button">X</a>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="col-3">
                                                            <input type="text" class="form-control" id="search"
                                                                placeholder="Search">
                                                        </div>
                                                        <br>
                                                        <table class="table table-bordered" id="table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col"></th>
                                                                    <th scope="col">photo</th>
                                                                    <th scope="col">libelle</th>
                                                                    <th scope="col">prix unitaire</th>
                                                                    <th scope="col">categorie</th>
                                                                    <th scope="col">qte</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php 
                                                                  require_once "../class/Produit.php";
                                                                  $liste = Produit::afficheProduitWithCat();
                                                                  $i=1;
                                                                  foreach($liste as $i=>$p){
                                                                ?>
                                                                <tr>
                                                                    <td><input type="checkbox" name="produits[]"
                                                                            value="<?= $p->reference ?>"
                                                                            onclick="qte_open(this)"></td>
                                                                    <td><img height=50 src="<?= $p->photo ?>"
                                                                            alt="produit"></td>
                                                                    <td><?= $p->libelle ?></td>
                                                                    <td><?= $p->prix_u ?></td>
                                                                    <td><?= $p->id_cat ?></td>
                                                                    <td><?= $p->qte ?></td>
                                                                    <td>
                                                                        <div class="form-group">
                                                                            <input type="number" class="form-control"
                                                                                id="quantite"
                                                                                placeholder="Enter le quantite"
                                                                                name="quantite[]"
                                                                                maxlength="999999"
                                                                                min="1"
                                                                                disabled />
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="form-group">
                                            <button type="button" class="btn btn-info" data-toggle="modal"
                                                data-target="#exampleModalLong">Taper pour
                                                selectioner les
                                                produit
                                            </button>
                                            <div class="modal fade bd-example-modal-lg" id="exampleModalLong"
                                                tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Liste des
                                                                produits
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <div class="col-3">
                                                            <input type="text" class="form-control" id="search"
                                                                placeholder="Search">
                                                        </div>
                                                        <br>
                                                            <table class="table table-bordered" id="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col"></th>
                                                                        <th scope="col">photo</th>
                                                                        <th scope="col">libelle</th>
                                                                        <th scope="col">prix unitaire</th>
                                                                        <th scope="col">categorie</th>
                                                                        <th scope="col">qte</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php 
                                                                  require_once "../class/Produit.php";
                                                                  $liste = Produit::afficheProduitWithCat();
                                                                  $i=1;
                                                                  foreach($liste as $i=>$p){
                                                                ?>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="produits[]"
                                                                                value="<?= $p->reference ?>"
                                                                                onclick="qte_open(this)"></td>
                                                                        <td><img height=50 src="<?= $p->photo ?>"
                                                                                alt="produit"></td>
                                                                        <td><?= $p->libelle ?></td>
                                                                        <td><?= $p->prix_u ?></td>
                                                                        <td><?= $p->id_cat ?></td>
                                                                        <td><?= $p->qte ?></td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="number"
                                                                                    class="form-control" id="quantite"
                                                                                    placeholder="Enter le quantite"
                                                                                    name="quantite[]"
                                                                                    maxlength="<?= $p->qte ?>" min="1"
                                                                                    disabled />
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger btn-pill"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary btn-pill" data-dismiss="modal">Save
                                                                Changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
    <script src="../js/search.js"></script>
    <script src="../js/myjs.js"></script>
    <script src="../js/emb_table.js"></script>


    <script>
    document.querySelector(".page-title").innerHTML = "Approvisionnement";

    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
    </script>
</body>

</html>