<?php
require_once __DIR__ . '/../../vendor/autoload.php';

$log = new Monolog\Logger('monolog-test');
$log->pushHandler(new Monolog\Handler\StreamHandler(__DIR__ . '/../../app.log', Monolog\Logger::INFO));
$log->info('Verifying Google Signin');

// Get $id_token via HTTPS POST.

$client = new Google_Client(['client_id' => $CLIENT_ID]);  // Specify the CLIENT_ID of the app that accesses the backend
$payload = $client->verifyIdToken($id_token);
if ($payload) {
  $userid = $payload['sub'];
  $log->info("valid token with payload of");
  $log->info($payload);
  // If request specified a G Suite domain:
  //$domain = $payload['hd'];
} else {
  // Invalid ID token
  $log->info("invalid token");
}
?>