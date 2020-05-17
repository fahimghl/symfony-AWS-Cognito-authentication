<?php
use App\Bridge\CognitoClient;
use Aws\Sdk;

require dirname ( __DIR__ ) . '/../vendor/autoload.php';

$config = require __DIR__ . '/config.php';

$aws = new Sdk($config);
$cognitoClient = $aws->createCognitoIdentityProvider();

$client = new CognitoClient( $cognitoClient );
$client->setAppClientId($config['app_client_id']);
$client->setAppClientSecret($config['app_client_secret']);
$client->setRegion($config['region']);
$client->setUserPoolId($config['user_pool_id']);

return $client;
