
<?php

session_start();
  
if(isset($_SESSION['log'])==false){
	echo("<script>window.location = 'login.php';</script>");
}

$users=$_SESSION['user'];

$id=$_POST['id'];
$titulo=$_POST['titulo'];
$descricao=$_POST['descricao'];

// ini_set('display_errors', 0 );
// error_reporting(0);

if($titulo == NULL && $descricao == NULL){

	echo("<script>window.location = 'painel_admin.php';</script>");

}

include 'conexao.php'; 

if ($descricao <> NULL && $titulo <> NULL) {

    $result = "UPDATE catalogo SET titulo='$titulo', descricao='$descricao' WHERE id ='$id'";
			$resultado = mysqli_query($conn, $result);
			
			//Verificar se alterou no banco de dados através "mysqli_affected_rows"
			if(mysqli_affected_rows($conn)){
				$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Catalogo Editado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
				header("Location: painel_admin.php");
				}else{
				$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao editar o catalgo <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
				header("Location: painel_admin.php");
					 }  
}

 if ($descricao <> NULL && $titulo == NULL) {

    $result = "UPDATE catalogo SET descricao='$descricao' WHERE id ='$id'";
			$resultado = mysqli_query($conn, $result);
			
			//Verificar se alterou no banco de dados através "mysqli_affected_rows"
			if(mysqli_affected_rows($conn)){
				$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Catalogo Editado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
				header("Location: painel_admin.php");
				}else{
				$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao editar o catalgo <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
				header("Location: painel_admin.php");
					 }  
}
if ($descricao == NULL && $titulo <> NULL) {

            $result = "UPDATE catalogo SET titulo='$titulo' WHERE id ='$id'";
			$resultado = mysqli_query($conn, $result);
			
			if(mysqli_affected_rows($conn)){
				$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Catalogo Editado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
				header("Location: painel_admin.php");
				}else{
				$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao editar o catalgo <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
				header("Location: painel_admin.php");
					 }  
}
?>

