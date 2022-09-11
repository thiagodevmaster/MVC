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
    '/listar-cursos' => new ListarCursos(),
    '/novo-curso' => new NovoCurso(),
    '/salvar-curso'=> new SalvarCurso(),
    '/excluir-curso'=> new ExcluirCurso(),
    '/editar-curso'=> new EditarCurso(),
    '/login'=> new Login(),
    '/realiza-login'=> new RealizarLogin(),
    '/logout' => new Logout(),
];


