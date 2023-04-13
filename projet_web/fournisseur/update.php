<?php 
    require_once "../class/fournisseur.php"; 
    extract($_POST);
    $r = fournisseur::getFourni($_GET['id']);
    if(isset($_POST['submit'])){
        $fournisseur = new fournisseur($r->id,$nom,$adresse,$telephone,$email);
        $fournisseur->updateFourni();
        header("location:fournisseur.php?statue=u");
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
                    <h2>Modifier un fournisseur</h2>
                  </div>
                  <div class="card-body">
                    <form method="post">
                      <div class="form-group">
                        <label for="nom">
                          Nom
                        </label>
                        <input
                          type="text"
                          class="form-control"
                          id="nom"
                          placeholder="Enter le nom"
                          name="nom"
                          value="<?= $r->nom ?>"
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
                          value="<?= $r->adresse ?>"
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
                          value="<?= $r->tele ?>"
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
                          value="<?= $r->email ?>"
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
