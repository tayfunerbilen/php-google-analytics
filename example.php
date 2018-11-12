<?php

ini_set('display_errors', 1);

require __DIR__ . '/vendor/autoload.php';

$client = new Google_Client();
$client->setAuthConfig("json dosyanızın yolu");
$client->setScopes(['https://www.googleapis.com/auth/analytics.readonly']);

$analytics = new Google_Service_Analytics($client);

$viewId = ""; // kendi view id'nizi belirtin

$result = $analytics->data_ga->get(
    'ga:' . $viewId,
    '30daysAgo',
    'today',
    'ga:sessions',
    [
        'dimensions' => 'ga:browser'
    ]
);

echo '<pre>';
print_r($result['rows']);
