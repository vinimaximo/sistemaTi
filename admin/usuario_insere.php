<?php
//Sistema de autenticação
include('acesso_com.php');
//Variaveis de ambiente
include('../config.php');
//Conexão com banco
include('../connections/conn.php');


if ($_POST) {
    $id_tipo_usuario = $_POST['id_tipo_usuario'];
    $nivel_usuario = $_POST['nivel_usuario'];
    $login_usuario = $_POST['login_usuario'];
    $senha_usuario = $_POST['senha_usuario'];

    $campos_insert = "id_tipo_usuario,nivel_usuario,login_usuario,senha_usuario";
    $values = "$id_tipo_usuario,'$nivel_usuario','$login_usuario','$senha_usuario'";
    $query = "insert into tbusuarios ($campos_insert) values ($values);";
    $resultado = $conn->query($query);

    //Após o insert redireciona a página
    if (mysqli_insert_id($conn)) {
        header("location:usuarios_lista.php");
    } else {
        header("location:usuarios_lista.php");
    }
}

//Chave estrangeira tipo
$query_tipo = "select * from tbusuarios order by nivel_usuario asc";
$lista_fk = $conn->query($query_tipo);
$linha_fk = $lista_fk->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/meu_estilo.css" type="text/css">
    <title><?php echo SYS_NAME . " - " ?> Inserir</title>
</head>

<body class="fundofixo">
    <?php include('menu_adm.php'); ?>
    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-2 col-md-8">
            <h3 class="breadcrumb text-warning">
                    <a href="usuarios_lista.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Inserindo Usuarios
                </h3>
                <div class="thumbnail">
                        <div class="alert alert-danger" role="alert">
                                <form action="produtos_insere.php" name="produtos_insere.php" method="post" enctype="multipart/form-data">

                                    <!-- Seleciona o tipo do produto -->
                            <label for="id_tipo_usuario">Tipo:</label>
                            <div class="from-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-task"></span>
                                </span>
                                <select name="id_tipo_usuario" id="id_tipo_usuario" class="form-control" required>
                                <?php do { ?>
                                        <option value="<?php echo $linha_fk['id_usuario']; ?>">
                                            <?php echo $linha_fk['nivel_usuario']; ?>
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


                                </form>
                        </div>
                </div>
            </div>
        </div>

    </main>

</body>

</html>