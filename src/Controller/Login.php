<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Helper\RenderizadorHtml;
use Nyholm\Psr7\Response;
use Psr\Http\Message\{ResponseInterface, ServerRequestInterface};
use Psr\Http\Server\RequestHandlerInterface;

class Login implements RequestHandlerInterface
{
    use RenderizadorHtml;
    
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return new Response(302, [], $this->renderizaHtml(
            "login/formulario-login.php",
            [
                'titulo'=> "Login"
            ]
        ));
    }
}