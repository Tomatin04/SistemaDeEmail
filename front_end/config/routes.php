<?php

declare(strict_types=1);

return [
    'GET|/' => \App\Controllers\FormsControllers\FormMain::class,
    'GET|/login' => \App\Controllers\FormsControllers\FormLogin::class,
    'GET|/register' => \App\Controllers\FormsControllers\FormRegister::class,
]; 