<?php session_start() ?>
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

    <div id="toaster"></div>

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
              <div class="col-xl-3 col-sm-6">
                <div class="card card-default card-mini">
                  <div class="card-header">
                    <h2>$18,699</h2>
                    <div class="dropdown">
                      <a
                        class="dropdown-toggle icon-burger-mini"
                        href="#"
                        role="button"
                        id="dropdownMenuLink"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                      >
                      </a>

                      <div
                        class="dropdown-menu dropdown-menu-right"
                        aria-labelledby="dropdownMenuLink"
                      >
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#"
                          >Something else here</a
                        >
                      </div>
                    </div>
                    <div class="sub-title">
                      <span class="mr-1">Sales of this year</span> |
                      <span class="mx-1">45%</span>
                      <i class="mdi mdi-arrow-up-bold text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6">
                <div class="card card-default card-mini">
                  <div class="card-header">
                    <h2>$14,500</h2>
                    <div class="dropdown">
                      <a
                        class="dropdown-toggle icon-burger-mini"
                        href="#"
                        role="button"
                        id="dropdownMenuLink"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                      >
                      </a>

                      <div
                        class="dropdown-menu dropdown-menu-right"
                        aria-labelledby="dropdownMenuLink"
                      >
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#"
                          >Something else here</a
                        >
                      </div>
                    </div>
                    <div class="sub-title">
                      <span class="mr-1">Expense of this year</span> |
                      <span class="mx-1">50%</span>
                      <i class="mdi mdi-arrow-down-bold text-danger"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6">
                <div class="card card-default card-mini">
                  <div class="card-header">
                    <h2>$4199</h2>
                    <div class="dropdown">
                      <a
                        class="dropdown-toggle icon-burger-mini"
                        href="#"
                        role="button"
                        id="dropdownMenuLink"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                      >
                      </a>

                      <div
                        class="dropdown-menu dropdown-menu-right"
                        aria-labelledby="dropdownMenuLink"
                      >
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#"
                          >Something else here</a
                        >
                      </div>
                    </div>
                    <div class="sub-title">
                      <span class="mr-1">Profit of this year</span> |
                      <span class="mx-1">20%</span>
                      <i class="mdi mdi-arrow-down-bold text-danger"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6">
                <div class="card card-default card-mini">
                  <div class="card-header">
                    <h2>$20,199</h2>
                    <div class="dropdown">
                      <a
                        class="dropdown-toggle icon-burger-mini"
                        href="#"
                        role="button"
                        id="dropdownMenuLink"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                      >
                      </a>

                      <div
                        class="dropdown-menu dropdown-menu-right"
                        aria-labelledby="dropdownMenuLink"
                      >
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#"
                          >Something else here</a
                        >
                      </div>
                    </div>
                    <div class="sub-title">
                      <span class="mr-1">Revenue of this year</span> |
                      <span class="mx-1">35%</span>
                      <i class="mdi mdi-arrow-up-bold text-success"></i>
                    </div>
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
      document.querySelector(".page-title").innerHTML = "Dashboard";
    </script>

    <!--  -->
  </body>
</html>
