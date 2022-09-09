<?php

use Alura\Cursos\Controller\{
    EditarCurso,
    ExcluirCurso,
    ListarCursos,
    NovoCurso,
    SalvarCurso    
};


return [
    '/listar-cursos' => new ListarCursos(),
    '/novo-curso' => new NovoCurso(),
    '/salvar-curso'=> new SalvarCurso(),
    '/excluir-curso'=> new ExcluirCurso(),
    '/editar-curso'=> new EditarCurso(),
];


