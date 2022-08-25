<?php
//Incluindo variáveis de ambiente, acesso e banco
include('../config.php');
include('acesso_com.php'); //Importante!!!!!!!!!!!! Autentica o usuário
include('../connections/conn.php');

if ($_POST) {
    //Reber os dados do formulário
    //organizar os campos na mesma ordem
    $nivel_usuario = $_POST['nivel_usuario'];
    $login_usuario = $_POST['login_usuario'];
    $senha_usuario = $_POST['senha_usuario'];
  

    //Campo do form para filtar o registro
    $id_filtro = $_POST['id_usuario'];

    //Consulta(query) Sql para inserção dos dados
    $query = "update tbusuarios
                            set nivel_usuario = '" . $nivel_usuario . "',
                            login_usuario = '" . $login_usuario . "',
                            senha_usuario = '" . $senha_usuario . "',                       
                            where id_usuario = " . $id_filtro . ";";

    $resultado = $conn->query($query);

    //Após a ação a página será direcionada
    if (mysqli_insert_id($conn)) {
        header('location: usuarios_lista.php');
    } else {
        header('location: usuarios_lista.php');
    }
}

//Consulta para recuperar dados do filtro da chamada da página...
$id_alterar = $_GET['id_usuario'];
$query_busca = "select * from tbusuarios where id_usuario = " . $id_alterar;
$lista = $conn->query($query_busca);
$linha = $lista->fetch_assoc();
$totalLinhas = $lista->num_rows;

$consulta_fk = "select * from tbusuarios order by login_usuario asc";

$lista_fk = $conn->query($consulta_fk);
$linha_fk = $lista_fk->fetch_assoc();
$totalLinha_fk = $lista_fk->num_rows;


?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <<?php echo SYS_NAME; ?> - Atualizar Usuário </title>
            <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
            <link href="../css/meu_estilo.css" rel="stylesheet" type="text/css">
</head>

<body class="fundofixo">
    <?php include('menu_adm.php'); ?>
    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-2 col-md-8">
                <h2 class="breadcrumb tex-danger">
                    <a href="usuarios_lista.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Atualizando Usuários
                </h2>
                <div class="thumbnail">
                    <!-- Abre thumbnail -->
                    <div class="alert alert-danger" role="alert">
                        <form action="usuario_atualiza.php" method="post" id="form_usuario_atualiza" name="usuario_atualiza" enctype="multipart/form-data">
                            <!--Inserir o campo id_usuário oculto para uso no filtro -->
                            <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $linha['id_usuario']; ?>">
                            <!-- Select nivel_usuario -->
                            <label for="nivel_usuario">Nível do Usuário:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                                </span>

                                <select name="nivel_usuario" id="nivel_usuario" class="form-control" required>
                                    <?php do { ?>
                                        <option value="<?php echo $linha_fk['id_usuario']; ?>" <?php
                                                                                                if (!(strcmp($linha_fk['id_usuario'], $linha['nivel_usuario']))) {
                                                                                                    echo "selected=\"selected\"";
                                                                                                } ?>>

                                            <?php echo $linha_fk['nivel_usuario']; ?>
                                        </option>
                                    <?php } while ($linha_fk = $lista_fk->fetch_assoc());
                                    $linhas_fk = mysqli_num_rows($lista_fk);
                                    if ($linhas_fk > 0) {
                                        mysqli_data_seek($lista_fk, 0);
                                        $linhas_fk = $lista_fk->fetch_assoc();
                                    }
                                    ?>
                                </select>
                            </div>
                            <br>
                            <!-- login_usuario -->
                            <label for="login_usuario">Login Usuário:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                </span>
                                <input type="text" class="form-control" id="login_usuario" name="login_usuario" maxlength="100" required value="<?php echo $linha['login_usuario']; ?>" placeholder="Digite o titulo do produto...">
                            </div>
                            <br>
                            <!-- senha_usuario -->
                            <label for="senha_usuario">Senha Usuário:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                </span>
                                <input type="password" class="form-control" id="senha_usuario" name="senha_usuario" maxlength="12" required value="<?php echo $linha['senha_usuario']; ?>" placeholder="Digite o titulo do produto...">
                            </div>
                            <br>
                            
                            
                            <!-- Botão Enviar -->
                            <input type="submit" value="Atualizar" name="enviar" id="enviar" class="btn btn-danger btn-block">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" 
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>

</html>
<?php
mysqli_free_result($lista);
mysqli_free_result($lista_fk);

?>