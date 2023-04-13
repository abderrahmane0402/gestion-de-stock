<?php
include "../class/categorie.php";
if(isset($_POST['submit'])){
  extract($_POST);
  $categorie = new categorie($reference,NULL,$description);
  $categorie->addCat_Produit();
  $statue = true;
}else{
  $statue = false;
}
session_start();
?>
<!DOCTYPE html>
<html lang="en">
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
              <i class="mdi mdi-checkbox-marked-outline"></i> SUCCESS !!! le Categorie a ete ajouter  
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
                    <h2>Ajouter un Categorie</h2>
                  </div>
                  <div class="card-body">
                    <form method="post">
                      <div class="form-group">
                        <label for="reference">
                          Reference Categorie
                        </label>
                        <input
                          type="text"
                          class="form-control"
                          id="reference"
                          placeholder="Enter le Reference"
                          name="reference"
                        />
                      </div>
                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea 
                          class="form-control" 
                          id="description" rows="3" 
                          name="description"
                          placeholder="Enter le Description du categorie"
                        ></textarea>
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
      document.querySelector(".page-title").innerHTML = "Categorie";
    </script>
    
  </body>
</html>
