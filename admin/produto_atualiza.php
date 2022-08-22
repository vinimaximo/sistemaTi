<?php
    //Incluindo variáveis de ambiente, acesso e banco
    include('../config.php');
    include('acesso_com.php'); //Importante!!!!!!!!!!!! Autentica o usuário
    include('../connections/conn.php');

    if ($_POST) {
        //Guardando o nome da imagem no banco de dados e o arquivo na pasta images;
        if ($_FILES['imagem_produto']['name']) {
            $nome_img = $_FILES['imagem_produto']['name'];
            $tmp_img = $_FILES['imagem_produto']['tmp_name'];
            $pasta_img = "../images" . $nome_img;
            move_uploaded_file($tmp_img, $pasta_img);
        } else {
            $nome_img = $_POST['imagem_produto_atual'];
        }

        //Reber os dados do formulário
        //organizar os campos na mesma ordem
        $id_tipo_produto = $_POST['id_tipo_produto'];
        $destaque_produto = $_POST['destaque_produto'];
        $descri_produto = $_POST['descri_produto'];
        $resumo_produto = $_POST['resumo_produto'];
        $valor_produto = $_POST['valor_produto'];
        $disponivel_produto = $_POST['disponivel_produto'];
        $imagem_produto = $nome_img;

        //Campo do form para filtar o registro
        $id_filtro = $_POST['id_produto'];

        //Consulta(query) Sql para inserção dos dados
        $query = "update tbprodutos
                            set id_tipo_produto = '" . $id_tipo_produto . "',
                            destaque_produto = '" . $destaque_produto . "',
                            descri_produto = '" . $descri_produto . "',
                            resumo_produto = '" . $resumo_produto . "',
                            valor_produto = " . $valor_produto . ", 
                            disponivel_produto = '" . $disponivel_produto . "',
                            imagem_produto = '" . $imagem_produto . "'
                            where id_produto = " . $id_filtro . ";";

        $resultado = $conn->query($query);

        //Após a ação a página será direcionada
        if (mysqli_insert_id($conn)) {
            header('location: produtos_lista.php');
        } else {
            header('location: produtos_lista.php');
        }
    }

    //Consulta para recuperar dados do filtro da chamada da página...
    $id_alterar = $_GET['id_produto'];
    $query_busca = "select * from tbprodutos where id_produto = " . $id_alterar;
    $lista = $conn->query($query_busca);
    $linha = $lista->fetch_assoc();
    $totalLinhas = $lista->num_rows;

    $consulta_fk = "select * from tbtipos order by rotulo_tipo asc";

    $lista_fk = $conn->query($consulta_fk);
    $linha_fk = $lista_fk->fetch_assoc();
    $totalLinha_fk = $lista_fk->num_rows;


    ?>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <<?php echo SYS_NAME; ?> - Admin (Alterar)</title>
                <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
                <link href="../css/meu_estilo.css" rel="stylesheet" type="text/css">
    </head>

    <body class="fundofixo">
        <?php include('menu_adm.php'); ?>
        <main class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6">
                    <h3 class="breadcrumb tex-danger">
                        <a href="produtos_lista.php">
                            <button class="btn btn-danger">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </button>
                        </a>
                        Atualizando Produtos
                    </h3>
                    <div class="thumbnail">
                        <!-- Abre thumbnail -->
                        <div class="alert alert-danger" role="alert">
                            <form action="produto_atualiza.php" method="post" id="form_produto_atualiza" name="form_produto_atualiza" enctype="multipart/form-data">
                                <!--Inserir o campo id_produto oculto para uso no filtro -->
                                <input type="hidden" name="id_produto" id="id_produto" value="<?php echo $linha['id_produto']; ?>">
                                <!-- Select id_tipo_produto -->
                                <label for="id_tipo_produto">Tipo</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                                    </span>

                                    <select name="id_tipo_produto" id="id_tipo_produto" class="form-control" required>
                                        <?php do { ?>
                                            <option value="<?php echo $linha_fk['id_tipo'] ?>" <?php
                                                                                                if (!(strcmp($linha_fk['id_tipo'], $linha['id_tipo_produto']))) {
                                                                                                    echo "selected=\"selected\"";
                                                                                                }
                                                                                                ?>>
                                                <?php echo $linha_fk['rotulo_tipo']; ?>
                                            </option>
                                        <?php } while ($linha_fk = $lista_fk->fetch_assoc());
                                            $linhas_fk = mysqli_num_rows($lista_fk);
                                            if($linhas_fk>0){
                                                mysqli_data_seek($lista_fk,0);
                                                $linhas_fk = $lista_fk->fetch_assoc();
                                            }
                                        ?>
                                    </select>

                                </div>
                                <!-- radio destaque_produto -->
                                <label for="destaque_produto">Destaque?</label>
                                <div class="input-group">
                                    <label for="destaque_produto_s" class="radio-inline">
                                        <input type="radio" name="destaque_produto" id="destaque_produto" value="Sim" <?php echo $linha['destaque_produto'] == "Sim" ? "checked" : null ?>>
                                        Sim
                                    </label>
                                    <label for="destaque_produto_n" class="radio-inline">
                                        <input type="radio" name="destaque_produto" id="destaque_produto" value="Não" <?php echo $linha['destaque_produto'] == "Não" ? "checked" : null ?>>
                                        Não
                                    </label>
                                </div>
                                <br>
                                <!-- Text descri_produto -->
                                <label for="descri_produto">Descrição:</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                                    </span>
                                    <input type="text" class="form-control" id="descri_produto" name="descri_produto" maxlength="100" required value="<?php echo $linha['descri_produto']; ?>" placeholder="Digite o titulo do produto...">
                                </div>
                                <br>
                                <!-- textarea de resumo_produto -->
                                <label for="resumo_produto">Resumo</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                                    </span>
                                    <textarea name="resumo_produto" id="resumo_produto" cols="30" rows="8" placeholder="Digite os detalhes do produto..." class="form-control"><?php echo $linha['resumo_produto']; ?>
                                </textarea>
                                </div>
                                <br>
                                <!-- number valor_produto -->
                                <label for="valor_produto">Valor: R$</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
                                    </span>
                                    <input type="number" name="valor_produto" id="valor_produto" min="0" step="0.01" class="form-control" value="<?php echo $linha['valor_produto']; ?>">
                                </div>
                                <br>
                                <!-- file imagem_produto Atual-->
                                <label for="imagem_produto_atual">Imagem Atual:</label>
                                <img src="../images/<?php echo $linha['imagem_produto']; ?>" alt="" class="img-responsive" style="max-width: 40%;">
                                <!-- Guarda o nome da imagem caso ela não seja alterada -->
                                <input type="hidden" name="imagem_produto_atual" id="imagem_produto_atual" value="<?php echo $linha['imagem_produto']; ?>">
                                <br>
                                <!-- file imagem_produto Nova-->
                                <label for="imagem_produto">Nova Imagem:</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
                                    </span>
                                    <img src="" alt="" name="imagem" id="imagem" class="img-responsive">
                                    <input type="file" name="imagem_produto" id="imagem_produto" class="form-control" accept="image/*">
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
            document.getElementById("imagem_produto").onchange = function(){
                var reader = new FileReader();
                if(this.files[0].size>528385){
                    alert("A imagem deve ter no máximo 500KB");
                    $("#imagem").attr("src", "blank");
                    $("#imagem").hide();
                    $("#imagem_produto").wrap('<form>').closest('form').get(0).reset();
                    $("#imagem_produto").unwrap();
                    return false;

                }
                // Verifica se o input do titpo file possui dado
                if(this.files[0].type.indexOf("image")==-1){
                    alert("Formato inválido, escolha uma imagem!")
                    $("#imagem").attr("src", "blank");
                    $("#imagem").hide();
                    $("#imagem_produto").wrap('<form>').closest('form').get(0).reset();
                    $("#imagem_produto").unwrap();
                    return false;
                };
                reader.onload = function (e) {
                    //Obter dados  carregados e renderizar a miniatura
                    document.getElementById("imagem").src = e.target.result;
                    $("#imagem").show();
                };
                reader.readAsDataURL(this.files[0]);
            };
        </script>
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