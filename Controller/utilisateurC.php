<?php
include '../feane/config.php';
include '../feane/Model/utilisateur.php';
class clientC
{
    public function listClients()
    {
        $sql = "SELECT * FROM utilisateur";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteClient($id)
    {
        $sql = "DELETE FROM utilisateur WHERE id_client = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addClient($client)
    {
        $sql = "INSERT INTO utilisateur  (Nom_c,Prenom_c,numero_c,email_c,login,mdp)
        VALUES (:n,:p,:nm,:email,:lg,:mdp)";
        $db = config::getConnexion();
        try {
           // print_r($client->getemail_c()->format('Y-m-d'));
            $query = $db->prepare($sql);
            $query->execute([
                'n' => $client->getNom_c(),
                'p' => $client->getPrenom_c(),
                'nm' => $client->getnumero_c(),
                'email'=>$client->getemail_c(),
                'lg' => $client->getlogin(),
                'mdp' => $client->getmdp()
                
                //'email_c' => $client->getemail_c()->format('Y/m/d')
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    

    function updateClient($client,$email)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE utilisateur SET 
                    Nom_c = :Nom_c, 
                    Prenom_c = :Prenom_c, 
                    numero_c = :numero_c, 
                    
                    login = :login,
                    mdp=:mdp
                WHERE email_c= :email_c'
            );
            $query->execute([
                
                'Nom_c' => $client->getNom_c(),
                'Prenom_c' => $client->getPrenom_c(),
                'numero_c' => $client->getnumero_c(),
                'email_c'=> $email,
                'login' => $client->getlogin(),
                'mdp' => $client->getmdp()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showClient($login)
    {
        $sql = "SELECT * from utilisateur where login ='$login'";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $client = $query->fetch();
            return $client;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function veriflogin($lg)
    {
        $sql="SELECT COUNT(login) FROM utilisateur where login ='$lg' ";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $log = $query->fetch();
            return $log;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }


    }

    function verifEmail($email)
    {
        $sql="SELECT COUNT(email_c) FROM utilisateur where email_c ='$email' ";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $mail = $query->fetch();
            return $mail;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }


    }


    function loginClient($login,$mdp)
    {
        $sql = "SELECT * FROM utilisateur WHERE login='$login' and mdp='$mdp'";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
             $client = $query->fetch();
            if($client){
            return true;}
            else {return false;}
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    //    $query = "SELECT * FROM `users` WHERE login='$login' and mdp='".hash('sha256', $mdp)."'";

    function showClients()
    {
        $sql = "SELECT * from utilisateur  where etat=0 ";
        $db = config::getConnexion();
        try {
        
            $client = $db->query($sql);
            return $client;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function triClient()
    {
        $sql = "SELECT * from utilisateur  where etat=0 ORDER BY Nom_c ASC";
        $db = config::getConnexion();
        try {
        
            $client = $db->query($sql);
            return $client;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function showAdmin()
    {
        $sql = "SELECT * from utilisateur where etat=1";
        $db = config::getConnexion();
        try {
        
            $client = $db->query($sql);
            return $client;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function triAdmin()
    {
        $sql = "SELECT * from utilisateur where etat=1 ORDER BY Nom_c ASC";
        $db = config::getConnexion();
        try {
        
            $client = $db->query($sql);
            return $client;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function RechercheClient($Nom_c)
    {
        $sql = "SELECT * FROM utilisateur WHERE Nom_c LIKE '%" . $Nom_c . "%'";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $courses = $query->fetchAll();
            return $courses;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
