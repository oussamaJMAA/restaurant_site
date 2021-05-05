<?php
  class commande
  {

    private   $idplat;
    private   $idclient;
    private $prixtotal;
    private $quantite;

    


    public function __construct($idplat,$idclient,$prixtotal,$quantite)
    {
     
        $this->idplat=$idplat;
        $this->idclient=$idclient;
        $this->prixtotal=$prixtotal;
        $this->quantite=$quantite;

     

    }
    
    public function getidplat():int
    {return $this->idplat;}

    public function setidplat($idplat):void
    {$this->idplat=$idplat;}


    
    public function getidclient():int
    {return $this->idclient;}


    public function setidclient($idclient):void
    {$this->idclient=$idclient;}


    public function getprixtotal():float
    {return $this->prixtotal;}

    public function setprixtotal($prixtotal):void
    {$this->prixtotal=$prixtotal;}

    public function getquantite():int
    {return $this->quantite;}

    public function setquantite($quantite):void
    {$this->quantite=$quantite;}

 

  } 
  
?>