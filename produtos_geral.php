<?php
include('connections/conn.php');



$consulta = "select * from vw_tbprodutos where deletado is null order by descri_produto";

$lista = $conn->query($consulta);

$linha = $lista->fetch_assoc();

$totalLinhas = ($lista)->num_rows;


?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/meu_estilo.css" type="text/css">
    <title>Produtos em Destaque</title>
</head>

<body class="fundofixo">
   
    <main class="container">
        

            <h2 class="breadcrumb alert-danger">Produtos</h2>

            <div class="row">
                <!-- Linha de produto -->
                <!-- Inicio estrutura de repetição -->
                <?php do { ?>
                    <!-- Abre o thumbail/card-->
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <a href="produto_detalhe.php?id_produto=<?php echo $linha['id_produto'] ?>">
                                <img src="images/<?php echo $linha['imagem_produto'] ?>" alt="" class="img-responsive img-rounded">
                            </a>
                            <div class="caption text-right">
                                <h3 class="text-danger">
                                    <strong><?php echo $linha['descri_produto'] ?></strong>
                                </h3>
                                <p class="text-warning">
                                    <strong><?php echo $linha['rotulo_tipo'] ?></strong>
                                </p>
                                <p class="text-left">
                                    <strong><?php echo mb_strimwidth($linha['resumo_produto'], 0, 42, '...') ?></strong>
                                </p>
                                <p>
                                    <button class="btn btn-default disabled" role="button" style="cursor:pointer ;">
                                        <?php echo number_format($linha['valor_produto'],2,',','.'); ?>
                                        
                                    </button>
                                    <a href="produto_detalhe.php?id_produto=<?php echo $linha['id_produto'];?>" class="btn btn-danger" role="button">
                                        <span class="hidden-xs">Saiba mais...</span>
                                        <span class="visible-xs glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                    </a>
                                </p>
                            </div><!-- Final caption -->
                        </div><!-- Final linha de produto -->
                       
                    </div> <!-- Fecha o thumbail/card-->


            <?php } while ($linha = $lista->fetch_assoc());
             ?>
            <!-- Final estrutura de repetição -->

            </div><!-- Final linha de produto -->
           
    </main>
    <script 
    src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
    </script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>

</html>