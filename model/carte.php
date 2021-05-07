<?php

class carte
{
    private ?int $id;
    private ?string $prenom;
    private ?string $nom;
    private ?string $email;
    private ?string $password;
    private ?int $totalpoints;
    //private ?string $etat;
  //  private ?date $date_creat;
  //  private ?date $date_expir;
   

    function __construct(string $prenom,string $nom,string $email,string $password,int $totalpoints/*,date $date_creat,date $date_expir*/)
    {
        $this->prenom=$prenom;
        $this->nom=$nom;
        $this->email=$email;
        $this->password=$password;
        $this->totalpoints=$totalpoints;
     //   $this->etat=$etat;
      //  $this->date_creat=$date_creat;
     //   $this->date_expir=$date_expir;

    }
    
    function getId()
    {
        return $this->id;
    }
    
    function setId(int $id)
    {
        $this->id = $id;
    }

    function getprenom()
    {
        return $this->prenom;
    }
  
    function setprenom(string $prenom)
    {
        $this->prenom = $prenom;
    }
    
    function getnom()
    {
        return $this->nom;
    }
  
    function setnom(string $nom)
    {
        $this->nom = $nom;
    }

         
    function getMail()
    {
        return $this->email;
    }
   
    function setMail(string $email)
    {
        $this->email = $email;
    }

    function getPass()
    {
        return $this->password;
    }
    
    function setPass(string $password)
    {
        $this->password = $password;
    }

    function getTotalpoints()
    {
        return $this->totalpoints;
    }
    
    function setTotalpoints(int $totalpoints)
    {
        $this->totalpoints = $totalpoints;
    }

  /*  function getetat()
    {
        return $this->etat;
    }
  
    function setetat(string $etat)
    {
        $this->etat = $etat;
    }
*/
 /*   function getdate_creat()
    {
        return $this->date_creat;
    }
  
    function setdate_creat(date $date_creat)
    {
        $this->date_creat = $date_creat;
    }

    function getdate_expir()
    {
        return $this->date_expir;
    }
  
    function setdate_expir(date $date_expir)
    {
        $this->date_expir = $date_expir;
    }

*/

}
?>