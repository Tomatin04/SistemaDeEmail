<?php 

declare(strict_types=1);

namespace App\controllers\FormsControllers;

use League\Plates\Engine;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormResponse implements RequestHandlerInterface
{
    public function __construct(private Engine $templates){}

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        foreach($_SESSION['itens'] as $item){
            if((int)$item['id'] == $_GET['id']){
                $email = $item;
            }
        }

        return new Response(200, body:$this->templates->render('responseForm', ['email' => $email]));
    }
}