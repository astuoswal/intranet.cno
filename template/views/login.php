<?php 
  include 'commom/header.php';
  require_once '../../module/autoload_class.php';
?>
  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Bienvenido a nuestra intranet</div>
        <div class="card-body">
          <form action="../../module/login/loginDefault.php" method="post">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputID" name="inputID" class="form-control" placeholder="Indicador" required="required" autofocus="autofocus">
                <label for="inputID">Introduce tu indicador</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required="required">
                <label for="inputPassword">Introduce tu contraseña</label>
              </div>
            </div>
            <?php require_once '../../module/validate_message.php'; ?> 
            <button href="index.php" class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Acceder</button><br>
          </form>
      </div>
    </div>

    </div>
    <!-- /#wrapper -->
    
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

     <!-- Page level plugin JavaScript-->
     <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="../js/demo/datatables-demo.js"></script>
    <script src="../js/demo/chart-area-demo.js"></script>

  </body>

</html>