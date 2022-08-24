<?php
//Incluindo variáveis de ambiente, acesso e banco
include('../config.php');
include('acesso_com.php'); // Importante!!! - Para a autenticação do usuário
include('../connections/conn.php'); // Conexão com o banco

if ($_POST) { 
    // Receber os dados do formulário
    // Organizar os campos na mesma ordem 
    $id_usuario = $_POST['id_usuario'];
    $login_usuario = $_POST['login_usuario'];
    $nivel_usuario = $_POST['nivel_usuario'];
    
    // Campo do form para filtrar o registro
    $id_filtro = $_POST['id_usuario'];

    // Colsulta (query) sql para inserção dos dados
    $query = "update tbusuarios
    set id_usuario = '" . $id_usuario . "',
    login_usuario = '" . $login_usuario . "',
    senha_usuario = '" . $senha_usuario . "',
    nivel_usuario = '" . $nivel_usuario . "',
    valor_produto = " . $valor_produto . ",
    foto_usuario = '" . $foto_usuario . "'
    where id_usuario = " . $id_filtro . ";";

$resultado = $conexao->query($query);

    // Ápos a ação a página será direcionada
    if (mysqli_insert_id($conn)) {
        header('location: usuario_lista.php');
        // Adicionar tratamento...
    } else {
        header('location: usuario_lista.php');
    }
}

// Consulta para recuperar dados do filtro da chamada da página...
$id_alterar = $_GET['id_usuario'];
$query_busca = "select * from tbusuarios where id_usuario = " . $id_alterar;
$lista = $conn->query($query_busca);
$linha = $lista->fetch_assoc();
$totalLinhas = $lista->num_rows;

$consulta2 = "select * from tbusuarios order by login_usuario asc";

    $lista2 = $conn->query($consulta2);
    $linha2 = $lista2->fetch_assoc();
    $totalLinha2 = $lista2->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/meu_estilo.css" type="text/css">
    <title><?php echo SYS_NAME . " - " ?> Alterar/Usuario</title>
</head>
<body class="fundofixo">
    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-2 col-md-8">
                <h3 class="breadcrumb text-danger">
                <a href="produtos_lista.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Atualizando Usuarios

                </h3>
                    <div class="thumbnail">
                        <form action="usuario_atualiza.php" method="post" id="form_usuario_atualiza" name="form_usuario_atualiza" enctype="multipart/form-data">
                            <!-- Inserir o campo id_produto OCULTO para uso no filtro -->
                            <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $linha['id_usuario']; ?>">
                            <!-- Select id_tipo_produto -->
                            <label for="nivel_usuario">Nome do Funcionário</label>
                            <div class="input-group">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                                    </span>

                                    <select name="nivel_usuario" id="nivel_usuario" class="form-control" required>
                                        <?php do { ?>
                                            <option value="<?php echo $linha2['id_usuario']; ?>" <?php
                                                                                                if (!(strcmp($linha2['id_usuario'], $linha['login_usuario']))) {
                                                                                                    echo "selected=\"selected\"";
                                                                                                } ?>>

                                                <?php echo $linha2['login_usuario']; ?>
                                            </option>
                                        <?php } while ($linha2 = $lista2->fetch_assoc());
                                        $linhas2 = mysqli_num_rows($lista2);
                                        if ($linhas2 > 0) {
                                            mysqli_data_seek($lista2, 0);
                                            $linhas2 = $lista2->fetch_assoc();
                                        }
                                        ?>
                                    </select>
                                </div>
                                 <!-- Radio destaque_produto -->
                            <label for="destaque_usuario">Destaque?</label>
                            <div class="input-group">
                                <label for="destaque_usuario" class="radio-inline">
                                    <input type="radio" name="destaque_usuario" id="destaque_usuario" value="Sim" <?php echo $linha['destaque_usuario'] == "Sim" ? "checked" : null; ?>>
                                    Sim
                                </label>
                                <label for="destaque_usuario" class="radio-inline">
                                    <input type="radio" name="destaque_usuario" id="destaque_usuario" value="Não" <?php echo $linha['destaque_usuario'] == "Não" ? "checked" : null; ?>>
                                    Não
                                </label>
                            </div>
                            <!-- Text descri_produto -->

                        </form>

                    </div>

            </div>






        </div>


    </main>
</body>
</html>