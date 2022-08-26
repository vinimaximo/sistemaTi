<?php
//Sistema de autenticação
include('acesso_com.php');
//Variaveis de ambiente
include('../config.php');
//Conexão com banco
include('../connections/conn.php');


if ($_POST) {
    $id_tipo = $_POST['id_tipo'];
    $sigla_tipo = $_POST['sigla_tipo'];
    $rotulo_tipo = $_POST['rotulo_tipo'];


    $campos_insert = "id_tipo_usuario,nivel_usuario,login_usuario";
    $values = "$id_tipo_usuario,'$nivel_usuario','$login_usuario'";
    $query = "insert into tbtipos ($campos_insert) values ($values);";
    $resultado = $conn->query($query);

    //Após o insert redireciona a página
    if (mysqli_insert_id($conn)) {
        header("location:tipos_lista.php");
    } else {
        header("location:tipos_lista.php");
    }
}

//Chave estrangeira tipo
$query_tipo = "select * from tbtipos order by rotulo_tipo asc";
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
                    <a href="tipos_lista.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Inserindo Tipos
                </h3>
                <div class="thumbnail">
                    <div class="alert alert-danger" role="alert">
                        <form action="tipos_insere.php" name="tipos_insere.php" method="post" enctype="multipart/form-data">

                                 <!--Inserir o campo id_produto oculto para uso no filtro -->
                            <input type="hidden" name="id_tipo" id="id_tipo">
                            <!-- Select id_tipo_produto -->
                            <label for="id_tipo_produto">Nível:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>
                                </span>

                                <select name="id_tipo" id="id_tipo" class="form-control" required>
                                    <?php do { ?>
                                        <option value="<?php echo $linha_fk['id_tipo']; ?>">
                                            <?php echo $linha_fk['rotulo_tipo']; ?>
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
                            </div>
                            <!-- Text descri_produto -->
                            <label for="sigla_tipo">Sigla:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                </span>
                                <input type="text" class="form-control" id="sigla_tipo" name="sigla_tipo" maxlength="100" required  placeholder="Digite a sigla do Tipo">
                            </div>
                            <br>
                            <!-- Botão Enviar -->
                            <input type="submit" value="Cadastrar" name="enviar" id="enviar" class="btn btn-danger btn-block">



                        </form>
                    </div>

                </div>
            </div>

        </div>


    </main>
</body>

</html>