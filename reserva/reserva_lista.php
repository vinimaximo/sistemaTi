<?php
//Incluindo variaveis do sistema
include ('../config.php');

//Incluindo o sistema de autenticação


//Incluindo o Arquivo de conexão
include('../connections/conn.php');

//Buscando o nome do nível
//Selecionando os dados
$consulta = "select * from tbreserva  order by data_reserva asc";

// Buscar a lista completa de usuários
$lista = $conn->query($consulta);

//Separar reserva por linha
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
    <title><?php echo SYS_NAME." - Lista(". $totalLinhas; ?>) Reserva</title>
</head>

<body class="fundofixo">
    <?php include('menu_reserva.php'); ?>
    <main class="container">
    <h3 class="breadcrumb text-warning">
                    <a href="index.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Reservas
                </h3>
        <table class="table table-condensed table-hover tbopacidade" style="background-color: #afd9ee;">
            <thead>
                <th>Id</th>
                <th>Nome</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Numero-Mesa</th>
                <th>Numero-Pessoas</th>
                <th>Cpf</th>
                <th>Tipo-Reserva</th>


                <th>
                    <a href="reserva.php" class="btn btn-block btn-primary btn-xs">
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
                         <td><?php echo $linha['id_reserva']; ?></td>                       
                        <td>
                            <span class="visible-xs"><?php echo $linha['motivo_reserva'];?></span>
                            <span class="hidden-xs"><?php echo $linha['login_reserva'];?></span>
                           
                        </td>
                        <td> <span class="hidden-xs"><?php echo $linha['data_reserva'] ?></span></td>
                        <td> <span class="hidden-xs"><?php echo $linha['hora_reserva'] ?></span></td>
                        <td> <span class="hidden-xs"><?php echo $linha['numero_mesa_reserva'] ?></span></td>
                        <td> <span class="hidden-xs"><?php echo $linha['numero_pessoas_reserva'] ?></span></td>
                        <td> <span class="hidden-xs"><?php echo $linha['cpf_reserva'] ?></span></td>



                        <td>
                            <?php
                            if ($linha['motivo_reserva'] == 'Casamento') {
                                echo ("<span class='glyphicon glyphicon- text-danger aria-hidden='true'></span>");
                            } else if($linha['motivo_reserva'] == 'Aniversario') {
                                echo ("<span class='glyphicon glyphicon-shopping- text-info aria-hidden='true'></span>");
                            } else if($linha['motivo_reserva'] == 'etc...'){
                                echo ("<span class='glyphicon glyphicon- text-success aria-hidden='true'></span>");
                            } else{
                                echo ("<span class='glyphicon glyphicon- text-danger aria-hidden='true'></span>");
                            }
                            ?>
                            <?php echo $linha['motivo_reserva']; ?>
                        </td>  





                        <td>
                            
                            <button class="btn btn-danger btn-block btn-xs delete" 
                            role="button" 
                            data-nome="<?php echo $linha['login_reserva'];?>" 
                            data-id="<?php echo $linha['id_reserva'];?>">
                            <span class="hidden-xs">Excluir <br></span>
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </button>
                        </td>


                    </tr>





                <?php } while ($linha = $lista->fetch_assoc()); ?>
            </tbody>
        </table>


    </main>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button"data-dismiss="modal" >&times;</button>
                    <h4 class="modal-title text-danger">Atenção</h4>
                </div>
                <div class="modal-body">
                    Deseja Realmente  <strong>Excluir</strong> Esta Reserva  ?
                    <h3><span class="text-danger nome"></span></h3>
                </div>
                <div class="modal-footer">
                    <a href="#" type="button" class="btn btn-danger delete-yes">Confirmar</a>
                    <button class="btn btn-success" data-dismiss="modal">
                            Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" 
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
     <!-- Script para o Modal -->
     <script type="text/javascript">
        $('.delete').on('click',function(){
            //Busca o valor do atributo data-nome
            var nome = $(this).data('nome');
            //Busca o valor do atributo data-id
            var id = $(this).data('id');
            //Insere o nome do item na confirmação do Modal
            $('span.nome').text(nome);
            //Envia o id através do link do botão para confirmar 
            $('a.delete-yes').attr('href','excluir_reserva.php?id_reserva='+id);
            //Abre o Modal
            $('#myModal').modal('show');
        })
    </script>
</body>

</html>