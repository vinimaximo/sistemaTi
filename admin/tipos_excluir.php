<?php 
//Incluindo sistema de autenticação
include('acesso_com.php');

//Incluindo conexão com banco de dados
include('../connections/conn.php');

$id_tipo = $_GET['id_tipo'];

//Removendo Usando músculos (Força Bruta)
$query = "delete from tbtipos where id_tipo = $id_tipo;";

//Removendo(mais ou menoss) Usando metodo de acumular (Vai que precisa outra hora)
//$query = "delete from tbprodutos set deletado = default where id_produto = $id_prod;";


$resultado = $conn->query($query);
if(mysqli_insert_id($conn)){
    header("location:tipos_lista.php");

}else{
    header("location:tipos_lista.php");
}
?>