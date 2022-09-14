<?php

use Alura\Cursos\Controller\{
    EditarCurso,
    ExcluirCurso,
    ListarCursos,
    Login,
    Logout,
    NovoCurso,
    RealizarLogin,
    SalvarCurso,
};


return [
    '/listar-cursos' => ListarCursos::class,
    '/novo-curso' => NovoCurso::class,
    '/salvar-curso'=> SalvarCurso::class,
    '/excluir-curso'=> ExcluirCurso::class,
    '/editar-curso'=> EditarCurso::class,
    '/login'=> Login::class,
    '/realiza-login'=> RealizarLogin::class,
    '/logout' => Logout::class,
];


