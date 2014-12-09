<?php
require_once 'app/init.php';

if($_GET!=NULL){
    $q = $_GET['q'];
    $params = array();
    $params['index'] = 'twitter';
    $params['type']  = 'drone';
    $params['body']['query']['match']['tweet'] = $q;
    $client = new Elasticsearch\Client();

    $results = $client->search($params);
    function searchForId($id, $array) {
        foreach ($array as $key => $val) {
            if ($val['uid'] === $id) {
                return $key;
            }
    }
        return null;
    }
    $hits = searchForId('hits', $results);
    print_r($hits);
    
    
}

$table = '
        
                <table class="table" data-height="200" data-card-view="true">
                    <thead>
                        <tr>
                            <th data-halign="center" data-align="center">Tweet</th>

                        </tr>
                    </thead>
                
                ';
                
                
                    
                    $table .= "<tr>";
                   
                            $table .="<td>" . $results['hits']['hits'] . "</td>";
                    
                            
                    $table .= "</tr>";
                
                
                
    
            $table .= "</table>";
            echo $table;
    

?>



<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Search</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <form action="index.php" method="get" autocomplete="off">
        <label>
            Search for something
            <input type="text" name="q">
        </label>
        <input type="submit" value="Search">
    </form>
    
    
    
    </body>
</html>



<?php
/*
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

*/
?>