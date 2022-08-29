<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../css/meu_estilo.css" rel="stylesheet" type="text/css">
    <title><?php echo SYS_NAME . " - " ?> Reserva</title>
</head>
<body class="fundofixo">
    <main class="container">
    <h1 class="breadcrumb">Área Da Reserva</h1>
    <div class="row">
        
        <!-- ADM TIPOS -->
        <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-2 col-md-8">
                <div class="thumbnail alert-warning">
                    <img src="../imagens/icone_tipos.png" alt="">
                    <br>
                    <div class="alert-warning">
                        <!-- Botão principal -->
                        <div class="btn btn-group btn-group-justified" role="group">
                            <div class="btn-group">
                                <button class="btn btn-default disabled" style="cursor:default;">
                                <strong class="">Reserva</strong>
                                    
                                </button>
                            </div>
                        </div>
                        <!-- Fecha botão principal -->
                        <!-- Botões Listar e inserir -->
                        <div class="btn btn-group btn-group-justified" role="group">
                            <!-- botão Listar -->
                            <div class="btn-group">
                                <a href="reserva_lista.php">
                                    <button class="btn btn-danger">
                                        Listar
                                    </button>
                                </a>
                            </div><!-- Fecha botão Listar -->
                            
                        </div>
                        <!-- Fecha Botões Listar e inserir -->
                    </div><!-- fecha alert-danger -->
                </div><!-- fecha thumbnail -->
            </div><!-- fecha o dimensionamento -->
            <!-- FECHA ADM TIPOS -->
    </div>

    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>