<?php 
  require_once "../class/produit.php";
  session_start();
  $id_cat=$_GET['id'];
  $produits = produit::afficheProduitWithCat_n0_s($id_cat);
?>
<!DOCTYPE html>
<html>
  <head>
    <?php require "../index/head.html"; ?>
    <link rel="stylesheet" href="produits.css">
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
                    <h2>Les Produits informatique</h2>
                    <a href="caisse.php">Save</a>
                </div>
                <div class="card-body">
                    <div class="row">
                      <?php
                        $i=1;
                        foreach($produits as $i=>$p){
                      ?>
                        <div class="pr_card">
                            <img src="<?= $p->photo ?>" alt="ss" width=185 height=185  onclick="hide(this)">
                            <div><h5><?= $p->libelle ?></h5></div>
                            <div><?= $p->prix_u ?> DH</div>
                            <div><span id="qte"><?= $p->qte ?></span> article restants</div>
                            <div class="content_qte">
                              <div class="qte">
                                <span class="minus" onclick="mois(this)">-</span>
                                <span class="num">01</span>
                                <span class="plus" onclick="plus(this)">+</span>
                              </div>
                              <div class="btn-toolbar  mb-4 mr-3" role="toolbar" aria-label="Toolbar with button groups">
                                <div class="btn-group" role="group" aria-label="Third group" onclick="closee(this)">
                                  <button type="button" class="btn btn-primary">x</button>
                                </div>
                                <div class="btn-group" role="group" aria-label="Third group" onclick="save_pr(this)">
                                  <input type="hidden" value="<?= $p->reference ?>">
                                  <button type="button" class="btn btn-primary"><span class="mdi mdi-check-outline"></span></button>
                                </div>
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
      document.querySelector(".page-title").innerHTML = "Caisse";
    </script>
    <script>
      let s = true;
var panier = localStorage;
const hide = (img) => {
  let x = img.parentNode.querySelector(".content_qte");
    img.style.display = "none";
    x.style.display = "flex";
    x.style.opacity = 1;
};
const plus = (button) =>{
  let qte =  button.parentNode.parentNode.parentNode.querySelector("#qte").innerText;
  let parent =  button.parentNode.querySelector(".num");
  let a=parseInt(parent.innerText);
  if(a<parseInt(qte)) a++;
  a = (a < 10) ? "0" + a : a;
  parent.innerText = a;
}
const mois = (button) =>{
  let parent =  button.parentNode.querySelector(".num");
  let a=parseInt(parent.innerText);
  if(a > 1){
    a--;  
    a = (a < 10) ? "0" + a : a;
    parent.innerText = a; 
  }
}
const closee = (button)=>{
  let parent =  button.parentNode.parentNode;
  let img =  button.parentNode.parentNode.parentNode.querySelector("img");
  let num =  button.parentNode.parentNode.parentNode.querySelector(".num");
  img.style.display = "";
  num.innerText = 01;
  parent.style.display = "none";
  parent.style.opacity = 0;
}
a=1;
const save_pr = (button)=>{
  let parent =  button.parentNode.parentNode;
  let img =  button.parentNode.parentNode.parentNode.querySelector("img");
  let num =  button.parentNode.parentNode.parentNode.querySelector(".num");
  let id = button.querySelector("input").value;
  panier.setItem(id,num.innerText);
  a++;
  img.style.display = "";
  num.innerText = 01;
  parent.style.display = "none";
  parent.style.opacity = 0;
}
    </script>
    <!--  -->
  </body>
</html>