
<?php

session_start();
  
if(isset($_SESSION['log'])==false){
	echo("<script>window.location = 'login.php';</script>");
}

$users=$_SESSION['user'];

$id=$_POST['id'];

// ini_set('display_errors', 0 );
// error_reporting(0);

include 'conexao.php'; 


$result = "UPDATE catalogo SET estado='ativo'WHERE id ='$id'";
			$resultado = mysqli_query($conn, $result);
			
			//Verificar se alterou no banco de dados através "mysqli_affected_rows"
			if(mysqli_affected_rows($conn)){
				$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Catalogo Ativado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
				header("Location: painel_admin.php");
				}else{
				$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao ativar o catalgo <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
				header("Location: painel_admin.php");
					 }  

?>

