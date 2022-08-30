<?php
//Variaveis de ambiente
include('../config.php');
//Conexão com banco
include('../connections/conn.php');


if ($_POST) {
    $id_tipo_reserva = $_POST['id_tipo_reserva'];
    $email_reserva = $_POST['email_reserva'];
    $tipo_reserva = $_POST['tipo_reserva'];
    $data_reserva = $_POST['data_reserva'];
    $hora_reserva = $_POST['hora_reserva'];
    $login_reserva = $_POST['login_reserva'];
    $senha_cliente = $_POST['senha_usuario'];
    $cpf_reserva = $_POST['cpf_reserva'];

    $campos_insert = "id_tipo_reserva,email_reserva,tipo_reserva,login_reserva,senha_usuario,cpf_reserva";
    $values = "$id_tipo_reserva,'$email_reserva','$tipo_reserva','$login_reserva',$senha_usuario,'$cpf_reserva'";
    $query = "insert into tbreserva ($campos_insert) values ($values);";
    $resultado = $conn->query($query);

    //Após o insert redireciona a página
    if (mysqli_insert_id($conn)) {
        header("location:reserva_lista.php");
    } else {
        header("location:reserva_lista.php");
    }
}

//Chave estrangeira tipo
$query_tipo = "select * from tbreserva order by login_reserva asc";
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
                                <select name="id_tipo_reserva" id="id_tipo_reserva" class="form-control" required>
                                    <?php do { ?>
                                        <option value="<?php echo $linha_fk['id_reserva']; ?>">
                                            <?php echo $linha_fk['tipo_reserva']; ?>
                                        </option>
                                    <?php } while ($linha_fk = $lista_fk->fetch_assoc());
                                    $linha_fk = mysqli_num_rows($lista_fk);
                                    if ($linha_fk > 0) {
                                        mysqli_data_seek($lista_fk, 0);
                                        $linha_fk = $lista_fk->fetch_assoc();
                                    }
                                    ?>
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
                                <input type="time" class="form-control" name="hora_reserva" id="hora_reserva" min="0" step="0.01">
                            </div>
                            <br>
                            <label for="login_reserva">Nome Completo:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                </span>
                                <input type="text" class="form-control" name="login_reserva" id="login_reserva" placeholder="Digite o CPF do" maxlength="100" required>
                            </div>
                            <br>
                            <input type="submit" value="Cadastrar" name="enviar" id="enviar" class="btn btn-danger">

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php include('area_reserva.php'); ?>
    </main>







    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>