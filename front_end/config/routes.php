<?php

declare(strict_types=1);

return [
    'GET|/' => \App\Controllers\FormsControllers\FormMain::class,
    'GET|/login' => \App\Controllers\FormsControllers\FormLogin::class,
    'POST|/login' => \App\Controllers\LoginController::class,
    'GET|/register' => \App\Controllers\FormsControllers\FormRegister::class,
    'POST|/register' => \App\Controllers\RegisterController::class,
    'POST|/logout' => \App\controllers\LogoutController::class,
    'GET|/timeOut' => \App\service\TimeOut::class,
    'GET|/perfil' => \App\controllers\FormsControllers\FormUser::class,
    'POST|/perfil' => \App\controllers\UserController::class,
    'GET|/mail' => \App\Controllers\FormsControllers\FormEmail::class,
    'POST|/mail' => \App\Controllers\MailController::class,
    'GET|/creditos' => \App\Controllers\FormsControllers\FormCreditos::class,
    'POST|/sand' => \App\Controllers\SandController::class,
    'GET|/EmailList' => \App\service\EmailList::class,
    'GET|/Detalhes' => \App\service\Detalhes::class,
    'POST|/DeleteUser' => \App\service\DeleteUser::class,
    'GET|/responder' => \App\Controllers\FormsControllers\FormResponse::class,
]; 