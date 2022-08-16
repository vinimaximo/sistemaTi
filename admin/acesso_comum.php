<?php 
//A sessão será iniciada a cada página diferente
//Determinar o nível de acesso, se necessário
session_name('chuleta');
if (!isset($_SESSION)){
    session_start();
}

//Verifica se há usuario logado na sessão
//Identifica o usuario
if(!isset($_SESSION['login_usuario'])){
    // Se não existir destruimos a sessão por segurança
    header("location: login.php");
    exit;
}
$nome_da_sessao = session_name();
// verifica o nome da sessão
if(!isset($_SESSION['nome_da_sessao'])OR($_SESSION['nome_da_sessao']!=$nome_da_sessao)){
// se não existir, destruiremos a sessão por segurança
session_destroy("location: login.php");
exit;
}

// verificar se o login e valido
if(!isset($_SESSION['login_usuario'])){
//se não existir, destruiremos a sessão por segurança
session_destroy();
header("location: login.php");
exit;

}
?>