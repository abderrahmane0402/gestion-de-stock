<?php
require_once "../class/fournisseur.php";
if(isset($_POST['submit'])){
  extract($_POST);
  $fournisseur = new fournisseur(NULL,$nom,$adresse,$telephone,$email);
  $fournisseur->addFourni();
  $statue = true;
}else{
  $statue = false;
}
session_start();
?>
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
          <?php if($statue == true){ ?>
            <div class="alert alert-success alert-icon" role="alert">
              <i class="mdi mdi-checkbox-marked-outline"></i> SUCCESS !!! le fournisseur a ete ajouter  
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
                    <h2>Ajouter un fournisseur</h2>
                  </div>
                  <div class="card-body">
                    <form method="post">
                      <div class="form-group">
                        <label for="nom">
                          Nom fournisseur
                        </label>
                        <input
                          type="text"
                          class="form-control"
                          id="nom"
                          placeholder="Enter le nom"
                          name="nom"
                        />
                      </div>
                      <div class="form-group">
                        <label for="adresse">Adresse</label>
                        <input
                          type="text"
                          class="form-control"
                          id="adresse"
                          placeholder="Adresse"
                          name="adresse"
                        />
                      </div>
                      <div class="form-group">
                        <label for="telephone">Telephone</label>
                        <input
                          type="number"
                          class="form-control"
                          id="telephone"
                          placeholder="telephone"
                          name="telephone"
                        />
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input
                          type="email"
                          class="form-control"
                          id="email"
                          placeholder="Email"
                          name="email"
                        />
                      </div>
                      <div class="form-footer mt-6">
                        <input type="submit" name="submit" class="btn btn-primary btn-pill" value="Submit">
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
      document.querySelector(".page-title").innerHTML = "fournisseur";
    </script>
    
  </body>
</html>
