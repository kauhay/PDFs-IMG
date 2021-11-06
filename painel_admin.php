
<?php
    session_start();
    include "conexao2.php";
    if(isset($_SESSION['log'])==false){
        echo("<script>window.location = 'login.php';</script>");
    }
     $user=$_SESSION['user'];
?>

<!doctype html>
<html lang="pt-br" xml:lang="pt-br">
<head> 
	<title>Sistema de conversão de PDFs em PNG.</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="icon" href="assets/img/icone.png">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">

    <link href="assets/vendor/datatables/datatables.bootstrap4.css" rel="stylesheet">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">

  <script src="https://kit.fontawesome.com/d98d40e574.js" crossorigin="anonymous"></script>
  
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- TOPO -->
		

<?php
include "conexao.php";
  
  include_once "topo.php";

?>

		<!-- TOPO -->
		
		<!-- MENU LATERAL -->
	
	<?php
  
	include_once "menu_lateral.php";

	?> 

		<!-- MENU LATERAL -->


<!-- MAIN -->


<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
      <div class="container-fluid">

              <p>VOC&Ecirc; EST&Aacute; EM:  <a href="http://intranet.anigerne/index.php">Home / </a>  <a href="#" class="">Catalogos </a> </p>

        <div class="row">
        <table class="table table-hover" id="dataTable">
										<thead>
											<tr>
												<th>#</th>
												<th>Titulo</th>
												<th>Descrição</th>
												<th>Arquivo</th>
                                                <th>Data</th>
                                                <th>Estado</th>
                                                <th>Ação</th>
											</tr>
										</thead>
										<tbody> 

<?php 
$result = "SELECT * FROM catalogo";
$resultado = mysqli_query($conn, $result); 
while($row = mysqli_fetch_array($resultado)){
  $id = $row['id'];
  $titulo = $row['titulo'];
  $descricao = $row['descricao'];
  $caminho = $row['caminho'];
  $data = $row['data'];
  $estado = $row['estado'];

?>  

<tr>
<td><?php echo"$id" ?></td>
<td><?php echo"$titulo" ?></td>
<td><?php echo"$descricao" ?></td>
<td><?php echo"$caminho" ?></td>
<td><?php echo"$data" ?></td>
<td><?php echo"$estado" ?></td> 
<td>
  <?php if ($estado == "desativado") {?>
<form action='ativar_catalogo.php' method='post'>
							  <input type='hidden' name='id' value='<?php echo"$id" ?>'>
							  <button type='submit' class='btn btn-canc-vis btn-success'>Ativa</button>
</form>
<?php } ?>
<?php if ($estado == "ativo") {?>
<form action='desativar_catalogo.php' method='post'>
							  <input type='hidden' name='id' value='<?php echo"$id" ?>'>
							  <button type='submit' class='btn btn-canc-vis btn-danger'>Desativar</button>
</form>
<?php } ?>
<form action='editar_catalogo.php' method='post'>
							  <input type='hidden' name='id' value='<?php echo"$id" ?>'>
                <input type='hidden' name='titulo' value='<?php echo"$titulo" ?>'>
                <input type='hidden' name='descricao' value='<?php echo"$descricao" ?>'>
							  <button type='submit' class='btn btn-canc-vis btn-warning'>Editar</button>
</form>
</td>
</tr>

<?php } ?>
</tbody>
</table>

<br>
<a href="importar.php" class="btn btn-canc-vis btn-success"><i class="fas fa-file-upload"></i> <span>Importar Catálogo</span></a></li>

        </div>

      </div>
    </div>
    <!-- END MAIN CONTENT -->
  </div>

<!-- MAIN -->

	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>

    <script src="assets/vendor/datatables/jquery.datatables.js"></script>
	<script src="assets/vendor/datatables/datatables.bootstrap4.js"></script>
	<script src="assets/vendor/datatables/sb-admin-datatables.min.js"></script>


</body>

</html>
