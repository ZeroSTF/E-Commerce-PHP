<?php
	//include_once "../model/categorie.php";
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
	class categorieC {
		function affichercategorie(){
			$sql="SELECT * FROM categorie";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function affichercategorie1(){
			$sql="SELECT * FROM categorie ORDER BY nom_cat";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function supprimercategorie($id_cat){
			$sql="DELETE FROM categorie WHERE id_cat=:id_cat";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_cat', $id_cat);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function ajoutercategorie($categorie,$image){
			$sql="INSERT INTO categorie (nom_cat, description,image) 
			VALUES (:nom_cat,:description,:image)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
				
					
					'nom_cat' => $categorie->getnom_cat(),
					'description' => $categorie->getdescription(),
					'image' => $image
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recuperercategorie($id_cat){
			$sql="SELECT * from categorie where id_cat=$id_cat";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$categorie=$query->fetch();
				return $categorie;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifiercategorie($categorie, $id_cat){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE categorie SET 
						nom_cat= :nom_cat, 
						description= :description
						
					WHERE id_cat= :id_cat'
				);
				$query->execute([
					'nom_cat' => $categorie->getnom_cat(),
					'description' => $categorie->getdescription(),
					'id_cat' => $id_cat
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>