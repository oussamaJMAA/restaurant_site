<?PHP
	include "../config.php";
	
	require_once '../model/Utilisateur.php';
	require_once '../model/recette.php';
	class UtilisateurC {

        public function affiche_idr($idr)
        {
            $sql="SELECT * FROM rate_recette WHERE id_recette=:idr";
            $db=config::getConnexion();
    
            try
            {  
               $query=$db->prepare($sql);
               $query->execute([
    
                'idr'=>$idr,
               ]);
    return $query;
                
    
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
        function archive(){
            $sql="INSERT INTO archive (nom, prenom, email, login, password) 
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

        public function update2($a,$b,$c){
			$sql="UPDATE utilisateur SET password= :password , login = :login where email = :email" ;
	
			$db=config::getConnexion();
			try
			{
				$query=$db->prepare($sql);
				$query->execute([
					'email'=>$a,
					'login'=>$b,
                    'password'=>$c
				]);
			}
			catch(Exeption $e)
			{
				die('Erreur: '.$e->getMessage());
			}
	
	
		}




        function afficher_recette()
        {
                $sql="SELECT `id_recette`, `nom`, `image`, `description` FROM `recette`;";
                $db = config::getConnexion();
                try
                {
                    $liste=$db->query($sql);
                    
                    return $liste;
                }
                catch (Exception $e){
                    die('Erreur: '.$e->getMessage());
                }	
        }


        function ajouter_recette($recette)
        {
            $sql="INSERT INTO `recette`(`id_recette`,`nom`, `image`, `description` ) VALUES 
          (NULL,:nom,:image,:description)";
             
        
        
             $db = config::getConnexion();
                 try{
                $req=$db->prepare($sql);	
        
                $nom =$recette->getnom();
                $image =$recette->getimage();	
                $description=$recette->getdescription();
               
        
        
                $req->bindValue(':nom',$nom);
                $req->bindValue(':image',$image);
                $req->bindValue(':description',$description);
                
                    
                    $req->execute();
                }
                catch (Exception $e){
        
                    echo 'Erreur: '.$e->getMessage();
                }
        
        
        }
        function supprimer_recette($id)
        {
            $sql="DELETE  from recette  where  id_recette=:id ";
            $db = config::getConnexion();
            try{
            $req=$db->prepare($sql);
              $req->bindValue(':id',$id);
              $req->execute();
            }
                catch (Exception $e){
                    die('Erreur: '.$e->getMessage());
                }
        }
        
        function modifier_recette($recette,$id)
	{
 	$db = config::getConnexion();
 	$sql="UPDATE `recette` SET `nom`=:nom ,`image`=:image,`description`=:description WHERE `recette`.`id_recette`=:id";

 		try{

        $req=$db->prepare($sql);	


		$nom        =$recette->getnom();
		$image      =$recette->getimage();	
		$description=$recette->getdescription();



		$req->bindValue(':nom',$nom);
		$req->bindValue(':image',$image);
		$req->bindValue(':description',$description);
		$req->bindValue(':id',$id);		
        $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
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
                $sql="SELECT * from utilisateur order by login";
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
            

            function afficher_mail_user()
            {
                    $sql="SELECT email FROM `utilisateur` ";
                    $db = config::getConnexion();
                    try{
            
                    $liste=$db->query($sql);
            
                    return $liste;
                    }
                    catch (Exception $e){
                        die('Erreur: '.$e->getMessage());
                    }
            }





            public function afficher_plat_id2($id_plat)
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
            








            }




?>