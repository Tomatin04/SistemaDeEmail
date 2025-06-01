<?php

declare(strict_types=1);

namespace App\service;

use League\Plates\Engine;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Detalhes implements RequestHandlerInterface
{
    public function __construct(private Engine $templates){}

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        //id option

        $id = $_GET['id'];
        
        foreach($_SESSION['itens'] as $item){
            if((int)$item['id'] == $id){
                return new Response(200, body: $this->templates->render('mailView', ['item' => $item]));
            }
        }
        return new Response(400, body: $this->templates->render('mailView'));
    }
}