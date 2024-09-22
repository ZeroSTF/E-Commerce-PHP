<?php
	class categorie{
		private $id_cat=null;
		private $nom_cat=null;
		private $description=null;
		function __construct($id_cat, $nom_cat, $description){
			$this->id_cat=$id_cat;
			$this->nom_cat=$nom_cat;
			$this->description=$description;
		
		}
		function getid_cat(){
			return $this->id_cat;
		}
		function getnom_cat(){
			return $this->nom_cat;
		}
		function getdescription(){
			return $this->description;
		}
		
		function setnom_cat(string $nom_cat):void{
			$this->nom_cat=$nom_cat;
		}
		function setPrenom(string $description):void{
			$this->description=$description;
		}
		
		
	}


?>