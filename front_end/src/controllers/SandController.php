<?php

declare (strict_types=1);

namespace App\controllers;

use App\service\EndPointsRequest;
use League\Plates\Engine;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class SandController implements RequestHandlerInterface
{
    public function __construct(private Engine $templates){}

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $assunto = filter_input(INPUT_POST, 'assunto');
        $destinatario = filter_input(INPUT_POST, 'destinatario');
        $corpo = filter_input(INPUT_POST, 'corpo');
        $rascunhoId = filter_input(INPUT_POST, 'rascunhoId');

        $option = filter_input(INPUT_POST, 'option');


        $deleteValue = filter_input(INPUT_POST, 'deleteValue');

        $data = [
            'assunto' => $assunto,
            'emailDestinatario' => $destinatario,
            'corpo' => $corpo,
            'rascunhoId' => (int)$rascunhoId
        ];

        

    
        
        if($option == 'excluir'){
            (new EndPointsRequest())->requestDeleteId('rascunhos', (int)$deleteValue);
            return new Response(200, ['Location' => '/']);
        }else if($option == 'enviar'){
            if($rascunhoId != 0 ){
                if($assunto != null && $destinatario != null && $corpo !=null){
                    (new EndPointsRequest())->requestPostId('emails', json_encode($data), $rascunhoId);
                    return new Response(200, ['Location' => '/']);
                }else{
                    return new Response(401, ["Location" => '/mail']);
                }
            }else{
                if($assunto != null && $destinatario != null && $corpo !=null){
                    unset($data['rascunhoId']);
                    (new EndPointsRequest())->requestPost('emails', json_encode($data));
                    return new Response(200, ['Location' => '/']);
                }else{
                    return new Response(401, ["Location" => '/mail']);
                }
            } 
        }else if($rascunhoId != 0){
            if($assunto != null || $destinatario != null || $corpo != null){
                unset($data['rascunhoId']);
                
                (new EndPointsRequest())->requestPutId('rascunhos', (int)$rascunhoId, json_encode($data));
                return new Response(200, ['Location' => '/']);
            }else{
                return new Response(401, ["Location" => '/mail']);
            } 
        }else{
            if($assunto != null || $destinatario != null || $corpo != null){
                unset($data['rascunhoId']);
                (new EndPointsRequest())->requestPost('rascunhos', json_encode($data));
                return new Response(200, ['Location' => '/']);
            }else{
                return new Response(401, ["Location" => '/mail']);
            } 
        }
    }
}