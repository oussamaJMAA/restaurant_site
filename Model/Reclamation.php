<?php

class reclamation
{
    private ?int $id;
    private ?string $nom;
    private ?string $email;
    private ?string $sujet;
    private ?string $message;
   

    function __construct(string $nom,string $email,string $sujet,string $message)
    {
        
        $this->nom=$nom;
        $this->email=$email;
        $this->sujet=$sujet;
        $this->message=$message;
        
    }
    
    function getId()
    {
        return $this->id;
    }
    
    function setId(int $id)
    {
        $this->id = $id;
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

    function getsujet()
    {
        return $this->sujet;
    }
    
    function setsujet(string $sujet)
    {
        $this->sujet = $sujet;
    }

    function getmessage()
    {
        return $this->message;
    }
    
    function setmessage(string $message)
    {
        $this->message = $message;
    }

}
?>