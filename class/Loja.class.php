<?php

class Loja{
			private $ID;
			private $Nome;
		
			
			
			private $tabela;
			private $conexao;
			//utilizamos construct para atribuir valors a los atributos y expessificamos a tabela q vamos acesar 
			public function __Construct(){
				$this->conexao = mysqli_connect("127.0.0.1","root","" ,"evento")
				or die ("Erro 404");
				$this->tabela = "loja";
			}
			//fecha a conexao se deixar o banco aberto e elemina da memoria 
			public function __destruct(){
				unset ($this->link);
				
			} 
			// serve para acessar um valor
			public function __get($key){
				return $this->$key;
			}
			//para modificar um valor
			public function __set($key, $value){
				$this->$key = $value;
			}
			public function inserir(){
				$sql = "INSERT INTO 	$this->tabela(Nome) 
				values('$this->Nome') ";
				$retorno = mysqli_query ($this->conexao, $sql);
				return $retorno;
			}
				public function listar (){
				$sql = "SELECT * FROM $this->tabela";
				$retorno = mysqli_query($this->conexao, $sql);
				
				$arrayObj = NULL;
				while($res = mysqli_fetch_assoc($retorno)){
					$obj = new Loja();
					$obj->ID = $res['ID'];
					$obj->Nome = $res ['Nome'];
					$arrayObj[] = $obj;
					
				}
				return $arrayObj;
				}
					public function retornarUnico(){
		 $sql = "SELECT * FROM $this->tabela where ID=$this->ID";
		 $retorno = mysqli_query($this->conexao, $sql);
		 $resultado = mysqli_fetch_assoc($retorno);
		 if($resultado){
			 $objeto = new Loja();
			 $objeto->ID = $resultado['ID'];
			 $objeto->Nome = $resultado['Nome'];
			 
			 $retUsuar = $objeto;
		 }
		 else {
			 $retUsuar = null;
		 }
		 return $retUsuar;
	 }
			  public function editar(){
		 $sql = "UPDATE $this->tabela SET
		 Nome = '$this->Nome' WHERE ID=$this->ID";
		 $retorno = mysqli_query($this->conexao,$sql);
		 return $retorno;
	 }
	 	 public function excluir(){
		 $sql ="DELETE FROM $this->tabela WHERE ID=$this->ID";
         $retorno = mysqli_query($this->conexao, $sql);
		 return $retorno;
		 }
}

?>