<?php 
    require_once "../class/categorie.php"; 
    extract($_POST);
    $r = categorie::getCat_Produit($_GET['id']);
    if(isset($_POST['submit'])){
        $categorie = new categorie($reference,$r->id_cat,$description);
        $categorie->updateCat_Produit();
        header("location:categorie.php?statue=u");
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
          <div class="content">
            <div class="row">
              <div class="col-xl-12">
                <!-- Basic Examples -->
                <div class="card card-default">
                  <div class="card-header">
                    <h2>Modifier un client</h2>
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
                          value="<?= $r->reference ?>"
                        />
                      </div>
                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea 
                          class="form-control" 
                          id="description" 
                          rows="3" 
                          name="description"
                          placeholder="Enter le Description du categorie"
                        ><?= $r->desc ?>
                        </textarea>
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
      document.querySelector(".page-title").innerHTML = "Client";
    </script>
    
  </body>
</html>
