<?PHP

    include_once __DIR__ . '/../config.php';
	require_once __DIR__ . '/../model/Utilisateur.php';

	class UtilisateurC {




        public function afficher_utilisateur_id($id_user)
        { //affichage tout les commandes
            $sql="select * from utilisateur where id=:id_user";
            $db=config::getConnexion();
            $req=$db->prepare($sql);
            $req->bindValue(':id_user',$id_user);
            try
            {
                $req->execute();
               // $query->execute();
        return $req;
                
        
            }
            catch(Exeption $e)
            {
                die('Erreur: '.$e->getMessage());
            }
        }


		
		
public function recherche_user($u){
    $sql="SELECT * from utilisateur where id= :z or nom=:z or prenom=:z or email=:z";
    $db=config::getConnexion();
    $req=$db->prepare($sql);
    $req->bindValue(':z',$u);
    try
    {
        $req->execute();
       // $query->execute();
return $req;
        

    }
    catch(Exeption $e)
    {
        die('Erreur: '.$e->getMessage());
    }

}


        function ajouterUtilisateur($Utilisateur){
            $sql="INSERT INTO utilisateur (nom, prenom, email, login, password) 
			VALUES (:nom,:prenom,:email, :login, :password)";
            $db = config::getConnexion();
            try{
                $query = $db->prepare($sql);

                $query->execute([
                    'nom' => $Utilisateur->getNom(),
                    'prenom' => $Utilisateur->getPrenom(),
                    'email' => $Utilisateur->getEmail(),
                    'login' => $Utilisateur->getLogin(),
                    'password' => $Utilisateur->getPassword()
                ]);
            }
            catch (Exception $e){
                echo 'Erreur: '.$e->getMessage();
            }
        }


        function afficherUtilisateurs(){
			
			$sql="SELECT * FROM utilisateur";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function supprimerUtilisateur($id){
			$sql="DELETE FROM Utilisateur WHERE id= :id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id',$id);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}


    function afficher_mail_user()
{
        $sql="SELECT email FROM `Utilisateur` ";
        $db = config::getConnexion();
        try{

        $liste=$db->query($sql);

        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
}


		function modifierUtilisateur($Utilisateur, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE Utilisateur SET 
						nom = :nom, 
						prenom = :prenom,
						email = :email,
						login = :login,
						password = :password
					WHERE id = :id'
				);
				$query->execute([
					'nom' => $Utilisateur->getNom(),
					'prenom' => $Utilisateur->getPrenom(),
					'email' => $Utilisateur->getEmail(),
					'login' => $Utilisateur->getLogin(),
					'password' => $Utilisateur->getPassword(),
					'id' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recupererUtilisateur($id){
			$sql="SELECT * from Utilisateur where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$user=$query->fetch();
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function recupererUtilisateur1($id){
			$sql="SELECT * from Utilisateur where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
				
				$user = $query->fetch(PDO::FETCH_OBJ);
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function connexionUser($email,$password){
            $sql="SELECT * FROM Utilisateur WHERE email='" . $email . "'  and Password = '". $password."'";
            $db = config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute();
                $count=$query->rowCount();

                if($count==0) {
                    $message = "pseudo ou le mot de passe est incorrect";
                } else {
                    $x=$query->fetch();
                    $message = $x['role'];
                }
            }
            catch (Exception $e){
                    $message= " ".$e->getMessage();
            }
          return $message;
        }



		public function update($user){
			$sql="UPDATE utilisateur SET   password = :password where email = :email" ;
	
			$db=config::getConnexion();
			try
			{
				$query=$db->prepare($sql);
				$query->execute([
					'email'=>$user->getEmail(),
					'password'=>$user->getpassword()
				]);
			}
			catch(Exeption $e)
			{
				die('Erreur: '.$e->getMessage());
			}
	
	
		}

		public function delete($user){

			$sql="DELETE FROM utilisateur where email = :email"  ;
			$db=config::getConnexion();
	
			try
			{
				$query=$db->prepare($sql);
				$query->execute([
					'email'=>$user->getEmail()
					
				]);
			}
			catch(Exeption $e)
			{
				die('Erreur: '.$e->getMessage());
			}
		  
			}


		



	}




    class resC
    {
        public function ajouter($res)
        {
            $sql="insert into reservation(full_name,email,phone,guests,date,time)
            values (:full_name,:email,:phone,:guests,:date,:time)";
            $db=config::getConnexion();
    
            try
            {
                $query=$db->prepare($sql);
                $query->execute([
                    'full_name'=>$res->getfull_name(),
                    'email'=>$res->getemail(),
                    'phone'=>$res->getphone(),
                  'guests'=>$res->getguests(),
                  'date'=>$res->getdate(),
                  'time'=>$res->gettime()
                ]);
            }
            catch(Exeption $e)
            {
                die('Erreur: '.$e->getMessage());
            }
        }
    
        public function afficher()
        {
            $sql="select * from reservation";
            $db=config::getConnexion();
    
            try
            {
                $liste=$db->query($sql);
               // $query->execute();
    return $liste;
                
    
            }
            catch(Exeption $e)
            {
                die('Erreur: '.$e->getMessage());
            }
        }
        
        public function update($res){
            
            $sql="UPDATE reservation SET  date  = :date, time = :time, guests = :guests where full_name = :full_name and phone= :phone and email= :email" ;
    
            $db=config::getConnexion();
            try
            {
                $query=$db->prepare($sql);
                $query->execute([
                    'date'=>$res->getdate(),
                    'time'=>$res->gettime(),
                    'guests'=>$res->getguests(),
                    'full_name'=>$res->getfull_name(),
                    'phone'=>$res->getphone(),
                    'email'=>$res->getemail()
                    
                ]);
            }
            catch(Exeption $e)
            {
                die('Erreur: '.$e->getMessage());
            }
    
    
        }
    
        public function delete($res){
    
            $sql="DELETE FROM reservation where phone = :phone and full_name = :full_name"  ;
            $db=config::getConnexion();
    
            try
            {
                $query=$db->prepare($sql);
                $query->execute([
                    'phone'=>$res->getphone(),
                    'full_name'=>$res->getfull_name()
                    
                ]);
            }
            catch(Exeption $e)
            {
                die('Erreur: '.$e->getMessage());
            }
          
            }
    
    
           public function deleteB($id){
                $sql="DELETE FROM reservation WHERE id= :id";
                $db = config::getConnexion();
                $req=$db->prepare($sql);
                $req->bindValue(':id',$id);
                try{
                    $req->execute();
                }
                catch (Exception $e){
                    die('Erreur: '.$e->getMessage());
                }
            }
            public function affiche2($idc)
            {
                $sql="SELECT * FROM list WHERE id_user=:idc";
                $db=config::getConnexion();
        
                try
                {
                   
                   $query=$db->prepare($sql);
                   $query->execute([
        
                    'idc'=>$idc,
                   ]);
        return $query;
                    
        
                }
                catch(Exeption $e)
                {
                    die('Erreur: '.$e->getMessage());
                }
            }
            public function delete_commande($idplat){
                $sql="DELETE FROM list WHERE idplat= :idplat";
                $db = config::getConnexion();
                $req=$db->prepare($sql);
                $req->bindValue(':idplat',$idplat);
                try{
                    $req->execute();
                }
                catch (Exception $e){
                    die('Erreur: '.$e->getMessage());
                }
            }
    
    

public function afficher_plat_id($id_plat)
{ //affichage tout les commandes
	$sql="select * from plat where id_plat=:id_plat";
	$db=config::getConnexion();
	$req=$db->prepare($sql);
	$req->bindValue(':id_plat',$id_plat);
	try
	{
		$req->execute();
	   // $query->execute();
return $req;
		

	}
	catch(Exeption $e)
	{
		die('Erreur: '.$e->getMessage());
	}
}
            public function afficher_list()
            {
                $sql="select * from list";
                $db=config::getConnexion();
        
                try
                {
                    $liste=$db->query($sql);
                   // $query->execute();
        return $liste;
                    
        
                }
                catch(Exeption $e)
                {
                    die('Erreur: '.$e->getMessage());
                }
            }
    
            public function recherche($id){
    
    
                try{
                $db = config::getConnexion();
                $sql=$db->prepare("SELECT * FROM utilisateur WHERE prenom=: unom "); 
                    
               $sql->execute(array(
               
                ':unom'=>$nom
               ));
            } catch(PDOException $e)
            {
             $e->getMessage();
            }		
    
    
    
            }


		
		
            public function recherche_wish($u){
                $sql="SELECT * from list where id_user= :z or idplat=:z";
                $db=config::getConnexion();
                $req=$db->prepare($sql);
                $req->bindValue(':z',$u);
                try
                {
                    $req->execute();
                   // $query->execute();
            return $req;
                    
            
                }
                catch(Exeption $e)
                {
                    die('Erreur: '.$e->getMessage());
                }
            
            }
            


            public function tri_user(){
                $sql="SELECT * from utilisateur order by id,nom,prenom";
                $db=config::getConnexion();
                $req=$db->prepare($sql);
               
                try
                {
                    $req->execute();
                   // $query->execute();
            return $req;
                    
            
                }
                catch(Exeption $e)
                {
                    die('Erreur: '.$e->getMessage());
                }
            
            }
            

            public function tri_wish(){
                $sql="SELECT * from list order by id_user,idplat";
                $db=config::getConnexion();
                $req=$db->prepare($sql);
               
                try
                {
                    $req->execute();
                   // $query->execute();
            return $req;
                    
            
                }
                catch(Exeption $e)
                {
                    die('Erreur: '.$e->getMessage());
                }
            
            }
            





            }




?>