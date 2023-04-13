<?php 
  include "../class/categorie.php";
  if(isset($_GET['statue'])){
    $statue = $_GET['statue'];
  }else{
    $statue = false;
  }
?>
<?php session_start() ?>
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
              <i class="mdi mdi-checkbox-marked-outline"></i> SUCCESS !!! Categorie supprimer 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
          <?php } ?>
          <?php if($statue == "u"){ ?>
            <div class="alert alert-success alert-icon" role="alert">
              <i class="mdi mdi-checkbox-marked-outline"></i> SUCCESS !!! Categorie Modifier 
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
                    <h2>Liste des Categorie</h2>
                    <a class="btn btn-outline-secondary""  href="ajout.php" >Ajouter un Categorie </a>
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
                          <th scope="col">Reference</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          require_once "../class/categorie.php";
                          $liste = categorie::afficheCat_Produit();
                          $i=1;
                          foreach($liste as $i=>$p){
                        ?>
                        <tr>
                          <td scope="row"><?= $p->id_cat ?></td>
                          <td><?= $p->reference ?></td>
                          <th class="text-center">
                            <a href="update.php?id=<?= $p->id_cat ?>">
                              <i class="mdi mdi-open-in-new"></i>
                            </a>
                            <a href="delete.php?id=<?= $p->id_cat ?>" onclick="return confirm('confirmer la supprision');">
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
      document.querySelector(".page-title").innerHTML = "Categorie des Produits";
    </script>
                    


                    <!--  -->
  </body>
</html>
