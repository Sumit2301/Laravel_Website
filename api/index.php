<?php

// Load the Composer autoload file
require __DIR__ . '/../vendor/autoload.php';

// Create a Laravel application instance
$app = require_once __DIR__ . '/../bootstrap/app.php';

// Handle the incoming request
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$request = Illuminate\Http\Request::capture();
$response = $kernel->handle($request);

// Send the response back to the client
$response->send();

// Terminate the request and response lifecycle
$kernel->terminate($request, $response);
