
<?php

session_start();
  
if(isset($_SESSION['log'])==false){
	echo("<script>window.location = 'login.php';</script>");
}

$users=$_SESSION['user'];

$id=$_POST['id'];

include 'conexao.php'; 

$result = "UPDATE catalogo SET estado='desativado'WHERE id ='$id'";
			$resultado = mysqli_query($conn, $result);
			
			//Verificar se alterou no banco de dados através "mysqli_affected_rows"
			if(mysqli_affected_rows($conn)){
				$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Catalogo Desativado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
				header("Location: painel_admin.php");
				}else{
				$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao desativar o catalgo <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
				header("Location: painel_admin.php");
					 }  

?>

