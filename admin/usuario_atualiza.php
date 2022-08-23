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
    $query = "update tbprodutos
                set id_tipo_produto = '" . $id_tipo_produto . "',
                descri_produto = '" . $descri_produto . "', 
                destaque_produto = '" . $destaque_produto . "',";
              
    $resultado = $conn->query($query);

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
$query_busca = "select * from tbusuario where id_usuario = " ;
$lista = $conn->query($query_busca);
$linha = $lista->fetch_assoc();
$total_linhas = $lista->num_rows;

$consulta_fk = "select * from tbusuario order by nivel_usuario asc";

$lista_fk = $conn->query($consulta_fk);
$linha_fk = $lista_fk->fetch_assoc();
$total_linhas_fk = $lista_fk->num_rows;

?>