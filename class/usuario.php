<?php 

	
	class Usuario {

		private $idusuario;
		private $deslogin;
		private $dessenha;
		private $dtcadastro;

		public function getIdusuario(){
			return $this->idusuario;
		}

		public function setIdusuario($value){
			 $this->idusuario = $value;
		}

		public function getDeslogin(){
			return $this->deslogin;
		}

		public function setDeslogin($value){
			$this->deslogin = $value;
		}

		public function getDessenha(){
			return $this->dessenha;
		}

		public function setDessenha($value){
			$this->dessenha = $value;
		}

		public function getDtcadastro(){
			return $this->dtcadastro;
		}

		public function setDtcadastro($value){
			$this->dtcadastro = $value;
		}

		public function loadById($id){

			$sql = new sql();

			$result = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
					":ID"=>$id
				));

			if(count($result) > 0){

			$this->setData($result[0]);

			
			}
		}

		public function __toString(){

			return json_encode(array(
				"idusuario"=>$this->getIdusuario(),
				"deslogin"=>$this->getDeslogin(),
				"dessenha"=>$this->getDessenha(),
				"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
				));

		}

		public static function getList(){

			$sql = new sql();

			return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin;");

		}

		public static function search($Login){

			$sql = new sql();

			return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
					":SEARCH"=>"%".$Login."%"
				));

		}

		public function login($Login, $password){

			$sql = new sql();

			$result = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(
					":LOGIN"=>$Login,
					":PASSWORD"=>$password
				));

			if(count($result) > 0){

				$this->setData($result[0]);

			}else {

				throw new Exception("LOGIN SENHA INVÁLIDOS");
				

			}

		}

		public function setData($data){

				$this->setIdusuario($data['idusuario']);
				$this->setDeslogin($data['deslogin']);
				$this->setDessenha($data['dessenha']);
				$this->setDtcadastro(new DateTime($data['dtcadastro']));

		}

		public function insert(){

			$sql = new sql();

		   	
    	$result = $sql->select("INSERT INTO tb_usuarios(deslogin, dessenha) VALUES (:LOGIN, :SENHA);"
    		, array(':LOGIN'=>$this->getDeslogin(),
					':SENHA'=>$this->getDessenha()
					));
 
    	$result2 = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = LAST_INSERT_ID()");
 
    	if(count($result2)>0){
        $this->setData($result2[0]);
    	}
		
		}		

		public function update($login, $password){

			$this->setDeslogin($login);
			$this->setDessenha($password);

			$sql = new sql();

			$sql->query("UPDATE tb_usuarios SET deslogin = :LOGIN, dessenha = :PASSWORD WHERE idusuario = :ID", array(	
				':LOGIN'=>$this->getDeslogin(),
				':PASSWORD'=>$this->getDessenha(),
				':ID'=>$this->getDeslogin()
				));

		}

		public function delete(){

			$sql = new sql();

			$sql->query("DELETE FROM tb_usuarios WHERE idusuario = :ID", array(
				':ID'=>$this->getIdusuario()
				));


			$this->setIdusuario(0);
			$this->setDeslogin("");
			$this->setDessenha("");
			$this->setDtcadastro(new DateTime());

		}
	



	}
 ?>