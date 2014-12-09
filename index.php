<?php

require_once 'vendor/autoload.php';
require_once 'tw_autoloader.php';

$es = new Elasticsearch\Client();

if($_GET!=NULL){
    $q = $_GET['q'];
    $hits = \Classes\curlFunction::Search($q);
    foreach($hits as $hit){
        print_r($hit);
    }
    //print_r($hits['hits']['hits']);
    

        
        
        
    
    
    }

    /*
    $params = array();
    $params['index'] = 'twitter';
    $params['type']  = 'drone';
    $params['body']['query']['match']['tweet'] = $q;
    $client = new Elasticsearch\Client();

    $results = $client->search($params);
    function searchForId($id, $array) {
        foreach ($array as $key => $val) {
            if ($val['hits'] === $id) {
                return $key;
            }
    }
        return null;
    }
    $hits = searchForId('hits', $results);
    print_r($hits);
    */
    


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
        <ul>
            <ul><a href='add.php'>Add data</a></ul>
        </ul>
        <form action="index.php" method="get" autocomplete="off">
        <label>
            Search for something
            <input type="text" name="q">
        </label>
        <input type="submit" value="Search">
    </form>
    
    
    
    </body>
</html>


