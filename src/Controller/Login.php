<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Helper\RenderizadorHtml;

class Login implements interfaceControllerRequire
{
    use RenderizadorHtml;
    
    public function processaRequisicao(): void
    {
        echo $this->renderizaHtml(
            "login/formulario-login.php",
            [
                'titulo'=> "Login"
            ]
        );
    }
}