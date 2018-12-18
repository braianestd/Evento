<?php

class Regalos{
			private $id_loja;
			private $ID;
			private $nome;
			private $Imagem;
			private $id_evento;
			
	
		    
		
			
			private $tabela;
			private $conexao;
			//utilizamos construct para atribuir valors a los atributos y expessificamos a tabela q vamos acesar 
			public function __Construct(){
				$this->conexao = mysqli_connect("127.0.0.1","root","" ,"evento")
				or die ("Erro 404");
				$this->tabela = "regalos";
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
				$sql = "INSERT INTO 	$this->tabela(id_loja, nome, Imagem,id_evento) 
				values($this->id_loja, '$this->nome', '$this->Imagem','$this->id_evento') ";
				$retorno = mysqli_query ($this->conexao, $sql);
				return $retorno;
			}
			public function listar ($complemento=""){
				
				
				/*$sql = "SELECT $this->tabela.*,loja.Nome as loja and evento.Nome as evento from $this->tabela inner join loja on $this->tabela.id_loja=loja.ID and inner join evento on $this->tabela.id_evento=evento.ID";
				$sql = "SELECT $this->tabela.*,loja.Nome as loja from $this->tabela inner join loja on $this->tabela.id_loja=loja.ID";
				*/
				$sql = "SELECT $this->tabela.*, loja.Nome as loja, eventos.Nome as eventos  FROM 
				$this->tabela INNER JOIN loja ON $this->tabela.id_loja = loja.ID inner join eventos on $this->tabela.id_evento = eventos.ID ".$complemento;
				$retorno = mysqli_query($this->conexao, $sql);				
				$arrayObj = NULL;
				while($res = mysqli_fetch_assoc($retorno)){
					$obj = new Regalos();
					$obj->ID = $res['ID'];
					$obj->nome = $res ['nome'];
					$obj->Imagem = $res ['Imagem'];
					$obj->id_loja =$res['loja'];
					$obj->id_evento =$res['eventos'];

					
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
			 $objeto = new Regalos();
			 $objeto->ID = $resultado['ID'];
			 $objeto->nome = $resultado['nome'];
			 $retUsuar = $objeto;
		 }
		 else {
			 $retUsuar = null;
		 }
		 return $retUsuar;
	 }
	 
	 public function editar(){
		$sql = "UPDATE $this->tabela SET
		nome = '$this->nome' WHERE ID=$this->ID";
		$retorno = mysqli_query($this->conexao,$sql);
		return $retorno;
	}
	 public function excluir(){
		 $sql ="DELETE FROM $this->tabela WHERE ID=$this->ID";
         $retorno = mysqli_query($this->conexao, $sql);
		 return $retorno;
		 }
		 public function editarimg(){	 
		 $sql = "UPDATE $this->tabela SET 
		 Imagen = '$this->Imagen' WHERE ID= $this->ID";
		 $retorno = mysqli_query($this->conexao,$sql);
		 return $retorno;
			 
		 }
}

?>