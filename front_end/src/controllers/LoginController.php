<?php

declare(strict_types=1);

namespace App\Controllers;

use App\service\EndPointsRequest;
use League\Plates\Engine;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class LoginController implements RequestHandlerInterface
{
    public function __construct(private Engine $templates){}

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $senha = filter_input(INPUT_POST, 'senha');

        $data = [
            "email" => $email,
            "senha" => $senha
        ];

        $response = (new EndPointsRequest())->requestPost('login', json_encode($data));

    
        if($_SESSION['statusHTTP'] == 200){
            $_SESSION['token'] = $response;
            return new Response(200, ['Location' => '/']);
        }else{
            return new Response(403, ['Location' => '/login']);
        }
        
    }
}