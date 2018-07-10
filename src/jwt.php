<?php
namespace fge\jwt\src;
class jwt extends token{
    protected $clave="";
    protected $json="";
    private $e;
    public $token="";
    public function GetJSON(){
        return $this->json;
    }
    function __construct($CLAVE){
        $this->clave=$CLAVE;
        $this->l=20;
        $this->e=new \fge\token\src\encrypt($CLAVE);
    }
    public function decryptp1($rjwt){
        return preg_match('/^[0-9 A-Z]{4}.(\w|[\/]|[\+]|[\=])*.[0-9 A-Z]{10}$/',$rjwt);
    }
    public function decryptp1_5($rjwt){
        $tokens=explode('.',$rjwt);
        $this->clave=$tokens[0];
        $this->json=$tokens[1];
        $this->c=$tokens[2];
        $this->e=new \fge\token\src\encrypt($this->clave);
        return true;
    }
    public function decryptp2(){
        $this->json=$this->e->decryptTEXT($this->json);
        return true;
    }
    public function decryptp3(){
        $this->json=json_decode($this->json);
        return $this->json!=null;
    }
    public function decryptp4(&$error){
        $this->t=$this->json->key;
        return $this->valited($error);
    }
    public function genjwt($obj,&$error){
        if($this->create($error)){
            $obj->key=$this->t;
            $obj=json_encode($obj);
            $this->json=$this->e->encryptTEXT($obj);
            $this->token=$this->clave.".".$this->json.".".$this->c;
            return true;
        }
        return false;
    }
}