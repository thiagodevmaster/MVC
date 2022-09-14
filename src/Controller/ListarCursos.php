<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\RenderizadorHtml;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\{ResponseInterface, ServerRequestInterface};
use Psr\Http\Server\RequestHandlerInterface;

class ListarCursos implements RequestHandlerInterface
{
    use RenderizadorHtml;
    private $repositorioDeCursos;
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repositorioDeCursos = $this->entityManager->getRepository(Curso::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return new Response(200, [], $this->renderizaHtml(
            '/cursos/listar-cursos.php', 
            [
                'titulo'=>'Lista de cursos', 
                "cursos" => $this->repositorioDeCursos->findall()
            ]
        ));
    }
}