<?php 

declare(strict_types=1);

namespace App\service;

use League\Plates\Engine;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class DeleteUser implements RequestHandlerInterface
{
    public function __construct(private Engine $templates){}

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $response = (new EndPointsRequest())->requestDelete('usuarios');

        if ($response != null) {
            session_destroy();
            $_SESSION['token'] = null;
            return new Response(200, ['Location' => '/login']);
        }
        return new Response(4001, ['Location' => '/']);
    }
}