<?php

declare(strict_types=1);

namespace App\Controllers\FormsControllers;

use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Nyholm\Psr7\Response;

class FormRegister implements RequestHandlerInterface 
{
    public function __construct(private Engine $templates) {}

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return new Response(200, body: $this->templates->render('register'));
    }
}