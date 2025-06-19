<?php

declare(strict_types=1);

namespace App\controllers;

use App\service\EndPointsRequest;
use League\Plates\Engine;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RegisterController implements RequestHandlerInterface
{
    public function __construct(private Engine $templates){}

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $senha = filter_input(INPUT_POST, 'senha');
        $confirmaSenha = filter_input(INPUT_POST, 'confirmar_senha');

        if($senha != $confirmaSenha) return new Response(400, ['Location' => '/register']);
        
        $nome = filter_input(INPUT_POST, 'nome');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        $data = [
            'nome' => $nome,
            'senha' => $senha,
            'email' => $email
        ];

        $response = (new EndPointsRequest())->requestPost('usuarios', json_encode($data));

        if($_SESSION['statusHTTP'] == 201){
            return new Response(200, ['Location' => '/']);
        }

        return new Response(400, body: $this->templates->render('register'));
    }
}