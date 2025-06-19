<?php

declare(strict_types=1);

namespace App\service;

class EndPointsRequest
{
    private $endpoints;

    public function __construct()
    {
        $this->endpoints =  require_once __DIR__ . '/../../config/endpoints.php';   
    }

    public function requestGet(String $endpoint, int $id = null)
    {
        

        if($id != null){
            $ch = curl_init($this->endpoints[$endpoint] . '/' . $id);
        }else{
            $ch = curl_init($this->endpoints[$endpoint]);
        }
        
        
        $header = [
            'Accept: application/json',
        ];
        

        if (isset($_SESSION['token'])) $header[] = 'Authorization: Bearer ' . $_SESSION['token']['token'];

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

        $response = curl_exec($ch);
        
        $_SESSION['statusHTTP'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        file_put_contents('php://stderr', $response . '  HttpStatus: ' . $_SESSION['statusHTTP'] . PHP_EOL);
        return json_decode($response, true);
    }

    public function requestPost(String $endpoint, String $data = null)
    {
        $ch = curl_init($this->endpoints[$endpoint]);
        
        $header = [
            'Accept: application/json',
            'Content-Type: application/json',
        ];

        if (isset($_SESSION['token'])) $header[] = 'Authorization: Bearer ' . $_SESSION['token']['token'];
        


        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        if($data != null)curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        

        $response = curl_exec($ch);

        $_SESSION['statusHTTP'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        file_put_contents('php://stderr', $response . '  HttpStatus: ' . $_SESSION['statusHTTP'] . PHP_EOL);
        return json_decode($response, true);
    }

    public function requestPut(String $endpoint, String $data)
    {
        $ch = curl_init($this->endpoints[$endpoint]);

        $header = [
            'Accept: application/json',
            'Content-Type: application/json',
        ];

        if (isset($_SESSION['token'])) $header[] = 'Authorization: Bearer ' . $_SESSION['token']['token'];


        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);


        $response = curl_exec($ch);

        $_SESSION['statusHTTP'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        file_put_contents('php://stderr', $response . '  HttpStatus: ' . $_SESSION['statusHTTP'] . PHP_EOL);
        return json_decode($response, true);
    }

    public function requestDelete(String $endpoint, String $data = null)
    {
        $ch = curl_init($this->endpoints[$endpoint]);

        $header = [
            'Accept: application/json',
            'Content-Type: application/json',
        ];

        if (isset($_SESSION['token'])) $header[] = 'Authorization: Bearer ' . $_SESSION['token']['token'];

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if($data != null)curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);


        $response = curl_exec($ch);

        $_SESSION['statusHTTP'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        file_put_contents('php://stderr', $response . '  HttpStatus: ' . $_SESSION['statusHTTP'] . PHP_EOL);
        return json_decode($response, true);
    }

    public function requestDeleteId(String $endpoint, int $id){
        $ch = curl_init($this->endpoints[$endpoint] . '/' . $id);
        $header = [
            'Accept: application/json',
            'Content-Type: application/json',
        ];

        if (isset($_SESSION['token'])) $header[] = 'Authorization: Bearer ' . $_SESSION['token']['token'];

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //if($data != null)curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);


        $response = curl_exec($ch);

        $_SESSION['statusHTTP'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        file_put_contents('php://stderr', $response . '  HttpStatus: ' . $_SESSION['statusHTTP'] . PHP_EOL);
        return json_decode($response, true);
    }

    public function requestPutId(String $endpoint, int $id, String $data = null)
    {
        $ch = curl_init($this->endpoints[$endpoint] . '/' . $id);
        $header = [
            'Accept: application/json',
            'Content-Type: application/json',
        ];

        if (isset($_SESSION['token'])) $header[] = 'Authorization: Bearer ' . $_SESSION['token']['token'];

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //if($data != null)curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);


        $response = curl_exec($ch);

        $_SESSION['statusHTTP'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        file_put_contents('php://stderr', $response . '  HttpStatus: ' . $_SESSION['statusHTTP'] . PHP_EOL);
        return json_decode($response, true);
    }

    public function requestPostId(String $endpoint, String $data, String $id)
    {
        $ch = curl_init($this->endpoints[$endpoint] . '/' . $id);
        
        $header = [
            'Accept: application/json',
            'Content-Type: application/json',
        ];

        if (isset($_SESSION['token'])) $header[] = 'Authorization: Bearer ' . $_SESSION['token']['token'];
        


        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        if($data != null)curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        

        $response = curl_exec($ch);

        $_SESSION['statusHTTP'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        file_put_contents('php://stderr', $response . '  HttpStatus: ' . $_SESSION['statusHTTP'] . PHP_EOL);
        return json_decode($response, true);
    }
}