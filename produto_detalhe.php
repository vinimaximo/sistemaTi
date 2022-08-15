<?php
include('connections/conn.php');

$id = $_GET['id_produto'];
//echo "<h1>Voce digitou na busca: ".$busca_user."</h1>";
$consulta = "select * from vw_tbprodutos where id_produto = " . $id;
$produtoConsulta = $conn->query($consulta);
$linha = $produtoConsulta->fetch_assoc();


/*
        <table>
        <?php do {?>
            <tr> 
                <td> <?php echo $linha['descri_produto'] ?> </td>
                <td> <?php echo $linha['valor_produto'] ?></td>
            </tr>
            <?php } while($linha=$lista->fetch_assoc())?>
    </table> */
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/meu_estilo.css" type="text/css">
    <title>Detalhe do Produto - <?php $linha['descri_produto'] ?></title>
</head>

<body class="fundofixo">
    <?php include('menu_publico.php'); ?>
    <main class="container">
        <h2 class="breadcrumb alert-danger">
            <a href="javascript: window.history.go(-1)" class="btn btn-danger">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>

            <strong><i><?php echo $linha['descri_produto']; ?></i>
            </strong>
        </h2>
        <div class="row">
            <!-- Manter os elementos na linha -->
            <!-- Abre estrutura de repetição -->

            <!-- Abre thumbnail/card -->
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                <div class="thumbnail">
                    <a href="produto_detalhe.php?id_produto=<?php echo $linha['id_produto'] ?>">
                        <img src="images/<?php echo $linha['imagem_produto']; ?>" alt="" class="img-responsive img-rounded">
                    </a>
                    <div class="caption text-right">
                        <h3 class="text-danger">
                            <strong><?php echo $linha['descri_produto']; ?></strong>
                        </h3>
                        <p class="text-warning"><strong>
                                <?php echo $linha['rotulo_tipo']; ?>
                            </strong>
                        </p>
                        <p class="text-left">
                            <?php echo mb_strimwidth($linha['resumo_produto'], 0, 42, '...'); ?>
                        </p>
                        <p>
                            <button class="btn btn-default disabled" style="cursor: default;" role="button">
                                <?php echo number_format($linha['valor_produto'], 2, ',', '.'); ?>
                            </button>
                            <a href="produto_detalhe.php?id_produto=<?php echo $linha['id_produto'] ?>">
                                <span class="hidden-xs">Saiba Mais...</span>
                                <span class="visible-xs glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                            </a>
                        </p>
                    </div>
                </div>

            </div> <!-- Fecha thumbnail -->


        </div><!-- Fecha Manter os elementos na linha -->


        <footer>
            <?php include('rodape.php'); ?>
        </footer>

    </main>
</body>

</html>