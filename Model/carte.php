<?php

class carte
{
    private ?int $id;
    private ?string $prenom;
    private ?string $nom;
    private ?string $email;
    private ?string $password;
    private ?int $totalpoints;
   

    function __construct(string $prenom,string $nom,string $email,string $password,int $totalpoints)
    {
        $this->prenom=$prenom;
        $this->nom=$nom;
        $this->email=$email;
        $this->password=$password;
        $this->totalpoints=$totalpoints;
        
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

}
?>