<?php

namespace Alura\Cursos\Controller;

class Login extends ControllerHtml implements interfaceControllerRequire
{
    
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