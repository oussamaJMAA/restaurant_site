<?php
  class res
  {

    private   $full_name;
    private $email;
    private $phone;
    private $date;
    private $time;
    private $guests;
    private  $id; 


    public function __construct($full_name,$email,$phone,$date,$time,$guests)
    {
     
        $this->full_name=$full_name;
        $this->email=$email;
        $this->phone=$phone;
        $this->date=$date;
        $this->time=$time;
        $this->guests=$guests;
     

    }
    
    public function getid():int
    {return $this->id;}

    public function setid($id):void
    {$this->id=$id;}

    public function getfull_name():string
    {return $this->full_name;}

    public function setfull_name($full_name):void
    {$this->nom=$full_name;}

    public function getemail():string
    {return $this->email;}

    public function setemail($email):void
    {$this->email=$email;}

    public function getphone():int
    {return $this->phone;}


    public function setphone($phone):void
    {$this->phone=$phone;}


    public function getdate():string
    {return $this->date;}

    public function setdate($date):void
    {$this->date=$date;}



    public function gettime():string
    {return $this->time;}

    public function settime($time):void
    {$this->time=$time;}

    public function getguests() :int
    { return $this->guests;}

    public function setguests($guests):void
    {$this->guests=$guests;}
  } 
  
?>