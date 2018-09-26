<?php

  include("util/phplib.php");
    
  checkIfLogged();


  $err = false;
  $success = false;

  if(isset($_GET['id'])){

      $getID = $_GET['id'];

    } else {

      $err = true;

    }

  if($_SERVER['REQUEST_METHOD'] == 'POST'){


    if(isset($_POST['Nome'])){

      $nomeUpdated = sanitize($_POST['Nome'], $conn);

    } else {

      $err = true;

    }

    if(!$err){

      $sql = "UPDATE categoria SET Categoria = ".$nomeUpdated." WHERE ID = ".$getID;
      $conn->query($sql);
      $success = true;
      
    }

  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Landor managment System</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <?php include('navbar.php') ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../index.php">.nobody&co.</a>
        </li>
        <li class="breadcrumb-item active">Modifica una Categoria</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-lg-12">

          <?php

          if($success){

          ?>
          <div class="alert alert-success" role="alert">
            Record aggiornato correttamente!
          </div>
          <?php
          }
          ?>
          <div class="card mx-auto">
              <div class="card-body">
                <form method="POST">
                  <div class="form-group">
                    <div class="form-row">
                      <div class="col-md-6">
                        <label for="InputCategory">Nome della Categoria</label>
                        <?php


                        $sql = 'SELECT * FROM Categoria WHERE ID = '.$getID;

                        $result = $conn->query($sql) or die ($conn->error);

                        $row = $result->fetch_array();

                        ?>
                        <input class="form-control" id="InputCategory" type="number" aria-describedby="categoryHelp" placeholder="Inserisci il nome della categoria" name="Nome" value="<?php echo $row['Categoria'] ?>" required>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <hr>
                  <button class="btn btn-primary btn-block" type="submit" name="submit">Aggiorna l' Archivio</button>
                </form>
              </div>
            </div>
          </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Landor Managment System</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pronto ad Uscire?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Premi "Logout" qui sotto per concludere la Sessione</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Annulla</button>
            <a class="btn btn-primary" href="util/logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
  </div>
</body>

</html>
