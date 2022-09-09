<?php

namespace Alura\Cursos\Controller;

class NovoCurso extends ControllerHtml implements interfaceControllerRequire
{
    public function processaRequisicao(): void
    {
       
        echo $this->renderizaHtml(
            "/cursos/novo-curso.php",
            [
                "titulo"=>"Novo Curso",
                "input_value" => ''
            ]
        );
    }
}