<?php
	include_once '../controller/categorieC.php';
	$categorie1=new categorieC();
	$categorie1->supprimercategorie($_GET["id_cat"]);
	header('Location:table-categorie.php');
?>