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
            <div class="card card-default">
              <div class="card-header">
                <h2>categories</h2>
                <form action="panier.php" method="post" id="panier">
                      <button id="panier">Saves</button>
                    </form>
              </div>
              <div class="card-body">
                <div class="row">
                <?php 
                  require_once "../class/categorie.php";
                  $liste = categorie::afficheCat_Produit();
                  $i=1;
                  foreach($liste as $i=>$p){
                ?>
                  <div class="col-lg-6 col-xl-3">
                    <div class="card mb-4 p-0">
                      <h5 class="card-title text-center  pt-4 px-6"><?= $p->reference ?></h5>
                      <div class="card-body text-center">
                        <a href="produits.php?id=<?= $p->id_cat ?>" class="btn btn-outline-primary">Consulter</a>
                      </div>
                    </div>
                  </div>
                <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php require "../index/jslinks.html";?>
    <script>
      let panier = localStorage;
      document.querySelector(".page-title").innerHTML = "Caisse";
      let panierr = document.querySelector("#panier");
      let input = "";
        for(let i=0;i<panier.length;i++){
            input += '<input type="hidden" name="produits[]" value="'+ panier.key(i) +'">';
            input += '<input type="hidden" name="quantite[]" value="'+ panier.getItem(panier.key(i)) +'">';
        }
        panierr.innerHTML += input;
    </script>

    <!--  -->
  </body>
</html>