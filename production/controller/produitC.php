<?php
	//include_once '../../feane/config.php';
	//include '../model/produit.php';
	class config {
		private static $pdo = NULL;
	
		public static function getConnexion() {
		  if (!isset(self::$pdo)) {
			try{
			  self::$pdo = new PDO('mysql:host=localhost;dbname=groupe1', 'root', '',
			  [
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
			]);
			  
			}catch(Exception $e){
			  die('Erreur: '.$e->getMessage());
			}
		  }
		  return self::$pdo;
		}
	  }
	class produitC {
		function afficherproduit(){
			$sql="SELECT * FROM produit";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}

		function rechercher($rechercher){
			$sql="SELECT * FROM produit where nom_prod like '%$rechercher%' or  prix like '%$rechercher%'";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}    
		function supprimerproduit($id_prod){
			$sql="DELETE FROM produit WHERE id_prod=:id_prod";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_prod', $id_prod);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function ajouterproduit($produit,$id_cat,$image){
			$sql="INSERT INTO produit (nom_prod, prix ,id_cat,image) 
			VALUES (:nom_prod,:prix,:id_cat,:image)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
				
					
					'nom_prod' => $produit->getnom_prod(),
					'prix' => $produit->getprix(),
					'id_cat' => $id_cat,
					'image' => $image
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererproduit($id_prod){
			$sql="SELECT * from produit where id_prod=$id_prod";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$produit=$query->fetch();
				return $produit;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierproduit($produit, $id_prod){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE produit SET 
						nom_prod= :nom_prod, 
						prix= :prix
						
					WHERE id_prod= :id_prod'
				);
				$query->execute([
					'nom_prod' => $produit->getnom_prod(),
					'prix' => $produit->getprix(),
					'id_prod' => $id_prod
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>