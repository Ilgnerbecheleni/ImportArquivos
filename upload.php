<?php
require 'conexao.php';
  // Define where to save the uploaded file
  $target_dir = "uploads/";
  $arquivo = $target_dir . basename($_FILES["image"]["name"]); //diretorio da imagem
  move_uploaded_file($_FILES["image"]["tmp_name"], $arquivo); //função que move a imagem
  
  // Get the title and description from the form
  $nome = $_POST['nome']; //informação digitada no campo titulo
  $telefone = $_POST['telefone']; //informação digitada no campo descricao
  $email = $_POST['email']; //informação digitada no campo titulo
  
   
  // Insert the data into the database
  $sql = "INSERT INTO usuarios (nome, telefone, email,arquivo) VALUES ('$nome', '$telefone','$email', '$arquivo')";
  if ($conexao->query($sql) === TRUE) {
    echo "Image uploaded successfully.";
  } else {
    echo "Error: " . $sql . "<br>" . $conexao->error;
  }
  $conexao->close();
?>