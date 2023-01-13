<?php

$host = "localhost";		//127.0.0.1
$usuario = "root";
$senha = "123456";
$banco = "empresa";

$conexao = new mysqli($host, $usuario, $senha, $banco);

if($conexao->connect_error){
	echo "Houve falha na conexão.";
}else{
	
}

?>