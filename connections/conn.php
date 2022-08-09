<?php 
// comentário de linha
$hotname_conn = "localhost";
$database_conn = "sistemaDb";
$username_conn = "root";
$password_conn = "";
$charset_conn = "utf8";

// definindo os parâmetros da conexão
$conn = new mysqli($hotname_conn,$username_conn,$password_conn,$database_conn);

// definindo conjunto de caracteres da conexão
mysqli_set_charset($conn,$charset_conn);

//verificando possiveis erros de conexão
if ($conn->connect_error) {
    echo "Erro: ".$conn->connect_error;
}

?>