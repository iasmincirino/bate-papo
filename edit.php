<?php
session_start();
include_once("conexao.php");

$unique_id = filter_input(INPUT_POST, 'unique_id', FILTER_SANITIZE_NUMBER_INT);
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

//echo "name: $name <br>";
//echo "E-mail: $email <br>";

$result_usuario = "UPDATE users SET name='$name', email='$email', modified=NOW() WHERE id='$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário editado com sucesso</p>";
	header("Location: perfil.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi editado com sucesso</p>";
	header("Location: perfil.php?unique_id=$unique_id");
}
