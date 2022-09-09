<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;

class EditarCurso implements interfaceControllerRequire
{
    private $entityManager;

    public function __construct()
    {
        $this->entityManager = EntityManagerCreator::getEntityManager();
    }

    public function processaRequisicao(): void 
    {
        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );

        if(is_null($id) || $id === false){
            header("Location: /listar-cusros");
            return;
        }

        $curso = $this->entityManager->find(Curso::class, $id);
        
        $titulo = "Editar curso";
        $input_value = $curso->getDescricao();
        require __DIR__."/../../view/cursos/novo-curso.php";
        

    }
}