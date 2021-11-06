
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
    <div class="t">
      <div class="container-fluid">
<div class="">
<div class="modal-dialog" role="">

	<div class="modal-header " style="color:#246A8E;">
     <center>

     <h3 class="modal-title" id="exampleModalLabel">Importar Arquivo.</h3></center>

<div class="modal-body" style="background-color:#EBF6FB; color:#246A8E;">
<form action="importar_arquivo.php" method="post" enctype="multipart/form-data">
<i class="fas fa-align-center"></i>  <label class="control-label"> Titulo: </label><input class="form-control" type="text" name="titulo" >
<br>
<i class="fas fa-align-left"></i>  <label class="control-label"> Descrição: </label><input class="form-control" type="text" name="descricao" >
<br>
<i class="fab fa-buffer"></i>  <label class="control-label"> Formato: </label>
<select class="form-control" name="formato">
<option value=".png">.png</option>
<option value=".jpg">.jpg</option>		
</select>
<br>
<i class="fab fa-buffer"></i>  <label class="control-label"> Catalogo (PDF): </label><input type="file" name="arquivo">

</div> 
<div class="modal-footer ">
	<div class="form-group col-md-12 col-sm-12">
	<input type="submit" value="Importar" class="btn btn-primary">

    </form>
	</div>
	</div>

  </div>
</div>
</div>


</body>

</html>
