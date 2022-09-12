<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\RenderizadorHtml;
use Alura\Cursos\Infra\EntityManagerCreator;

class EditarCurso implements interfaceControllerRequire
{
    use RenderizadorHtml;

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

        echo $this->renderizaHtml(
            "/cursos/novo-curso.php",
            [
                "curso"=> $curso,
                "titulo" => "Editar Curso",
                "input_value" => $curso->getDescricao()
            ]
        );
        

    }
}