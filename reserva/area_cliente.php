<?php
//Variaveis de ambiente
include('../config.php');
//Conexão com banco
include('../connections/conn.php');




if ($_POST) {
    try {
     $motivo_reserva = $_POST['motivo_reserva'];
    $data_reserva = $_POST['data_reserva'];
    $hora_reserva = $_POST['hora_reserva'];
    $login_reserva = $_POST['login_reserva'];
    $cpf_reserva = $_POST['cpf_reserva'];
    $senha_reserva = $_POST['senha_reserva'];

    $campos_insert = "email_reserva,motivo_reserva,data_reserva,hora_reserva,login_reserva,senha_reserva,cpf_reserva";
    $values = "NULL,'$motivo_reserva','$data_reserva','$hora_reserva','$login_reserva',$senha_reserva,'$cpf_reserva'";
    $query = "insert into tbreserva ($campos_insert) values ($values);";
    $resultado = $conn->query($query);

    //Após o insert redireciona a página
    if (mysqli_insert_id($conn)) {
       header("location:login_reserva.php");
    } else {
       header("location:login_reserva.php");
    }
    } catch (\Throwable $e) {
       echo $e;
    }
   
}

//Chave estrangeira tipo
$query_tipo = "select * from tbreserva order by id_reserva asc";
$lista_fk = $conn->query($query_tipo);
$linha_fk = $lista_fk->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SYS_NAME; ?> - Reserva</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/meu_estilo.css" type="text/css">
</head>

<body class="fundofixo">

    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-2 col-md-8">
                <h3 class="breadcrumb text-warning">
                    <a href="regras_reserva.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Reserve Aqui
                </h3>
                <div class="thumbnail">
                    <div class="alert alert-danger" role="alert">
                        <form action="area_cliente.php" name="area_cliente.php" method="post" enctype="multipart/form-data">
                            <!-- Seleciona o tipo do reserva -->
                            <label for="id_tipo_reserva">Tipo:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-tasks"></span>
                                </span>
                                <select name="motivo_reserva" id="
                                    tipo_reserva" class="form-control" required>
                                    <option value="casamento">Casamento</option>
                                    <option value="outros">Outros</option>
                                    <option value="confraternizacao">Confraternização</option>
                                    <option value="aniversario">Aniversario</option>
                                </select>
                            </div>
                            <br>

                            <label for="cpf_reserva">CPF:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                </span>
                                <input maxlength="11" type="text" class="form-control" name="cpf_reserva" id="cpf_reserva" placeholder="Digite o CPF do" maxlength="100" required>
                            </div>
                            <br>
                            <label for="data_reserva">Data:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                </span>
                                <input maxlength="11" type="date" class="form-control" name="data_reserva" id="data_reserva" placeholder="Digite o Titulo da Reserva" maxlength="100" required>
                            </div>
                            <br>
                            <label for="hora_reserva">Hora:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-hourglass" aria-hidden="true"></span>
                                </span>
                                <input type="time" class="form-control" name="hora_reserva" id="hora_reserva">
                            </div>
                            <br>
                            <label for="login_reserva">Nome Completo:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                </span>
                                <input type="text" class="form-control" name="login_reserva" id="login_reserva" placeholder="Digite o Nome completo." maxlength="100" required>
                            </div>
                            <br>
                            <label for="senha_reserva">Senha:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-screenshot" aria-hidden="true"></span>
                                </span>
                                <input type="number" class="form-control" name="senha_reserva" id="senha_reserva" placeholder="Digite sua senha." maxlength="100" required>
                            </div>
                            <br>
                            <input type="submit" value="Cadastrar" name="enviar" id="enviar" class="btn btn-danger">

                        </form>
                    </div>
                </div>
            </div>
        </div>


    </main>







    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>