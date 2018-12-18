<?php

class Eventos{
			private $ID;
			private $Nome;
			private $Detalhe;
			private $DataeHora;
			private $local;
		
			
			private $tabela;
			private $conexao;
			//utilizamos construct para atribuir valors a los atributos y expessificamos a tabela q vamos acesar 
			public function __Construct(){
				$this->conexao = mysqli_connect("127.0.0.1","root","" ,"evento")
				or die ("Erro 404");
				$this->tabela = "eventos";
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
				$sql = "INSERT INTO $this->tabela(Nome, Detalhe, DataeHora,local) 
				values('$this->Nome', '$this->Detalhe', '$this->DataeHora','$this->local')";
				$retorno = mysqli_query ($this->conexao, $sql);
				return $retorno;
}

			public function listar(){
				$sql = "SELECT *  FROM 
				$this->tabela ";
				$retorno = mysqli_query($this->conexao, $sql);
				$arrayObj = NULL;
				while($res = mysqli_fetch_assoc($retorno)){
					$obj = new Eventos();
					$obj->ID = $res['ID'];
					$obj->Nome = $res ['Nome'];
					$obj->Detalhe = $res ['Detalhe'];
					$obj->DataeHora = $res ['DataeHora'];
					$obj->local = $res ['local'];
					
					$arrayObj[] = $obj;
					
				}
				return $arrayObj;
				}
				public function retornarUnico(){
					$sql = "SELECT * FROM $this->tabela where ID=$this->ID";
					$retorno = mysqli_query($this->conexao, $sql);
					//separa as colunas como o banco
					$resultado = mysqli_fetch_assoc($retorno);
					if($resultado){
					   $objeto = new Eventos();
					   $objeto->ID = $resultado['ID'];
					   $objeto->Nome = $resultado['Nome'];
					   $objeto->Detalhe = $resultado ['Detalhe'];
					   $objeto->DataeHora = $resultado ['DataeHora'];   
					   $objeto->local = $resultado ['local'];  
									   
						
						$retUsuar = $objeto;
					}
					else {
						$retUsuar = null;
					}
					return $retUsuar;
				}
				
				 public function editar(){
					$sql = "UPDATE $this->tabela SET
					Nome = '$this->Nome', Detalhe = '$this->Detalhe',
					 DataeHora = '$this->DataeHora', local = '$this->local' WHERE ID=$this->ID";
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