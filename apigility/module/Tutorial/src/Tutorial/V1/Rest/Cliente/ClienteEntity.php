<?php
namespace Tutorial\V1\Rest\Cliente;

class ClienteEntity
{
    private $id;
    private $nome;
    private $sobrenome = '';
    
    public function getArrayCopy() {
        return array(
            'id' => $this->id,
            'nome' => $this->nome,
            'sobrenome' => $this->sobrenome
        );
    }
    
    public function exchangeArray($data) {
        foreach($data as $key=>$value){
            if(in_array($key, array('id','nome','sobrenome'))){
                $this->$key = $value;
            }
        }
    }
    
}
