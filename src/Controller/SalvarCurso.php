<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\FlashMessageTrait;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class SalvarCurso implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): Response
    {
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $descricao = htmlspecialchars($_POST["descricao"]);
            
            $id = filter_var(htmlspecialchars($request->getQueryParams()['id']), FILTER_VALIDATE_INT);
            
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
        }
        return new Response(302, ["Location"=> "/listar-cursos"]);
    }
}