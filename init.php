<?php


require_once 'vendor/autoload.php';

$es = new Elasticsearch\Client([
    'hosts' => ['http://127.0.0.1:9200']
]);


?>