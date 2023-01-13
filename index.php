<?php
    // Connect to the database
    require 'conexao.php';
    
    // Retrieve the image from the database
   
    $sql = "SELECT * FROM empresa.usuarios;";
    $consulta = $conexao->query($sql);
   
  

?>

<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Agenda TOP</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
            crossorigin="anonymous">
        <style>
        .img-fluid {

            max-height: auto;
            width: 250px;
            height: 200px;
            object-fit: cover;
        }

        .hidden {
            display: none;
        }
        </style>

        <script>
        function confirma(id) {
            var ok = confirm("Deseja realmente excluir este registro?");
            if (ok) {
                $.post("excluir.php", {
                    codigo: id
                }, function(result) {
                    /*
                    var painel = '#linha' + id;
                    $(painel).remove();
                    */
                    setTimeout(() => {
                        $("#alerta").toggleClass('hidden');
                    }, 2000);
                    $("#alerta").toggleClass('hidden');


                    location.reload();
                });

            } else {
                return false;
            }

        }
        </script>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">AGENDA</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        <a class="nav-link" href="cadastros.php">Cadastro</a>

                    </div>
                </div>
            </div>
        </nav>
        <div class="alert alert-danger hidden" role="alert" id="alerta">
            Apagado com Sucesso!
        </div>
        <main class="container mt-5 d-flex justify-content-around flex-wrap">

            <?php
            while ($linha = mysqli_fetch_array($consulta)) {
                        
                                     
                        
                        echo '<div class="card m-3" style="max-width: 540px;  max-height: 300px">';
                        echo '<div class="row g-0">';
                        echo '<div class="col-md-4">';
                        echo ' <img src="'.$linha['arquivo'].'" class="img-fluid rounded-start" alt="...">';
                        echo '</div>';
                        echo '<div class="col-md-8">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">'.$linha['nome'].'</h5>';
                        echo '<ul class="list-group list-group-flush">';
                        echo '<li class="list-group-item"><b>Telefone: </b>'.$linha['telefone'].'</li>';
                        echo ' <li class="list-group-item"><b>E-mail:</b> '.$linha['email'].'</li>';
                        echo ' <li class="list-group-item mt-1">';
                        echo '<a href="alterar.php?id='.$linha['cod'].'" class="btn btn-success m-2">Alterar</a>'.'<a href="javascript:confirma('.$linha['cod'].');" class="btn btn-danger">Excluir</a>';
                        echo '</li>';
                        echo '</ul>';
                        echo ' </div> </div> </div> </div>';

                        
                       
                 
                    }


                ?>
        </main>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>



        <script src="https://code.jquery.com/jquery-3.6.3.js"
            integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
            crossorigin="anonymous"></script>

    </body>

</html>