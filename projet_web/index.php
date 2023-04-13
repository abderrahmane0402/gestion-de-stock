<?php
if(isset($_GET['statue'])){
  $statue = $_GET['statue'];  
}else{
  $statue = NULL;
}
?>

<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">
  <head>
    <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />

      <title>Mono - Responsive Admin & Dashboard Template</title>

      <!-- GOOGLE FONTS -->
      <link
        href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto"
        rel="stylesheet"
      />
      <link
        href="plugins/material/css/materialdesignicons.min.css"
        rel="stylesheet"
      />
      <link href="plugins/simplebar/simplebar.css" rel="stylesheet" />

      <!-- PLUGINS CSS STYLE -->
      <link href="plugins/nprogress/nprogress.css" rel="stylesheet" />

      <!-- MONO CSS -->
      <link id="main-css-href" rel="stylesheet" href="css/style.css" />

      <!-- FAVICON -->
      <link href="images/favicon.png" rel="shortcut icon" />

      <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <script src="plugins/nprogress/nprogress.js"></script>
    </head>
  </head>
  <body class="bg-light-gray" id="body">
    <?php if($statue == 3){ ?>
    <div class="alert alert-danger alert-icon" role="alert">
      <i class="mdi mdi-diameter-variant"></i> wrong user or password
    </div>
    <?php } ?>
    <div
      class="container d-flex align-items-center justify-content-center"
      style="min-height: 100vh"
    >
      <div class="d-flex flex-column justify-content-between">
        <div class="row justify-content-center">
          <div class="col-lg-6 col-md-10">
            <div class="card card-default mb-0">
              <div class="card-header pb-0">
                <div
                  class="app-brand w-100 d-flex justify-content-center border-bottom-0"
                >
                  <a class="w-auto pl-0" href="/index.html">
                    <span class="brand-name text-dark">MY PROJET</span>
                  </a>
                </div>
              </div>
              <div class="card-body px-5 pb-5 pt-0">
                <h4 class="text-dark mb-6 text-center">Sign in</h4>
                <form action="login/login.php"  method="post">
                  <div class="row">
                    <div class="form-group col-md-12 mb-4">
                      <input
                        type="text"
                        class="form-control input-lg"
                        id="login"
                        name="login"
                        aria-describedby="emailHelp"
                        placeholder="email"
                      />
                    </div>
                    <div class="form-group col-md-12">
                      <input
                        type="password"
                        class="form-control input-lg"
                        name="password"
                        id="password"
                        placeholder="Password"
                      />
                    </div>
                    <div class="col-md-12">
                      <div class="d-flex justify-content-between mb-3">
                        <div class="custom-control custom-checkbox mr-3 mb-3">
                          <input
                            type="checkbox"
                            class="custom-control-input"
                            id="customCheck2"
                          />
                          <label class="custom-control-label" for="customCheck2"
                            >Remember me</label
                          >
                        </div>

                        <a class="text-color" href="#"> Forgot password? </a>
                      </div>

                      <button
                        type="submit"
                        class="btn btn-primary btn-pill mb-4"
                      >
                        Sign In
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
