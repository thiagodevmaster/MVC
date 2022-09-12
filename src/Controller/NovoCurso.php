<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Helper\RenderizadorHtml;

class NovoCurso implements interfaceControllerRequire
{
    use RenderizadorHtml;

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