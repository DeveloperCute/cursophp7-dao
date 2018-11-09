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

	$aluno = new usuario();

	$aluno->setDeslogin("aluno");
	$aluno->setDessenha("@alun0");

	$aluno->insert();

	echo $aluno;
 ?>	