<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\FlashMessageTrait;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManagerInterface;

class SalvarCurso implements interfaceControllerRequire
{
    use FlashMessageTrait;

    private EntityManagerInterface $entityManager;

    public function __construct()
    {
        $this->entityManager = EntityManagerCreator::getEntityManager();
    }

    public function processaRequisicao(): void
    {
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $descricao = htmlspecialchars($_POST["descricao"]);
            
            $id = filter_input(
                INPUT_GET,
                'id',
                FILTER_VALIDATE_INT
            );
            
            $tipo = 'success';
            $curso = new Curso();
            $curso->setDescricao($descricao);

            if(!is_null($id) && $id !== false){
                $curso->setId($id);
                $this->defineMensagem($tipo, 'Curso atualizado com sucesso');
                $this->entityManager->merge($curso);
            } else {
                $this->defineMensagem($tipo ,'Curso adicionado com sucesso !');
                $this->entityManager->persist($curso);
            }
            
            $this->entityManager->flush();

            header("Location: /listar-cursos", true, 302);
        }
    }
}