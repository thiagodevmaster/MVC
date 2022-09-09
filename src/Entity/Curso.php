<?php

namespace Alura\Cursos\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

use function PHPSTORM_META\type;

#[Entity]
class Curso
{

     #[Id, GeneratedValue, Column(type: "integer")]
    private $id;
    
    #[Column(type: "string")]
    private $descricao;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }
}
