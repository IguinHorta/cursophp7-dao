<?php

require_once "config.php";

// $sql = new Sql();
// $user = $sql->select("SELECT * FROM tb_usuarios");
// echo json_encode($user);

//Carrega um usario
//$root = new Usuario();
//$root->loadById(2);
//echo $root;

// Carrega uma lista de usuários
// $lista = Usuario::getList();
// echo json_encode($lista);

// Carrega uma liusta de usuarios, buscando pelo login
// $search = Usuario::search("o");
// echo json_encode($search);

// Carrega um usuario usando o login e a senha
// $usuario = new Usuario();
// $usuario->login("RosinerHorta", "mimita10");
// echo $usuario;

// Criando um novo usuário
// $aluno = new Usuario("Lua", "4y3oi");
// $aluno->insert();
// echo $aluno;

$usuario = new Usuario();
$usuario->loadById(4);
$usuario->update("Sol", "89¨&@#");
echo $usuario;

?>