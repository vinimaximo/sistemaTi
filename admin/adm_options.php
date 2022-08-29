<!-- Salvar como: admin/adm_options.php -->
<!doctype html>
<html lang="pt-br">

<head>
    <title>Área Administrativa</title>
    <meta charset="utf-8">
    <!-- Link arquivos Bootstrap css -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../css/meu_estilo.css" rel="stylesheet" type="text/css">
</head>

<body class="fundofixo">
    <main class="container">
        <h1 class="breadcrumb">Área Administrativa</h1>
        <div class="row">
            <!-- manter os elementos na linha -->

            <!-- ADM PRODUTOS -->
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail alert-danger">
                    <img src="../imagens/icone_produtos.png" alt="">
                    <br>
                    <div class="alert-danger">
                        <!-- Botão principal -->
                        <div class="btn btn-group btn-group-justified" role="group">
                            <div class="btn-group">
                                <button class="btn btn-default disabled" style="cursor:default;">
                                    PRODUTOS
                                </button>
                            </div>
                        </div>
                        <!-- Fecha botão principal -->
                        <!-- Botões Listar e inserir -->
                        <div class="btn btn-group btn-group-justified" role="group">
                            <!-- botão Listar -->
                            <div class="btn-group">
                                <a href="produtos_lista.php">
                                    <button class="btn btn-danger">
                                        Listar
                                    </button>
                                </a>
                            </div><!-- Fecha botão Listar -->
                            <!-- botão Inserir -->
                            <div class="btn-group">
                                <a href="produtos_insere.php">
                                    <button class="btn btn-danger">
                                        Inserir
                                    </button>
                                </a>
                            </div><!-- Fecha botão Listar -->
                        </div>
                        <!-- Fecha Botões Listar e inserir -->
                    </div><!-- fecha alert-danger -->
                </div><!-- fecha thumbnail -->
            </div><!-- fecha o dimensionamento -->
            <!-- FECHA ADM PRODUTOS -->

            <!-- ADM TIPOS -->
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail alert-warning">
                    <img src="../imagens/icone_tipos.png" alt="">
                    <br>
                    <div class="alert-warning">
                        <!-- Botão principal -->
                        <div class="btn btn-group btn-group-justified" role="group">
                            <div class="btn-group">
                                <button class="btn btn-default disabled" style="cursor:default;">
                                    TIPOS
                                </button>
                            </div>
                        </div>
                        <!-- Fecha botão principal -->
                        <!-- Botões Listar e inserir -->
                        <div class="btn btn-group btn-group-justified" role="group">
                            <!-- botão Listar -->
                            <div class="btn-group">
                                <a href="tipos_lista.php">
                                    <button class="btn btn-warning">
                                        Listar
                                    </button>
                                </a>
                            </div><!-- Fecha botão Listar -->
                            <!-- botão Inserir -->
                            <div class="btn-group">
                                <a href="tipos_insere.php">
                                    <button class="btn btn-warning">
                                        Inserir
                                    </button>
                                </a>
                            </div><!-- Fecha botão Listar -->
                        </div>
                        <!-- Fecha Botões Listar e inserir -->
                    </div><!-- fecha alert-danger -->
                </div><!-- fecha thumbnail -->
            </div><!-- fecha o dimensionamento -->
            <!-- FECHA ADM TIPOS -->

            <!-- ADM USUÁRIOS -->
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail alert-info">
                    <img src="../imagens/icone_user.png" alt="">
                    <br>
                    <div class="alert-info">
                        <!-- Botão principal -->
                        <div class="btn btn-group btn-group-justified" role="group">
                            <div class="btn-group">
                                <button class="btn btn-default disabled" style="cursor:default;">
                                    USUÁRIOS
                                </button>
                            </div>
                        </div>
                        <!-- Fecha botão principal -->
                        <!-- Botões Listar e inserir -->
                        <div class="btn btn-group btn-group-justified" role="group">
                            <!-- botão Listar -->
                            <div class="btn-group">
                                <a href="usuarios_lista.php">
                                    <button class="btn btn-info">
                                        Listar
                                    </button>
                                </a>
                            </div><!-- Fecha botão Listar -->
                            <!-- botão Inserir -->
                            <div class="btn-group">
                                <a href="usuario_insere.php">
                                    <button class="btn btn-info">
                                        Inserir
                                    </button>
                                </a>
                            </div><!-- Fecha botão Listar -->
                        </div>
                        <!-- Fecha Botões Listar e inserir -->
                    </div><!-- fecha alert-danger -->
                </div><!-- fecha thumbnail -->
            </div><!-- fecha o dimensionamento -->
            <!-- FECHA ADM USUÁRIOS -->

        </div><!-- fecha row -->
    </main>
    <!-- Link arquivos Bootstrap js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>

</html>