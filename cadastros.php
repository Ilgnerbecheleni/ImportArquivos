<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
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
        <main class="container mt-3">
            <h1>Cadastro de Contato</h1>
            <div class="alert alert-success hidden" role="alert" id="alerta">
                <p>Salvo com Sucesso!!!</p>
            </div>
            <form id="upload-form" enctype="multipart/form-data">
                <input type="hidden" name="cod" value="1">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nome</label>
                    <input type="text" class="form-control"
                        id="inputEmail" aria-describedby="emailHelp" name='nome'>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Telefone</label>
                    <input type="text" class="form-control"
                        id="exampleInputEmail1" aria-describedby="emailHelp" name='telefone'>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email
                        address</label>
                    <input type="email" class="form-control"
                        id="exampleInputEmail1" aria-describedby="emailHelp" name='email'>
                </div>


                <div class="mb-3 ">

                    <div class="d-flex align-items-center
                        justify-content-around">
                        <label for="formFileSm" class="form-label">Imagem do
                            usuário</label>
                        <div>
                            <input class="form-control " type="file" id="image-file" name="image">

                        </div>

                        <div>
                            <img src="./uploads/user.png" class="img-thumbnail
                                img-card" alt=""
                                id="preview">
                        </div>


                    </div>


                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </main>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>
    </body>

    <script src="https://code.jquery.com/jquery-3.6.3.js"
        integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>
    <script>
    $(document).ready(function() {
        //Preview the image when user selects a file
        $("#image-file").on("change", function() {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#preview").attr("src", e.target.result); // mostra preview da imagem
            }
            reader.readAsDataURL(this.files[0]);
        });

        //Handle the form submission
        $("#upload-form").submit(function(e) {
            e.preventDefault(); //evita recarregar a pagina
            var formData = new FormData(this);
            $.ajax({
                url: "upload.php", // diretorio
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



</html>