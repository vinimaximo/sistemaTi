<?php

//Incluindo variaveis do sistema

include ('../config.php');

//Incluindo o sistema de autenticação

include('acesso_com.php');

//Incluindo o Arquivo de conexão

include('../connections/conn.php');

//Selecionando os dados e ordenando por ordem alfabetica

$consulta = "select * from tbusuarios order by login_usuario asc";

//Buscar a lista completa de usuarios

$lista = $conn->query($consulta);

//Separar usuarios por linha

$linha = $lista->fetch_assoc();

//Contar numero de linhas da lista

$totalLinhas = $lista->num_rows;

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/meu_estilo.css" type="text/css">
    <title><?php echo SYS_NAME." - Lista(". $totalLinhas; ?>) Usuarios</title>
</head>

<body class="fundofixo">
    <?php include('menu_adm.php'); ?>
    <main class="container">
        <table class="table table-condensed table-hover tbopacidade" style="background-color: #afd9ee;">
            <thead>
                <th>Id</th>
                <th>Login</th>
                <th>Senha</th>
                <th>Nivel</th>

                <th>
                    <a href="produtos_insere.php" class="btn btn-block btn-primary btn-xs">
                        <span class="hidden-xs">Adicionar<br></span>
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                </th>

            </thead><!-- Fecha linha de cabeçalho da tabela -->

            <tbody>
                <?php do { ?>
                    <tr>
                    <tr>
                        <!-- Linha da tabela -->
                        <td><?php echo $linha['id_usuario'] ?></td>
                        <td>
                            <span class="visible-xs"><?php echo $linha['nivel_usuario'] ?></span>
                            <span class="hidden-xs"><?php echo $linha['login_usuario'] ?></span>
                            

                        </td>




                    </tr>





                <?php } while ($linha = $lista->fetch_assoc()); ?>
            </tbody>
        </table>


    </main>
</body>

</html>