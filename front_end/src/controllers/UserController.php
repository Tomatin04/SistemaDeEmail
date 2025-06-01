<?php

declare(strict_types=1);

namespace App\controllers;

use App\service\EndPointsRequest;
use League\Plates\Engine;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class UserController implements RequestHandlerInterface
{
    public function __construct(private Engine $tempplates){}

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $nome = filter_input(INPUT_POST, 'nome');
        $senha = filter_input(INPUT_POST, 'senha');

        $data = [
            'nome' => $nome,
            'senha' => $senha
        ];

        $response = (new EndPointsRequest())->requestPut('usuarios', json_encode($data));

        if($response != null){
            return new Response(200, ['Location' => '/perfil']);
        }

        return new Response(401, ['Location' => '/perfil']);
    }
}