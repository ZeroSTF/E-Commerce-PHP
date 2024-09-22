<?php
include '../Controller/utilisateurC.php';
$clientC = new ClientC();
$clientC->deleteClient($_GET["id_client"]);
header('Location:table-admin.php');