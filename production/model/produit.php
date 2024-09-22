<?php
	class produit{
		private $id_prod=null;
		private $nom_prod=null;
		private $prix=null;
		function __construct($id_prod, $nom_prod, $prix){
			$this->id_prod=$id_prod;
			$this->nom_prod=$nom_prod;
			$this->prix=$prix;
		
		}
		function getid_prod(){
			return $this->id_prod;
		}
		function getnom_prod(){
			return $this->nom_prod;
		}
		function getprix(){
			return $this->prix;
		}
		
		function setnom_prod(string $nom_prod):void{
			$this->nom_prod=$nom_prod;
		}
		function setprix(string $prix):void{
			$this->prix=$prix;
		}
		
		
	}


?>