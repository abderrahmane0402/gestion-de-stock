<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
    
<?php require "../index/head.html" ?>
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
    <?php require "../index/nav.html" ?>
      <div class="page-wrapper">
    
      <?php require "../index/header.php" ?>
        <div class="content-wrapper">
          <div class="content">
            <div class="row">
              <div class="col-xl-12">
                <!-- Basic Table-->
                <div class="card card-default">
                  <div class="card-header">
                    <h2>Liste des approvisionnement</h2>
                    <a class="btn btn-outline-secondary" href="ajout.php" >Ajouter un approvisionnement </a>
                  </div>
                  <div class="card-body">
                    <div class="col-3">
                      <input type="text" class="form-control" id="search" placeholder="Search">
                    </div>
                    <br>
                    <table class="table table-bordered" id="table">
                      <thead>
                        <tr>
                          <th scope="col">le numero</th>
                          <th scope="col">la date</th>
                          <th scope="col">fournisseur</th>
                          <th scope="col">produit</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          require_once "../class/approvisionnement.php";
                          $liste = approvisionnement::afficheApr();
                          $i=1;
                          foreach($liste as $i=>$p){
                        ?>
                        <tr>
                          <td scope="row"><?= $p->num_Apr ?></td>
                          <td><?= $p->date ?></td>
                          <td><?= $p->frns ?></td>
                          <th class="text-center">
                            <a href="afficheProd.php?id=<?= $p->num_Apr ?>">
                              <i class="mdi mdi-open-in-new"></i>
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
    <script src="../plugins/jquery/jquery.min.js"></script>
                    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
                    <script src="../plugins/simplebar/simplebar.min.js"></script>
                    <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>

                    
                    
                    <script src="../plugins/prism/prism.js"></script>
                    
                    
                    
                    <script src="../plugins/toaster/toastr.min.js"></script>

                    
                    
                    <script src="../js/mono.js"></script>
                    <script src="../js/chart.js"></script>
                    <script src="../js/map.js"></script>
                    <script src="../js/custom.js"></script>
                    <script src="../js/myjs.js"></script>
                    <script src="../js/search.js"></script>
                    <script>
      document.querySelector(".page-title").innerHTML = "Approvisionnement";
    </script>
                    


                    <!--  -->
  </body>
</html>
