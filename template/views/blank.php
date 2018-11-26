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
            <li class="breadcrumb-item active">Blank Page</li>
          </ol>

          <!-- Page Content -->
          <h1>Blank Page</h1>
          <hr>
          <p>This is a great starting point for new custom pages.</p>

        </div>
        <!-- /.container-fluid -->

<?php include 'commom/footer.php'; ?>
