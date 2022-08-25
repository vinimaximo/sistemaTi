<?php 
//Incluindo sistema de autenticação
include('acesso_com.php');

//Incluindo conexão com banco de dados
include('../connections/conn.php');

$id_usuario = $_GET['id_usuario'];

//Removendo Usando músculos (Força Bruta)
$query = "delete from tbusuarios where id_usuario = $id_usuario;";

//Removendo(mais ou menoss) Usando metodo de acumular (Vai que precisa outra hora)
//$query = "delete from tbprodutos set deletado = default where id_produto = $id_prod;";


$resultado = $conn->query($query);
if(mysqli_insert_id($conn)){
    header("location:usuarios_lista.php");

}else{
    header("location:usuarios_lista.php");
}
?>
