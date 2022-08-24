<?php 
include("../config.php");
include("./acesso_com.php");// Importante!!! - Para a autenticação do usuário
include('../connections/conn.php');// Conexão com o banco

if($_POST){

    // Receber os dados do formulário
    // Organizar os campos na mesma ordem 
    $id_usuario = $_POST['id_usuario'];
    $login_usuario = $_POST['login_usuario'];
    $senha_usuario = $_POST['senha_usuario'];
    $nivel_usuario = $_POST['nivel_usuario'];

    // Campo do form para filtrar o registro
    $id_filtro = $_POST['id_usuario'];

    // Campo do form para filtrar o registro
    $id_filtro = $_POST['id_produto'];

    // Colsulta (query) sql para inserção dos dados
    $query = "update tbprodutos
                set id_usuario = '".$id_usuario."',
                login_usuario = '".$login_usuario."', 
                senha_usuario = '".$senha_usuario."',
                nivel_usuario = '".$nivel_usuario."',
                 where id_usuario = ". $id_filtro.";";
    $resultado = $conn->query($query);

    // Ápos a ação a página será direcionada
    if(mysqli_insert_id($conn)){
        header('location: usuarios_lista.php');
        // Adicionar tratamento...
    }else{
        header('location: usuarios_lista.php');
    }
}

// Consulta para recuperar dados do filtro da chamada da página...
$id_alterar = $_GET['id_usuario'];
$query_busca = "select * from tbusuarios where id_usuario = ".$id_alterar;
$lista = $conn->query($query_busca);
$linha = $lista->fetch_assoc();
$total_linhas = $lista->num_rows;

$consulta_fk = "select * from tbusuarios order by login_usuario asc";

$lista_fk = $conn->query($consulta_fk);
$linha_fk = $lista_fk->fetch_assoc();
$total_linhas_fk = $lista_fk->num_rows;

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/meu_estilo.css">
    <title><?php echo SYS_NAME. " - "?> Alterar</title>
</head>
<body>
<?php include('menu_adm.php');?>
    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-2 col-md-8">
                <h3 class="breadcrumb text-danger">
                    <a href="usuarios_lista.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Atualizando Usuarios
                </h3>
                <div class="thumbnail"><!-- Abre thumbnail -->
                    <div class="alert alert-danger" role="alert">
                        <form action="usuario_atualiza.php" method="post" 
                        id="form_usuario_atualiza" name="form_usuario_atualiza"
                        enctype="multipart/form-data">
                            <!-- Inserir o campo id_produto OCULTO para uso no filtro -->
                            <input type="hidden" name="id_usuario" id="id_usuario"
                            value="<?php echo $linha['id_usuario'];?>">
                        <!-- Select id_tipo_produto -->
                        <label for="id_usuario">Nível Usuario:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                            </span>
                            <select name="id_usuario" id="id_usuario" class="form-control" required>
                                <?php do {?>
                                <option value="<?php echo $linha_fk['id_usuario']?>"
                                    <?php 
                                    if(!(strcmp($linha_fk['id_usuario'],$linha['id_usuario'])))
                                    {echo "selected=\"selected\"";}
                                    ?>>
                                    <?php echo $linha_fk['nivel_usuario'];?>
                                </option>
                                <?php } while($linha_fk = $lista_fk->fetch_assoc());
                                $linhas_fk = mysqli_num_rows($lista_fk);
                                if($linhas_fk>0){
                                    mysqli_data_seek($lista_fk,0);
                                    $linhas_fk = $lista_fk->fetch_assoc();
                                }
                                ?>
                            </select>
                        </div>
                        <br>
                        <!-- Text descri_produto -->
                        <label for="descri_produto">Descrição:</label>
                        <div class="input-group">
                        <span class="input-group-addon">
                                <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                            </span>
                            <input type="text" class="form-control" 
                            id="descri_produto" 
                            name="descri_produto" 
                            maxlength="100" 
                            required 
                            value="<?php echo $linha['descri_produto'];?>"
                            placeholder="Digite o titulo do produto...">
                        </div>
                        <br>
                        <!-- Textarea de resumo_produto -->
                        <label for="resumo_produto">Resumo:</label>
                        <div class="input-group">
                        <span class="input-group-addon">
                                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                            </span>
                            <textarea name="resumo_produto" id="resumo_produto" cols="30" rows="8"
                            placeholder="Digite os detalhes do produto..." class="form-control">
                                <?php echo $linha['resumo_produto'];?>
                            </textarea>
                        </div>
                        <!-- Number valor_produto -->
                        <label for="valor_produto">Valor: R$</label>
                        <div class="input-group">
                        <span class="input-group-addon">
                                <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
                            </span>
                            <input type="number" name="valor_produto" id="valor_produto"
                                min="0" step="0.01" class="form-control" value="<?php echo $linha['valor_produto'];?>">
                        </div>
                        <!-- Botão enviar -->
                        <input type="submit" value="Atualizar" name="enviar" id="enviar" class="btn btn-danger btn-block">
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </main>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
<?php 
mysqli_free_result($lista);
mysqli_free_result($lista_fk);
?>