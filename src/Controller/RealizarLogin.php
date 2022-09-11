<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Infra\EntityManagerCreator;

class RealizarLogin implements interfaceControllerRequire
{
    private $entityManager;
    private $repository;

    public function __construct()
    {
        $this->entityManager = EntityManagerCreator::getEntityManager();
        $this->repository = $this->entityManager->getRepository(Usuario::class);
    }

    public function processaRequisicao(): void
    {
        $email = filter_input(
            INPUT_POST,
            'email',
            FILTER_VALIDATE_EMAIL
        );

        $senha = htmlspecialchars($_POST['senha']);
        
        if($email === false || is_null($email)){
            echo "email inválido";
            return;
        }

        $user = $this->repository->findOneBy(
            ['email'=>$email]
        );
    
        if(is_null($user) || $user->senhaEstaCorreta($senha) === false){
            echo "E-mail ou senha inválidos";
            return;
        }

        $_SESSION['logado'] = true;

        header("Location: /listar-cursos");

    }
}