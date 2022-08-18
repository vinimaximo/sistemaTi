<?php
//Incluindo o sistema de autenticação
include('acesso_com.php');

//Incluindo o arquivo de conexão
include('../connections/conn.php');

//Selecionando os dados
$consulta = "select * from tbtipos order by rotulo_tipo asc";

// Buscar a lista completa de produtos
$lista = $conn->query($consulta);

// Separar produtos por linha
$linha = $lista->fetch_assoc();

// Contar número de linhas da lista
$totalLinhas = $lista->num_rows;

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/meu_estilo.css" type="text/css">
    <title>Tipos (<?php echo $totalLinhas; ?>) - Lista</title>
</head>

<body>
    <?php include('menu_adm.php'); ?>
    <main class="container">
    <h1 class="breadcrumb alert-danger">Lista de Tipos</h1>
        <table class="table table-condensed table-hover tbopacidade">
            <!-- thead>th*8 -->
            <thead>
                <th class="hidden">Id</th>
                <th>Sigla</th>
                <th>Rotulo</th>
               
                <th>
                    <a href="tipos_insere.php" class="btn btn-block btn-primary btn-xs">
                        <span class="hidden-xs">Adicionar<br></span>
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                </th>

            </thead><!-- Fecha linha de cabeçalho da tabela -->


    </main>
</body>

</html>