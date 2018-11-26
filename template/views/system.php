<?php

require_once '../../module/autoload_class.php';
require_once '../../module/validate_session.php';

include 'commom/header.php';

?>
  <body id="page-top">

    <?php include 'commom/navbar.php'; ?>

    <div id="wrapper">

      <?php include 'commom/sidebar.php'; ?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="home.php">Inicio</a>
            </li>
            <li class="breadcrumb-item active">Configuraciones del sistema</li>
          </ol>

          <!-- DataTables Rol de usuarios -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-users-cog"></i>
              Roles de usuarios</div>
            <div class="card-footer small text-muted" id="alert_message"></div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped row-border compact" id="rolUser" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Indicador</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Rol</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Indicador</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Rol</th>                    
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

<?php include 'commom/footer.php'; ?>
