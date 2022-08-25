<?php
//Incluindo variáveis de ambiente, acesso e banco
include('../config.php');
include('acesso_com.php'); //Importante!!!!!!!!!!!! Autentica o usuário
include('../connections/conn.php');

if ($_POST) {
    //Reber os dados do formulário
    //organizar os campos na mesma ordem
    $id_nivel_usuario = $_POST['id_nivel_usuario'];
    $login_usuario = $_POST['login_usuario'];
    $senha_usuario = $_POST['senha_usuario'];
  

    //Campo do form para filtar o registro
    $id_filtro = $_POST['id_usuario'];

    //Consulta(query) Sql para inserção dos dados
    $query = "update tbusuarios
                            set id_nivel_usuario = '" . $id_nivel_usuario . "',
                            login_usuario = '" . $login_usuario . "',
                            senha_usuario = '" . $senha_usuario . "',                       
                            where id_usuario = " . $id_filtro . ";";

    $resultado = $conexao->query($query);

    //Após a ação a página será direcionada
    if (mysqli_insert_id($conexao)) {
        header('location: usuarios_lista.php');
    } else {
        header('location: usuarios_lista.php');
    }
}

//Consulta para recuperar dados do filtro da chamada da página...
$id_alterar = $_GET['id_usuario'];
$query_busca = "select * from tbusuarios where id_usuario = " . $id_alterar;
$lista = $conexao->query($query_busca);
$linha = $lista->fetch_assoc();
$totalLinhas = $lista->num_rows;

$consulta_fk = "select * from tbnivel order by nome_nivel asc";

$lista_fk = $conexao->query($consulta_fk);
$linha_fk = $lista_fk->fetch_assoc();
$totalLinha_fk = $lista_fk->num_rows;


?>
<!DOCTYPE html>
<html lang="pt-br">

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
                            <!-- Select id_nivel_usuario -->
                            <label for="id_nivel_usuario">Nível do Usuário:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                                </span>

                                <select name="id_nivel_usuario" id="id_nivel_usuario" class="form-control" required>
                                    <?php do { ?>
                                        <option value="<?php echo $linha_fk['id_nivel']; ?>" <?php
                                                                                                if (!(strcmp($linha_fk['id_nivel'], $linha['id_nivel_usuario']))) {
                                                                                                    echo "selected=\"selected\"";
                                                                                                } ?>>

                                            <?php echo $linha_fk['nome_nivel']; ?>
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
                            <!-- file foto_usuario Atual-->
                            <label for="foto_usuario_atual">Foto Atual:</label>
                            <img src="../images/<?php echo $linha['foto_usuario']; ?>" alt="" class="img-responsive" style="max-width: 40%;">
                            <!-- Guarda o nome da foto caso ela não seja alterada -->
                            <input type="hidden" name="foto_usuario_atual" id="foto_usuario_atual" value="<?php echo $linha['foto_usuario']; ?>">
                            <br>
                            <!-- file foto_usuario Nova-->
                            <label for="foto_usuario">Nova Foto:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
                                </span>
                                <img src="" alt="" name="foto" id="foto" class="img-responsive">
                                <input type="file" name="foto_usuario" id="foto_usuario" class="form-control" accept="image/*">
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
    <!-- Script para a imagem -->
    <script>
        document.getElementById("foto_usuario").onchange = function() {
            var reader = new FileReader();
            if (this.files[0].size > 528385) {
                alert("A imagem deve ter no máximo 500KB");
                $("#foto").attr("src", "blank");
                $("#foto").hide();
                $("#foto_usuario").wrap('<form>').closest('form').get(0).reset();
                $("#foto_usuario").unwrap();
                return false;

            }
            // Verifica se o input do titpo file possui dado
            if (this.files[0].type.indexOf("image") == -1) {
                alert("Formato inválido, escolha uma imagem!");
                $("#foto").attr("src", "blank");
                $("#foto").hide();
                $("#foto_usuario").wrap('<form>').closest('form').get(0).reset();
                $("#foto_usuario").unwrap();
                return false;
            };
            reader.onload = function(e) {
                //Obter dados  carregados e renderizar a miniatura
                document.getElementById("#foto").src = e.target.result;
                $("#foto").show();
            };
            reader.readAsDataURL(this.files[0]);
        };
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>
<?php
mysqli_free_result($lista);
mysqli_free_result($lista_fk);

?>