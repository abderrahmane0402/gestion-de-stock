<?php 
  require_once "../class/fournisseur.php";
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
              <i class="mdi mdi-checkbox-marked-outline"></i> SUCCESS !!! fournisseur supprimer 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
          <?php } ?>
          <?php if($statue == "u"){ ?>
            <div class="alert alert-success alert-icon" role="alert">
              <i class="mdi mdi-checkbox-marked-outline"></i> SUCCESS !!! fournisseur Modifier 
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
                    <h2>Liste des fournisseurs</h2>
                    <a class="btn btn-outline-secondary""  href="ajout.php" >Ajouter un fournisseur </a>
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
                          <th scope="col">nom</th>
                          <th scope="col">adresse</th>
                          <th scope="col">telephone</th>
                          <th scope="col">email</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          require_once "../class/fournisseur.php";
                          $liste = fournisseur::afficheFourni();
                          $i=1;
                          foreach($liste as $i=>$p){
                        ?>
                        <tr>
                          <td scope="row"><?= $p->id ?></td>
                          <td><?= $p->nom ?></td>
                          <td><?= $p->adresse ?></td>
                          <td><?= "0".$p->tele ?></td>
                          <td><?= $p->email ?></td>
                          <th class="text-center">
                            <a href="update.php?id=<?= $p->id ?>">
                              <i class="mdi mdi-open-in-new"></i>
                            </a>
                            <a href="delete.php?id=<?= $p->id ?>" onclick="return confirm('confirmer la suppression');">
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
      document.querySelector(".page-title").innerHTML = "fournisseur";
    </script>
                    


                    <!--  -->
  </body>
</html>
