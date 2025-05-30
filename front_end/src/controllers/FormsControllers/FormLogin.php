<?php

declare(strict_types=1);

namespace App\Controllers\FormsControllers;

use League\Plates\Engine;
use Nyholm\Psr7\Response;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormLogin implements RequestHandlerInterface
{
    public function __construct(private Engine $templates){}

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return new Response(200, body: $this->templates->render('login'));
    }
}