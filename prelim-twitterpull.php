<?php
    require 'tw_autoloader.php';
    ini_set('display_errors', 'On');
    require_once 'app/init.php';
    ini_set("memory_limit", "-1");



    $url = 'search/tweets.json';
    $getfield = '?q=drone';
    $settings = \Classes\Config::password();
    $object3 = \Classes\TwitterFunctions::get_field($url, $getfield, $settings);
    //$feed = \Classes\mentions::show_mentions($object3);
    $client = new Elasticsearch\Client();

$document = array(
  'text' => 'John Smith',
    'age' => 26,
    'hobbies' => array('biking', 'surfing'),
    'employer' => array(
        'name' => 'MegaCorp',
        'size' => 49293
    )
);

$params['body']  = $document;
$params['index'] = 'company';
$params['type']  = 'employees';
$params['id']    = 'JohnSmith';

$ret = $client->index($params);



$params = array();
$params['index'] = 'company';
$params['type']  = 'employees';
$params['body']['query']['match']['name'] = 'John';

//$results = $client->search($params);
//print_r($results['hits']['hits']);

    foreach($object3 as $obj){
    foreach($obj as $tweet){
        //print_r($tweet);
        //$tweet = $tweet['text'];
        $doc = array(
            'tweet' => $tweet['text']
            
        
            );
        }
        $params['body'] = $doc;
        $params['index'] = 'twitter';
        $params['type'] = 'drone';
        $ret = $client->index($params); 
        
        
    }
    
$params = array();
$params['index'] = 'twitter';
$params['type']  = 'drone';
$params['body']['query']['match']['tweet'] = 'drone';
$results = $client->search($params);
print_r($results['hits']['hits']);





    

?>