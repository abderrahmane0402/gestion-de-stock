<?php
require_once "../class/produit.php";
require_once "../class/categorie.php";
require_once "../class/commande.php";
require_once "../class/client.php";
session_start();
extract($_POST);
$total = 0;
?>

<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Mono - Responsive Admin & Dashboard Template</title>

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
    <link href="../plugins/material/css/materialdesignicons.min.css" rel="stylesheet" />
    <link href="../plugins/simplebar/simplebar.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- PLUGINS CSS STYLE -->
    <link href="../plugins/nprogress/nprogress.css" rel="stylesheet" />

    <!-- MONO CSS -->
    <link id="main-css-href" rel="stylesheet" href="../css/style.css" />




    <!-- FAVICON -->
    <link href="../images/favicon.png" rel="shortcut icon" />

    <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <script src="../plugins/nprogress/nprogress.js"></script>
</head>


<body class="navbar-fixed sidebar-fixed" id="body">
    <script>
    NProgress.configure({
        showSpinner: false
    });
    NProgress.start();
    </script>



    <!-- ====================================
    ——— WRAPPER
    ===================================== -->
    <div class="wrapper">


        <!-- ====================================
          ——— LEFT SIDEBAR WITH OUT FOOTER
        ===================================== -->

        <?php require "../index/nav.html"; ?>

        <!-- ====================================
      ——— PAGE WRAPPER
      ===================================== -->
        <div class="page-wrapper">

            <!-- Header -->
            <?php require "../index/header.php"; ?>
            <!-- ====================================
        ——— CONTENT WRAPPER
        ===================================== -->
            <div class="content-wrapper">
                <div class="content">
                    <div class="invoice-wrapper rounded border bg-white py-5 px-3 px-md-4 px-lg-5 mb-6" id="facture">
                        <div class="d-flex justify-content-between">
                            <h2 class="text-dark font-weight-medium">FACTURE</h2>
                                <button class="btn btn-sm btn-light confirme">
                                <i class="mdi mdi-content-save"></i>Valider</button>
                        </div>
                        <div class="table-responsive">
                            
                        <form action="confirmer.php" method="post" id="confirm_fac">
                            <table class="table mt-3 table-striped" style="width:100%">
                                <thead>
                                    
                                    <tr>
                                        <th>#</th>
                                        <th>Produit</th>
                                        <th>libelle</th>
                                        <th>Quantity</th>
                                        <th>Prix unitaire</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    
                                    
                                    <?php 
                                        for ($i=0; $i < count($produits); $i++) { 
                                        $p = produit::getProduit($produits[$i]);
                                        $total += $p->prix_u * $quantite[$i];
                                    ?>
                                    <input type="hidden" name="produits[]" value="<?= $p->reference ?>">
                                    <input type="hidden" name="qte[]" value="<?= $quantite[$i] ?>">
                                    <tr>
                                        <td><?= $p->reference ?></td>
                                        <td><img height=50 src="<?= $p->photo ?>" alt="produit"></td>
                                        <td><?= $p->libelle ?></td>
                                        <td><?= $quantite[$i]?></td>
                                        <td><?= $p->prix_u ?></td>
                                        <td><?= $p->prix_u * $quantite[$i] ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                                    </form>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-lg-5 col-xl-4 col-xl-3 ml-sm-auto">
                                <ul class="list-unstyled mt-4">
                                    <li class="pb-3 text-dark">Total
                                        <span class="d-inline-block float-right"><?= $total ?></span>
                                    </li>
                                </ul>
                                <!-- <a href="#" class="btn btn-block mt-2 btn-lg btn-primary btn-pill"> Procced to
                                    Payment</a> -->
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


    <script src="../js/mono.js"></script>
    <script src="../js/chart.js"></script>
    <script src="../js/map.js"></script>
    <script src="../js/custom.js"></script>

    <script>
        let panier = localStorage;
        panier.clear();
        let fac = document.getElementById("confirm_fac");
        let facture = document.getElementById("facture");
        let con = document.querySelector(".confirme");
        con.addEventListener("click",()=>{
            html2pdf().from(facture).save();
            setTimeout(() => {
                fac.submit();
            }, 1000);
        });
    </script>


    <!--  -->


</body>

</html>