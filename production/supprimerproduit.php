<?php
	include_once '..\production\controller\produitC.php';
	$produit1=new produitC();
	$produit1->supprimerproduit($_GET["id_prod"]);
	header('Location:afficherproduit.php');
?>