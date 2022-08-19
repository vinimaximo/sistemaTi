<?php
//Incluindo variavéis de ambiente, acesso e banco
include('../config.php');
include('acesso_com.php'); // Importante!!!!!!!!!
include('../connections/conn.php');

if ($_POST) {
    // Guardando o nome da imagem no banco de dados e o arquivo na pasta images
    if ($_FILES['imagem_produto']['name']) {
        $nome_img = $_FILES['imagem_produto']['name'];
        $tmp_img = $_FILES['imagem_produto']['tmp_name'];
        $pasta_img = "../images/" . $nome_img;
        move_uploaded_file($tmp_img, $pasta_img);
    } else {
        $nome_img = $_POST['imagem_produto_atual'];
    }
    //Receber os dados do formulario
    //Organizar os campos na mesma ordem
    $id_tipo_produto = $_POST['id_tipo_produto'];
    $destaque_produto = $_POST['destaque_produto'];
    $descri_produto = $_POST['descri_produto'];
    $resumo_produto = $_POST['resumo_produto'];
    $valor_produto = $_POST['valor_produto'];
    $imagem_produto = $nome_img;

    //Campo do form para filtrar o registro
    $id_filtro = $_POST['id_produto'];

    //Consulta (query) Sql para inserção dos dados
    $query = "update tbprodutos set destaque_produto = '" . $destaque_produto . "',descri_produto = '" . $descri_produto . "',
    resumo_produto = '" . $resumo_produto . "', valor_produto = " . $valor_produto . ",imagem_produto = '" . $imagem_produto . "'
    where id_produto = " . $id_filtro . ";";
    $resultado = $conn->query($query);

    //Após a ação a página será direcionada
    if (mysqli_insert_id($conn)) {
        header('location: produtos_lista.php');
        //Adicionar um tratamento 
    } else {
        header('location: produtos_lista.php');
    }
}
//Consulta para recuperar dados do filtro da chamada da página...
$id_alterar = $_GET['id_produto'];
$query_busca = "select * from tbprodutos where id_produto = .$id_alterar";
$lista = $conn->query($query_busca);
$linha = $lista->fetch_assoc();
$total_linhas = $lista->num_rows;

$consulta_fk = "select * from tbtipos";
$lista_fk = $conn->query($consulta_fk);
$linha_fk = $lista_fk->fetch_assoc();
$total_linhas_fk = $lista_fk->num_rows;


?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/meu_estilo.css" type="text/css">
    <title><?php echo SYS_NAME ?> (Alterar)</title>
</head>

<body class="fundofixo">
    <?php include('menu_adm.php'); ?>
    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-4">
                <h3 class="breadcrumb text-danger">
                    <a href="produtos_lista.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Atualizando Produtos
                </h3>
            </div>

        </div>



    </main>

</body>

</html>