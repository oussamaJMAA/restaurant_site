<?php

class promotion 
{
	private $id_promo;
	private $val_promo;
	private $date_activation;
	private $date_expiration;
	private $id_plat;


	function __construct($val_promo,$date_activation,$date_expiration,$id_plat)
	{
		$this->val_promo=$val_promo;
		$this->date_activation=$date_activation;
		$this->date_expiration=$date_expiration;
		$this->id_plat=$id_plat;
	}


function getid(){return $this->id_promo;}
function getval_promo(){return $this->val_promo;}
function get_date_activation(){return $this->date_activation;}
function get_date_expiration(){return $this->date_expiration;}
function get_id_plat(){return $this->id_plat;}

public function set_id($id_promo) 
		{$this->id_promo = $id_promo;}
public function set_val_promo($val_promo)	 
		{$this->val_promo = $val_promo;}
public function set_date_activation($date_activation)
		{$this->date_activation = $date_activation;}
public function set_date_expiration($date_expiration)
		{$this->date_expiration = $date_expiration;}
public function set_id_plat($id_plat)
		{$this->id_plat = $id_plat;}






}

?>