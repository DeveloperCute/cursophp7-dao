<?php 
	
	require_once("config.php");

	//Carrega um usuário
	//$root = new usuario();
	//$root->loadById(3);
	//echo $root;

	//Carrega uma lista de usuários; 
	//$list = usuario::getList();
	//echo json_encode($list);

	//Carrega uma lista buscando pelo login
	//$search = usuario::search("ro");
	//echo json_encode($search);

	//CARREGA USUARIO USANDO LOGIN E SENHA;
	//$usuario = new usuario();
	//$usuario->Login("Marccus", "123456");
	//echo $usuario;

	//INSERE UM NOVO USUARIO 
	/*$aluno = new usuario();
	$aluno->setDeslogin("aluno");
	$aluno->setDessenha("@alun0");
	$aluno->insert();
	echo $aluno;*/

	//ALTERAR UM USUARIO 

	$usuario = new usuario();
	$usuario->loadById(3);
	$usuario->update("JAMAL", "9999999");
	echo $usuario;


	//DELETA UM USUARIO
	//$usuario = new usuario();
	//$usuario->loadById(4);
	//$usuario->delete();
	//echo $usuario;


 ?>	