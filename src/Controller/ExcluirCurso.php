<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\FlashMessageTrait;
use Alura\Cursos\Infra\EntityManagerCreator;

class ExcluirCurso implements interfaceControllerRequire
{
    use FlashMessageTrait;

    private $entityManager;

    public function __construct()
    {
        $this->entityManager = EntityManagerCreator::getEntityManager();
    }

    public function processaRequisicao(): void
    {
        $id = htmlspecialchars($_GET['id']);

        if(is_null($id) || $id === false){
            $this->defineMensagem('danger', 'Curso inexistente!');
            header("location: /listar-cursos");
            return;
        }

        $curso = $this->entityManager->find(Curso::class, $id);

        $this->entityManager->remove($curso);
        $this->entityManager->flush();

        $this->defineMensagem('success', 'Curso excluído com sucesso !');

        header('Location: /listar-cursos');
    }
}