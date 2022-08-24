<?php 
//Incluindo sistema de autenticação
include('acesso_com.php');

//Incluindo conexão com banco de dados
include('../connections/conn.php');

$id_prod = $_GET['id_produto'];

//Removendo Usando músculos (Força Bruta)
$query = "delete from tbprodutos where id_produto = $id_prod;";

//Removendo(mais ou menoss) Usando metodo de acumular (Vai que precisa outra hora)
//$query = "delete from tbprodutos set deletado = default where id_produto = $id_prod;";


$resultado = $conn->query($query);
if(mysqli_insert_id($conn)){
    header("location:produtos_lista.php");

}else{
    header("location:produtos_lista.php");
}
?>