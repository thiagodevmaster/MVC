<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\{FlashMessageTrait, RenderizadorHtml};
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\{ResponseInterface, ServerRequestInterface};
use Psr\Http\Server\RequestHandlerInterface;

class EditarCurso implements RequestHandlerInterface
{
    use RenderizadorHtml;
    use FlashMessageTrait;

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );

        if(is_null($id) || $id === false){
            return new Response(302, ['Location'=>'/listar-cursos']);
        }

        $curso = $this->entityManager->find(Curso::class, $id);

        return new Response(302, [], $this->renderizaHtml(
            "/cursos/novo-curso.php",
            [
                "curso"=> $curso,
                "titulo" => "Editar Curso",
                "input_value" => $curso->getDescricao()
            ]
        ));
    }

}