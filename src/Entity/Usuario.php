<?php
namespace Alura\Cursos\Entity;

use Doctrine\ORM\Mapping\{
    Column,
    Entity,
    GeneratedValue,
    Id,
};


#[Entity]
class Usuario
{
    
    #[Id, GeneratedValue, Column(type: "integer")]
    private $id;

    #[Column(type: "string", length: 200)]
    private $email;
    
    #[Column(type: "string", length: 200)]
    private $senha;

    public function senhaEstaCorreta(string $senhaPura): bool
    {
        if($senhaPura !== $this->senha){
            return false;
        }else{
            return true;
        }
        //return password_verify($senhaPura, $this->senha);
    }
}
