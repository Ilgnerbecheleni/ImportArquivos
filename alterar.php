<?php

    require_once("conexao.php");

    $id = $_GET['id'];
    
    $sql = "SELECT cod, nome,telefone , email, arquivo FROM usuarios
     WHERE cod = {$id}";
     
    $consulta = $conexao->query($sql);
    
    $linha = mysqli_fetch_array($consulta);
    



?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
            crossorigin="anonymous">
        <style>
        .img-card {

            object-fit: cover;
            width: 100px;
            height: 100px;
        }

        .hidden {
            display: none;
        }
        </style>
        <title>cadastro</title>

        <style>

        </style>



    </head>

    <body>



        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="testecard.php">AGENDA</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="testecard.php">Home</a>
                        <a class="nav-link" href="cadastros.php">Cadastro</a>

                    </div>
                </div>
            </div>
        </nav>
        <main class="container mt-3">
            <h1>Cadastro de Contato</h1>
            <div class="alert alert-success hidden" role="alert" id="alerta">
                <p>Salvo com Sucesso!!!</p>
            </div>

            <form action="editardados.php" id="upload-form" enctype="multipart/form-data">
                <input type="hidden" name="codigo" value="<?php echo $linha['cod']; ?>">
                Código: <br /><?php echo $linha['cod']; ?><br />
                <input type="hidden" name="cod" value="1">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="inputNome" aria-describedby="emailHelp" name='nome'
                        value="<?php echo $linha['nome']; ?>">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Telefone</label>
                    <input type="text" class="form-control"
                        id="exampleInputEmail1" aria-describedby="emailHelp" name='telefone'
                        value="<?php echo $linha['telefone']; ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email
                        address</label>
                    <input type="email" class="form-control"
                        id="exampleInputEmail1" aria-describedby="emailHelp" name='email'
                        value="<?php echo $linha['email']; ?>">
                </div>





                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </main>

        <script src="https://code.jquery.com/jquery-3.6.3.js"
            integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
            crossorigin="anonymous"></script>


        <script>
        $(document).ready(function() {
            //Preview the image when user selects a file


            //Handle the form submission
            $("#upload-form").submit(function(e) {
                e.preventDefault(); //evita recarregar a pagina
                var formData = new FormData(this);
                $.ajax({
                    url: "editardados.php", // diretorio
                    type: "POST", //metodo
                    data: formData, //arquivo
                    success: function(data) {
                        console.log(data);
                        setTimeout(() => {
                            $("#alerta").toggleClass('hidden');
                        }, 2000);
                        $("#alerta").toggleClass('hidden');
                        $("#preview").attr("src", "./uploads/user.png");
                        $("#upload-form").trigger("reset");
                        window.location.assign("index.php");
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });


            });
        });
        </script>
    </body>

</html>