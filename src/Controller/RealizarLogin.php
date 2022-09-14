<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Helper\FlashMessageTrait;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\{ResponseInterface, ServerRequestInterface};
use Psr\Http\Server\RequestHandlerInterface;

class RealizarLogin implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private EntityManagerInterface $entityManager;
    private $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repository = $this->entityManager->getRepository(Usuario::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $data = $request->getQueryParams();

        $email = filter_var(
            $data['email'],
            FILTER_VALIDATE_EMAIL
        );

        $senha = $data['senha'];

        if($email === false || is_null($email)){
            $this->defineMensagem('danger', 'O e-mail digitado não é válido');
            return new Response(302, ['Location'=> '/login']);
        }

        $user = $this->repository->findOneBy(
            ['email'=>$email]
        );
    
        if(is_null($user) || $user->senhaEstaCorreta($senha) === false){
            $this->defineMensagem('danger', 'E-mail ou senha digitado não é válido');
            return new Response(302, ['Location'=> '/login']);
        }

        $_SESSION['logado'] = true;

        return new Response(200, ['Location'=>'/listar-cursos']);

    }
}