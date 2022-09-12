<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\RenderizadorHtml;
use Alura\Cursos\Infra\EntityManagerCreator;

class ListarCursos implements interfaceControllerRequire
{
    use RenderizadorHtml;
    private $repositorioDeCursos;

    public function __construct()
    {
        $entityManager = EntityManagerCreator::getEntityManager();
        $this->repositorioDeCursos = $entityManager->getRepository(Curso::class);
    }

    public function processaRequisicao(): void
    {
        echo $this->renderizaHtml(
            '/cursos/listar-cursos.php', 
            [
                'titulo'=>'Lista de cursos', 
                "cursos" => $this->repositorioDeCursos->findall()
            ]
        );
    }
}