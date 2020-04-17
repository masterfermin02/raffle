<?php
session_start();
if (!$_SESSION['auth'] == 1) {
  header("location: ../");
}
require_once("../../classes/global.php");

$sql = "SELECT `id`, `name`, `logo`, `active` FROM raffle where deleted_at is null";
$header = "SELECT `id`, `name`, `logo` FROM raffle where deleted_at is null";

$res = $db->query($sql);
$key = $db->query($header);
@$keys = array_keys($key->fetch_assoc());


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
            <i class="fas fa-table"></i> Listado de rifas</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <?php
                    if ($keys) {
                      foreach ($keys as $key => $value) {
                        echo "<th>{$value}</th>";
                      }
                    }
                    ?>
                    <th width="20%">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    if ($res->num_rows > 0) {
                      while ($row = $res->fetch_assoc()) {

                        $class = $row['active'] == "0" ? 'table-danger' : 'table-success';

                        echo "<tr class='{$class}'>";
                        echo "<th>{$row['id']}</th>";
                        echo "<td>{$row['name']}</td>";
                        echo "<th> <img src='../../uploads/{$row['logo']}' alt='{$row['logo']}' height='50' width='50'> </th>";
                        echo "<td><button class='btn btn-outline-danger btn-event' onclick='removeRaffle({$row['id']})'>Borrar</button> | <button class='btn btn-outline-warning btn-event' onclick='activateRaffle({$row['id']})'>Activar</button>|<a class='btn btn-outline-warning btn-event' href='./winners.php?id={$row['id']}' >Ver Ganadores</a></td>";
                        echo "</tr>";
                      }
                    } else {
                      echo "<tr><th>No hay datos, Crear una rifa <a href='create.php' class='btn btn-outline-primary'>Crear Rifa</a></th></tr>";
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
