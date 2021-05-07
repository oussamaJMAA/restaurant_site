<?php
class commandes{

private $idclient;
private $idplat;
private $quantite;
private $prixtotal;
private $date;
private $phone;
private $location;

public function __construct($idclient,$idplat,$quantite,$prixtotal,$date,$phone,$location){

$this->idclient=$idclient;
$this->idplat=$idplat;
$this->quantite=$quantite;
$this->prixtotal=$prixtotal;
$this->date=$date;
$this->phone=$phone;
$this->location=$location;


}


public function getidcommande():int
{return $this->idcommande;}
public function getidclient():int
{return $this->idclient;}
public function getidplat():int
{return $this->idplat;}
public function getquantite():int
{return $this->quantite;}
public function getprixtotal():float
{return $this->prixtotal;}
public function getdate():string
{return $this->date;}
public function getphone():int
{return $this->phone;}
public function getlocation():string
{return $this->location;}

public function setidcommande($idcommande):void
{$this->idcommande=$idcommande;}
public function setidclient($idclient):void
{$this->idclient=$idclient;}
public function setidplat($idplat):void
{$this->idplat=$idplat;}
public function setquantite($quantite):void
{$this->quantite=$quantite;}
public function setprixtotal($prixtotal):void
{$this->prixtotal=$prixtotal;}
public function setdate($date):void
{$this->date=$date;}
public function setphone($phone):void
{$this->phone=$phone;}
public function setlocation($location):void
{$this->location=$location;}



}



?>