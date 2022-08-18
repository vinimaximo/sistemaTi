<?php 
//Incluindo o sistema de autenticação
include('acesso_com.php');

//Incluindo o arquivo de conexão
include('../connections/conn.php');

//Selecionando os dados
$consulta = "select * from tbusuarios order by login_usuarios asc";

// Buscar a lista completa de produtos
$lista = $conn->query($consulta);

// Separar produtos por linha
$linha = $lista->fetch_assoc();

// Contar número de linhas da lista
$totalLinhas = $lista->num_rows ;
?>