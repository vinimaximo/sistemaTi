<?php
//Variaveis de ambiente
include('../config.php');
//Conexão com banco
include('../connections/conn.php');


if($_POST){
 $id_tipo_reserva = $_POST['id_tipo_reserva'];
 $email_reserva = $_POST['email_reserva'];
 $tipo_reserva = $_POST['tipo_reserva']; 
$login_reserva = $_POST['login_reserva'];
$senha_cliente = $_POST['senha_usuario'];
$cpf_reserva = $_POST['cpf_reserva'];

$campos_insert = "id_tipo_reserva,email_reserva,tipo_reserva,login_reserva,senha_usuario,cpf_reserva";
$values = "$id_tipo_reserva,'$email_reserva','$tipo_reserva','$login_reserva',$senha_usuario,'$cpf_reserva'";
$query = "insert into tbreserva ($campos_insert) values ($values);";
$resultado = $conn->query($query);

//Após o insert redireciona a página
if(mysqli_insert_id($conn)){
    header("location:produtos_lista.php");
}else{
    header("location:produtos_lista.php");
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
                        <form action="produtos_insere.php" name="produtos_insere.php" method="post" enctype="multipart/form-data">
                            <!-- Seleciona o tipo do produto -->
                            <label for="id_tipo_produto">Tipo:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-tasks"></span>
                                </span>
                                <select name="id_tipo_produto" id="id_tipo_produto" class="form-control" required>
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
                            <label for="destaque_produto">Destaque:</label>
                            <div class="input-group">
                                <label for="destaque_produto_s" class="radio_inline">
                                    <input type="radio" name="destaque_produto" value="Sim">Sim
                                </label>
                                <label for="destaque_produto_s" class="radio_inline">
                                    <input type="radio" name="destaque_produto" value="Não">Não
                                </label>
                            </div>
                            <!-- Fecha a div do radio Button -->
                            <br>
                            <label for="descri_produto">Descrição:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-cutelary" aria-hidden="true"></span>
                                </span>
                                <input type="text" class="form-control" name="descri_produto" id="descri_produto" placeholder="Digite o Titulo do produto" maxlength="100" required>
                            </div>
                            <br>
                            <label for="resumo_produto">Resumo:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                                </span>
                                <textarea name="resumo_produto" id="resumo_produto" cols="30" rows="8" placeholder="Digite os detalhes do produto" class="form-control"></textarea>
                            </div>
                            <br>
                            <label for="valor_produto">Valor:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
                                </span>
                                <input type="number" class="form-control" name="valor_produto" id="valor_produto" min="0" step="0.01">
                            </div>
                            <br>
                            <label for="imagem_produto">Imagem</label>
                            <div class="input-group">
                                <span class="input-group-addon" aria-hidden="true">
                                    <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
                                </span>
                                <img src="" alt="" id="imagem" class="img-responsive">
                                <input type="file" class="form-control" name="imagem_produto" id="imagem_produto" accept="image/*">
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
    
    <script>
        document.getElementById("imagem_produto").onchange = function() {
            var reader = new FileReader();
            if (this.files[0].size > 528385) {
                alert("A imagem deve ter no máximo 500KB");
                $("#imagem").attr("src", "blank");
                $("#imagem").hide();
                $("#imagem_produto").wrap('<form>').closest('form').get(0).reset();
                $("#imagem_produto").unwrap();
                return false;
            }
            // verifica se o input do tipo file possui dados
            if (this.files[0].type.indexOf("image") == -1) {
                alert("Formato inválido, escolha uma imagem!");
                $("#imagem").attr("src", "blank");
                $("#imagem").hide();
                $("#imagem_produto").wrap('<form>').closest('form').get(0).reset();
                $("#imagem_produto").unwrap();
            }
            reader.onload = function(e) {
                // obter dados carregados e renderizar a miniatura
                document.getElementById("imagem").src = e.target.result;
                $("#imagem").show();
            }
            reader.readAsDataURL(this.files[0]);
        };
    </script>





    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>