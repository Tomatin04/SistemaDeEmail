<?php

declare(strict_types=1);


namespace App\Controllers;

use App\service\EndPointsRequest;
use League\Plates\Engine;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;


class MailController implements RequestHandlerInterface
{
    public function __construct(private Engine $templates){}

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

        $response = (new EndPointsRequest())->requestGet('emails', $id);

        if($_SESSION['statusHTTP'] == 200){
            return new Response(200, ["Location" => '/']);
        }
        return new Response(401);
    }
}