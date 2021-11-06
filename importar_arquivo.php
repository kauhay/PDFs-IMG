<!doctype html>
<html lang="pt-br">

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

<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box lockscreen clearfix">
					<div class="content">
						<h1 class="sr-only">Sistema de conversão de PDFs em PNG.</h1>
						<div class="logo text-center"><img src="assets/img/logo-dark.png" alt="Klorofil Logo"></div>
						<div class="user text-center">
							<img src="assets/img/baixados.png" class="img-circle" alt="Avatar">
							<h2 class="name">Importando Arquivo...</h2>
						</div>
				
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->

<?php
include ("conexao.php");
$titulo=$_POST['titulo'];
$descricao=$_POST['descricao'];
$formato=$_POST['formato'];

$unic = rand(1,1000000);

date_default_timezone_set('America/Fortaleza');
$data = date('Y-m-d H:i:s');

$uploaddir = 'C:/xampp/htdocs/dev/catalogos/arqs/originais/';
$uploadfile = $uploaddir . basename($_FILES['arquivo']['name']);
$file_name = basename($_FILES['arquivo']['name']);

$id2 = 1;

if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)) {

$pdfAbsolutePath = "$uploadfile";

$im = new Imagick("$pdfAbsolutePath");
    
$noOfPagesInPDF = $im->getNumberImages(); 

$i = 0;

	while ( $i < $noOfPagesInPDF) {
	  
		$url = $pdfAbsolutePath.'['.$i.']';

		$image = new Imagick();

		$image->setBackgroundColor(new ImagickPixel('red'));

		$image->readImage("$url");

		$image->setImageFormat("png");

		$image->writeImage(__DIR__."/arqs/convertidos/".($i+1).'-'.$unic.'-'.$file_name.$formato); 

		$arquivo = ($i+1).'-'.$unic.'-'.$file_name.$formato;

		$unic_arq = $unic.'-'.$file_name.$formato;


	$sql2 = "INSERT INTO arquivos (id_catalogo, arquivo)
    VALUES ('$unic_arq', '$arquivo')";
    mysqli_query($conn,$sql2) or die("Erro ao tentar cadastrar registro 02");
   
	$i++;    
}

$sql = "INSERT INTO catalogo (titulo, descricao, caminho, data, estado)
VALUES ('$titulo', '$descricao', '$unic_arq', '$data', 'ativo')";
mysqli_query($conn,$sql) or die("Erro ao tentar cadastrar registro 01");

	mysqli_close($conn);

    echo "<meta http-equiv=refresh content='4; URL=importar.php';> ";


} else {
    echo "Erro ao importar arquivo!";
}

?>
</body>
</html>