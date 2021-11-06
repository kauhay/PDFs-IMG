
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

      <p>VOC&Ecirc; EST&Aacute; EM:  <a href="#">Home / </a>  <a href="#" class="">PDFS </a> </p>

    <div class="row">

<?php 
$result = "SELECT * FROM catalogo where estado = 'ativo'";
$resultado = mysqli_query($conn, $result); 
while($row = mysqli_fetch_array($resultado)){
  $id = $row['id'];
  $titulo = $row['titulo'];
  $descricao = $row['descricao'];
  $caminho = $row['caminho'];
  $data = $row['data'];
  $estado = $row['estado'];
?>  


 
          <div class="col-md-3">
            <!-- PANEL NO PADDING -->
            <div class="">

              <form class="" action="visualizar_catalogo.php" method="post" id="<?php echo $row['id']; ?>">
              <div style="cursor:pointer;" class="panel-body no-padding bg-primary text-center" onClick="document.getElementById('<?php echo $row['id']; ?>').submit();">
                <div class="padding-top-30 padding-bottom-30">
				<i class="home fa-2x"></i>
                  <h3><?php echo $row['titulo']; ?></h3>
                  <label>Descrição: <?php echo $row['descricao']; ?> </label><span> </spam><br>
                  <label>Data:  <?php echo $row['data']; ?></label><span> </spam>
                </div>
              </div>
              <div  style="background-color: #1167ad; color: #ffff;" class="panel-body text-right">

							</div>
           
              <input type="hidden" name="caminho" value="<?php echo $row['caminho']; ?>">
      
              </form>
            </div>
            <!-- END PANEL NO PADDING -->
          </div>
          

<?php } ?>

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

<!-- Envia as Informações para o modal de informaçãoes -->

</body>

</html>
