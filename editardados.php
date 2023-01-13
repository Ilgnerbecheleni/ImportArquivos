<?php
require_once("conexao.php");





if(isset($_POST['codigo']))
	$codigo = $_POST['codigo'];

if(isset($_POST['nome']))
	$nome = $_POST['nome'];

if(isset($_POST['telefone']))
	$telefone = $_POST['telefone'];

    if(isset($_POST['email']))
	$email = $_POST['email'];


$sql = "UPDATE usuarios SET nome = '$nome' ,telefone ='$telefone',email='$email',arquivo = '$arquivo' WHERE cod = $codigo";
  if ($conexao->query($sql) === TRUE) {
    echo "Atualizado com Sucesso";
  } else {
    echo "Error: " . $sql . "<br>" . $conexao->error;
  }
  $conexao->close();
?>