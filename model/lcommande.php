<?php
  class lcommande
  {

    private   $idplat;
    private   $idclient;
    private $adresse;
    private $phone;

    private $methode_paye;
private $datec;

    public function __construct($idclient,$idplat,$adresse,$phone,$methode_paye,$datec)
    {
     
        $this->idclient=$idclient;
        $this->idplat=$idplat;
        $this->adresse=$adresse;
        $this->phone=$phone;

        $this->methode_paye=$methode_paye;
$this->datec=$datec;

    }
    
    public function getidplat():int
    {return $this->idplat;}

    public function setidplat($idplat):void
    {$this->idplat=$idplat;}


    
    public function getidclient():int
    {return $this->idclient;}


    public function setidclient($idclient):void
    {$this->idclient=$idclient;}


    public function getadresse():string
    {return $this->adresse;}

    public function setadresse($adresse):void
    {$this->adresse=$adresse;}

    public function getphone():int
    {return $this->phone;}

    public function setphone($phone):void
    {$this->phone=$phone;}

 
    public function getmethode_paye():string
    {return $this->methode_paye;}

    public function setmethode_paye($methode_paye):void
    {$this->methode_paye=$methode_paye;}

    
    public function getdatec():string
    {return $this->datec;}

    public function setdatec($datec):void
    {$this->datec=$datec;}


  } 
  
?>