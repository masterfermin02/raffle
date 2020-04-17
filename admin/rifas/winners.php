<?php
session_start();
if (!$_SESSION['auth'] == 1) {
  header("location: ../");
}
require_once("../../classes/global.php");

$id = $_GET['id'];

$sql = "SELECT content FROM raffle_details where raffle_id = $id and winner = 1";
$res = $db->query($sql);


?><!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once("../includes/header.php"); ?>
</head>

<body id="page-top" class="sidebar-toggled">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="#">Rifas Sistem</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <?php require_once("../includes/navbar.php"); ?>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->  
    <?php require_once("../includes/menu.php"); ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Listado</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i> Listado de ganadores</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
				  <th>Ganadores</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    if ($res->num_rows > 0) {
                      while ($row = $res->fetch_assoc()) {
						  
						echo "<tr >";
                        echo "<th> <img src='../../uploads/{$row['content']}' alt='{$row['content']}' width='500'> </th>";
                        
                        echo "</tr>";
                      }
                    } else {
                      echo "<tr><th>No hay datos</th></tr>";
                    }
                    ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Rifas 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- LOGOUT MODAL-->
  <?php require_once("../modals/logout.php"); ?>


  <!-- SETTINGS MODAL-->
  <?php require_once("../modals/settings.php"); ?>


  <?php require_once("../includes/footer.php"); ?>


  <script>
    const removeRaffle = (id) => {
      $.ajax({
            url: '../../classes/delete_raffle.php',
            data: {'id': id},
            type: 'POST',     
            success: function(res){
              // let data = JSON.parse(res);
              if (res == 1) {
                location.reload();
              }
            }
      });
    };


    const activateRaffle = (id) => {
      $.ajax({
            url: '../../classes/active_raffle.php',
            data: {'id': id},
            type: 'POST',     
            success: function(res){
              // let data = JSON.parse(res);
              if (res == 1) {
                location.reload();
              }
            }
      });
    };

  </script>
  
</body>

</html>
