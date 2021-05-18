<?php

class carte
{
    private  $id;
    private  $etat;
    private  $date_creat;
    private  $date_expir;
   

    function __construct( $etat,  $date_creat,$date_expir)
    {
        
        $this->etat=$etat;
        $this->date_creat=$date_creat;
        $this->date_expir=$date_expir;

    }
    
    

    function getetat()
    {
        return $this->etat;
    }
  
    function setetat(string $etat)
    {
        $this->etat = $etat;
    }

    function getdate_creat()
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



}
?>