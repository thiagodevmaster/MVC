<?php

namespace Alura\Cursos\Controller;

class NovoCurso implements interfaceControllerRequire
{
    public function processaRequisicao(): void
    {
        $titulo = "Novo curso";
        $input_value = "";
        require __DIR__."/../../view/cursos/novo-curso.php";
    }
}