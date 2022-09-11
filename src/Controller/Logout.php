<?php

namespace Alura\Cursos\Controller;

class Logout implements interfaceControllerRequire
{
    public function processaRequisicao(): void
    {
        session_destroy();
        header('Location: /login');
    }
}