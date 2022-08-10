<?php 
// comentário linha
$hostname_conn = "localhost";
$database_conn = "sistemaDb";
$username_conn = "root";
$password_conn = "";
$charset_conn = "utf8";

// definindo parâmetros da conexão
$conn = new mysqli($hostname_conn,$username_conn,$password_conn,$database_conn);  

// definindo conjunto de caracteres da conexão
mysqli_set_charset($conn,$charset_conn);

// verificando possíveis erros de conexão
if ($conn->connect_error) {
    echo "Erro: ".$conn->connect_error;
}

?>