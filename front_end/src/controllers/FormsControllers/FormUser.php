<?php 

declare(strict_types=1);

namespace App\controllers\FormsControllers;

use App\service\EndPointsRequest;
use League\Plates\Engine;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormUser implements RequestHandlerInterface
{
    public function __construct(private Engine $templates){}

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $response = (new EndPointsRequest())->requestGet('usuarios');
        $user = $response['usuario'];
        return new Response(200, body: $this->templates->render('user', ['usuario'=>$user]));
    }
}