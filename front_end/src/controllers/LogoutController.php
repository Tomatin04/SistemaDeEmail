<?php

declare(strict_types=1);

namespace App\controllers;

use App\service\EndPointsRequest;
use League\Plates\Engine;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class LogoutController implements RequestHandlerInterface
{
    public function __construct(private Engine $templates)
    {
        
    }
    
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $response = (new EndPointsRequest())->requestPost('logout');
        if($response != null){
            session_destroy();
            $_SESSION['token'] = null;
            return new  Response(200, ['Location' => '/login']);
        }else{
            return new Response(403, ['Location' => '/']);
        }
        
    }
}