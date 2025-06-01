<?php

declare(strict_types=1);

namespace App\service;

use App\entity\Email;
use App\service\EndPointsRequest;
use League\Plates\Engine;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class EmailList implements RequestHandlerInterface
{
    public function __construct(private Engine $templates)
    {
        
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $option = $_GET['option'] ?? '';

        switch($option){
            case 'emails':
                $response = (new EndPointsRequest())->requestGet('emails');
                $itens = $response['emails'];
                foreach($itens as &$item){
                    $item['id'] = $item['emailId'];
                    unset($item['emailId']);
                }
                break;
            case 'rascunhos':
                $response = (new EndPointsRequest())->requestGet('rascunhos');
                $itens = $response['rascunhos'];
                foreach($itens as &$item){
                    $item['id'] = $item['rascunhoId'];
                    unset($item['rascunhoId']);
                }
                break;                    
        }
        $_SESSION['itens'] = $itens;
        return new Response(200, body: $this->templates->render('list', ['itens' => $itens, 'option' => $option]));
    }
}







