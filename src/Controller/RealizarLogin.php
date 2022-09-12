<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Helper\FlashMessageTrait;
use Alura\Cursos\Infra\EntityManagerCreator;

class RealizarLogin implements interfaceControllerRequire
{
    use FlashMessageTrait;

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
            $this->defineMensagem('danger', 'O e-mail digitado não é válido');
            header("Location: /login");
            return;
        }

        $user = $this->repository->findOneBy(
            ['email'=>$email]
        );
    
        if(is_null($user) || $user->senhaEstaCorreta($senha) === false){
            $this->defineMensagem('danger', 'E-mail ou senha digitado não é válido');
            header("Location: /login");
            return;
        }

        $_SESSION['logado'] = true;

        header("Location: /listar-cursos");

    }
}