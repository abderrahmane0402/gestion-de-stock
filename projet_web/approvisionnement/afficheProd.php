<?php session_start() ?>
<!DOCTYPE html>
<html>
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
          <div class="content">
            <div class="row">
              <div class="col-xl-12">
                <!-- Basic Table-->
                <div class="card card-default">
                  <div class="card-header">
                    <h2>Liste des Produits</h2>
                  </div>
                  <div class="card-body">
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
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          require_once "../class/approvisionnement.php";
                          $liste = approvisionnement::afficheProduitWithCatF_n0($_GET['id']);
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
