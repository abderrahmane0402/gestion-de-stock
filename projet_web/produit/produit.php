<?php 
  include "../class/Produit.php";
  if(isset($_GET['statue'])){
    $statue = $_GET['statue'];
  }else{
    $statue = false;
  }
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <?php require "../index/head.html"; ?>
</head>
  <body class="navbar-fixed sidebar-fixed" id="body">
    <script>
      NProgress.configure({ showSpinner: false });
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
          <?php if($statue == "d"){ ?>
            <div class="alert alert-success alert-icon" role="alert">
              <i class="mdi mdi-checkbox-marked-outline"></i> SUCCESS !!! Produit supprimer 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
          <?php } ?>
          <?php if($statue == "u"){ ?>
            <div class="alert alert-success alert-icon" role="alert">
              <i class="mdi mdi-checkbox-marked-outline"></i> SUCCESS !!! Produit Modifier 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
          <?php } ?>
          <div class="content">
            <div class="row">
              <div class="col-xl-12">
                <!-- Basic Table-->
                <div class="card card-default">
                  <div class="card-header">
                    <h2>Liste des Produits</h2>
                    <a class="btn btn-outline-secondary""  href="ajout.php" >Ajouter un Produit </a>
                  </div>
                  <div class="card-body">
                    <div class="col-3">
                      <input type="text" class="form-control" id="search" placeholder="Search">
                    </div>
                    <br>
                    <table class="table table-bordered" id="table">
                      <thead>
                        <tr>
                          <th scope="col">#ID</th>
                          <th scope="col">photo</th>
                          <th scope="col">libelle</th>
                          <th scope="col">quantite</th>
                          <th scope="col">prix unitaire</th>
                          <th scope="col">prix achat</th>
                          <th scope="col">prix vente</th>
                          <th scope="col">categorie</th>
                          <th class="text-center">Action</th>
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
                          <td scope="row"><?= $p->reference ?></td>
                          <td><img height=50 src="<?= $p->photo ?>" alt="produit"></td>
                          <td><?= $p->libelle ?></td>
                          <td><?= $p->qte ?></td>
                          <td><?= $p->prix_u ?></td>
                          <td><?= $p->prix_a ?></td>
                          <td><?= $p->prix_v ?></td>
                          <td><?= $p->id_cat ?></td>
                          <th class="text-center">
                            <a href="update.php?id=<?= $p->reference ?>">
                              <i class="mdi mdi-open-in-new"></i>
                            </a>
                            <a href="delete.php?id=<?= $p->reference ?>" onclick="return confirm('confirmer la suprission');">
                              <i class="mdi mdi-close text-danger"></i>
                            </a>
                          </th>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
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
                    


                    <!--  -->
  </body>
</html>
