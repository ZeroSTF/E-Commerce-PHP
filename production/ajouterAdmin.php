<?php

include '../Controller/utilisateurC.php';

$error = "";

// create client
$client = null;

// create an instance of the controller
$clientC = new ClientC();
if (
    isset($_POST["Nom_c"]) &&
    isset($_POST["Prenom_c"]) &&
    isset($_POST["numero_c"]) &&
    
    isset($_POST["login"]) &&
    isset($_POST["mdp"])
) {
    if (
        !empty($_POST['Nom_c']) &&
        !empty($_POST["Prenom_c"]) &&
        !empty($_POST["numero_c"]) &&
       
        !empty($_POST["login"]) &&
        !empty($_POST["mdp"]) 
    ) {
        $client = new client(
            null,
            $_POST['Nom_c'],
            $_POST['Prenom_c'],
            $_POST['numero_c'],
            0,
            $_POST['email_c'],
            $_POST['login'],
            $_POST['mdp'],
            null
        );
        $clientC->addClient($client);
        header('Location:table-admin.php');
    } else
        $error = "Missing information";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Mattys</title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"> <span style="margin-left: 54px;">Mattys</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="images/logo.svg" alt="..." class="img-circle profile_img" style="margin-top: 13px;">
            </div>
            <div class="profile_info">

              <h2>Welcome </h2>

            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="index.html">Dashboard</a></li>

                  </ul>
                </li>


                <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">                    
                    <li><a href="table-categorie.php">Categories</a></li>
                    <li><a href="afficherproduit.php">Produit</a></li>
                    <li><a href="table-admin.php">Admins</a></li>
                    <li><a href="table-client.php">Clients</a></li>
                    <li><a href="table-forum.html">Avis</a></li>
                    <li><a href="table-forum.html">Tables</a></li>
                    <li><a href="table-forum.html">Reservations</a></li>
                    <li><a href="table-forum.html">Confirmations</a></li>

                  </ul>
                </li>

              </ul>
            </div>
          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock" href="../feane/index.php">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="../feane/logout.php">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
          <nav class="nav navbar-nav">
            <ul class=" navbar-right">
              <li class="nav-item dropdown open" style="padding-left: 15px;">
                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown"
                  data-toggle="dropdown" aria-expanded="false">
                  <img src="images/img.jpg" alt="">John Doe
                </a>
                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="../feane/index.php"> Profile</a>
                  <a class="dropdown-item" href="javascript:;">
                    <span class="badge bg-red pull-right">50%</span>
                    <span>Settings</span>
                  </a>
                  <a class="dropdown-item" href="javascript:;">Help</a>
                  <a class="dropdown-item" href="../feane/logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                </div>
              </li>

              <li role="presentation" class="nav-item dropdown open">
                <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown"
                  aria-expanded="false">
                  <i class="fa fa-envelope-o"></i>
                  <span class="badge bg-green">6</span>
                </a>
                <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                  <li class="nav-item">
                    <a class="dropdown-item">
                      <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="dropdown-item">
                      <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="dropdown-item">
                      <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="dropdown-item">
                      <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <div class="text-center">
                      <a class="dropdown-item">
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                      </a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          






          <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Update Admin</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                        class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#">Settings 1</a>
                      <a class="dropdown-item" href="#">Settings 2</a>
                    </div>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
             
    

        <form action="" method="POST">
                 <table class="table table-striped">
                 <tr>
                    <td>
                        <label for="Nom_c">Nom :
                        </label>
                    </td>
                    <td><input type="text" name="Nom_c" id="Nom_c" ></td>
                </tr>
                <tr>
                    <td>
                        <label for="Prenom_c">Prenom :
                        </label>
                    </td>
                    <td><input type="text" name="Prenom_c" id="Prenom_c" ></td>
                </tr>
                <tr>
                    <td>
                        <label for="numero_c">Numero :
                        </label>
                    </td>
                    <td>
                        <input type="text" name="numero_c"  id="numero_c">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email_c">Email :
                        </label>
                    </td>
                    <td>
                        <input type="text" name="email_c"  id="email_c" >
                    </td>
                </tr>
               
                <tr>
                    <td>
                        <label for="login">Identifiant :
                        </label>
                    </td>
                    <td>
                        <input type="text" name="login" id="login" >
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="mdp">Mot De Passe :
                        </label>
                    </td>
                    <td>
                        <input type="text" name="mdp" id="mdp" >
                    </td>
                </tr>
                <tr align="center">
                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </tr>
                  
                 
          
        
                </table>
    </form>
    
              </div>
            </div>
          </div>

        </div>


      </div>
      <!-- /page content -->

      <!-- footer content -->
      <footer>
        <div class="pull-right">
          Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>

  <!-- jQuery -->
  <script src="../vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- FastClick -->
  <script src="../vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="../vendors/nprogress/nprogress.js"></script>
  <!-- iCheck -->
  <script src="../vendors/iCheck/icheck.min.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="../build/js/custom.min.js"></script>
</body>

</html>