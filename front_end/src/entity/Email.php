<?php

declare(strict_types=1);

namespace App\entity;

class Email
{

    public function __construct(
        public readonly int $emailId,
        public readonly String $assunto,
        public readonly String $corpo,
        public readonly String $emailDestinatario,
        public readonly String $emailRemetente,
        public readonly String $status,
        public readonly String $dataEnvio
    ){}


    public static function fromArray(array $data):self
    {
        return new self(
            emailId: $data['emailId'],
            assunto: $data['assunto'],
            corpo: $data['corpo'],
            emailDestinatario: $data['emailDestinatario'],
            emailRemetente: $data['emailRemetente'],
            status: $data['status'],
            dataEnvio: $data['dataEnvio'],
        );
    }
}

/*

"emailId": 9,
			"assunto": "subject",
			"corpo": "body",
			"emailDestinatario": "adm@gmail.com",
			"emailRemetente": "adm@gmail.com",
			"status": "ENVIADO",
			"dataEnvio": "2025-06-01"

*/