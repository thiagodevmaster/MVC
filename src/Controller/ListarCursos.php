<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;

class ListarCursos implements interfaceControllerRequire
{
    private $repositorioDeCursos;

    public function __construct()
    {
        $entityManager = EntityManagerCreator::getEntityManager();
        $this->repositorioDeCursos = $entityManager->getRepository(Curso::class);
    }

    public function processaRequisicao(): void
    {
        $titulo = "Lista de cursos";
        $cursos = $this->repositorioDeCursos->findAll();
        require __DIR__."/../../view/cursos/listar-cursos.php";
    }
}