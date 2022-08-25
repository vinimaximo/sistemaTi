<?php
include("../config.php");
include("./acesso_com.php"); // Importante!!! - Para a autenticação do usuário
include('../connections/conn.php'); // Conexão com o banco

if ($_POST) {

    // Receber os dados do formulário
    // Organizar os campos na mesma ordem 
    $id_tipo = $_POST['id_tipo'];
    $sigla_tipo = $_POST['sigla_tipo'];
    $rotulo_tipo = $_POST['rotulo_tipo'];

    // Campo do form para filtrar o registro
    $id_filtro = $_POST['id_tipo'];


    // Colsulta (query) sql para inserção dos dados
    $query = "update tbtipos
                set id_tipo = '" . $id_tipo . "',
                sigla_tipo = '" . $sigla_tipo . "', 
                rotulo_tipo = '" . $rotulo_tipo . "',
                 where id_tipo = " . $id_filtro . ";";
    $resultado = $conn->query($query);

    // Ápos a ação a página será direcionada
    if (mysqli_insert_id($conn)) {
        header('location: tipos_lista.php');
        // Adicionar tratamento...
    } else {
        header('location: tipos_lista.php');
    }
}
// Consulta para recuperar dados do filtro da chamada da página...
$id_alterar = $_GET['id_tipo'];
$query_busca = "select * from tbtipos where id_tipo = " . $id_alterar;
$lista = $conn->query($query_busca);
$linha = $lista->fetch_assoc();
$total_linhas = $lista->num_rows;

$consulta_fk = "select * from tbtipos order by rotulo_tipo asc";

$lista_fk = $conn->query($consulta_fk);
$linha_fk = $lista_fk->fetch_assoc();
$total_linhas_fk = $lista_fk->num_rows;
?>
<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/meu_estilo.css">
    <title><?php echo SYS_NAME . " - " ?> Alterar</title>
</head>

<body>
    <?php include('menu_adm.php'); ?>
    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-2 col-md-8">
                <h3 class="breadcrumb text-danger">
                    <a href="tipos_lista.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Atualizando tipos
                </h3>
                <div class="thumbnail">
                    <!-- Abre thumbnail -->
                    <div class="alert alert-danger" role="alert">
                        <form action="tipos_atualiza.php" method="post" id="form_tipos_atualiza" name="form_tipos_atualiza" enctype="multipart/form-data">
                            <!-- Inserir o campo id_produto OCULTO para uso no filtro -->
                            <input type="hidden" name="id_tipo" id="id_tipo" value="<?php echo $linha['id_tipo']; ?>">
                            <!-- Select id_tipo_produto -->
                            <label for="id_tipo">Nível Usuario:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                                </span>
                                <select name="id_usuario" id="id_usuario" class="form-control" required>
                                    <?php do { ?>
                                        <option value="<?php echo $linha_fk['id_tipo'] ?>" <?php
                                                                                                if (!(strcmp($linha_fk['id_tipo'], $linha['id_tipo']))) {
                                                                                                    echo "selected=\"selected\"";
                                                                                                }
                                                                                                ?>>
                                            <?php echo $linha_fk['sigla_tipo']; ?>
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
                            <!-- Text descri_produto -->
                            <label for="rotulo_tipo">Descrição:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                                </span>
                                <input type="text" class="form-control" id="rotulo_tipo" name="rotulo_tipo" maxlength="100" required value="<?php echo $linha['rotulo_tipo']; ?>" placeholder="Digite o titulo do produto...">
                            </div>
                            <br>
                            <!-- Botão enviar -->
                            <input type="submit" value="Atualizar" name="enviar" id="enviar" class="btn btn-danger btn-block">
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