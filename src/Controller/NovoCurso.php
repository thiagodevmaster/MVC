<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Helper\RenderizadorHtml;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class NovoCurso implements RequestHandlerInterface
{
    use RenderizadorHtml;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
       
        return new Response(302,[], $this->renderizaHtml(
            "/cursos/novo-curso.php",
            [
                "titulo"=>"Novo Curso",
                "input_value" => ''
            ]
        ));
    }
}