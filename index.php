<?php
/*
require_once 'vendor/autoload.php';
require_once 'tw_autoloader.php';

$es = new Elasticsearch\Client();

if($_GET!=NULL){
    $q = $_GET['q'];
    $results = \Classes\curlFunction::Search($q);
    foreach($hits as $hit){
   

    //print_r($hits['hits']['hits']);
    
    foreach($results['hits']['hits'] as $hits){
        print_r($hits);
    
    
    }
    

        
        
        
    
    
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
    
*/
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
    <div class=results>
        <?php
                require_once 'vendor/autoload.php';
                require_once 'tw_autoloader.php';
                    ini_set('display_errors', 'On');


                $es = new Elasticsearch\Client();

                if($_GET!=NULL){
                    $q = $_GET['q'];
                    /*
                    //$vars = \Classes\curlFunction::Search($q);
                    //print_r($hits['hits']['hits']);
                    $new = array();
                    $new = $vars["hits"];
                    $sec = $new["hits"];
                    print_r($sec);
                    //foreach($hits as $hit){
                    //    print_r($hit);
                    //}
                        
                    $params = array();

                    $params['index'] = 'twitter';
                    $params['type']  = 'drone';
                    $params['body']['query']['match']['message'] = $q;

                    $results = $es->search($params);
                   // print_r($results);
                    $params = array();
                    $print_r($results);
                    //foreach($results['hits']['hits'] as $hits){
                      //  print_r($hits);
    
    
                //}
                    */
    $params['index'] = 'twitter';
    $params['type']  = 'drone';
    $params['body']['query']['match']['tweet'] = $q;
    $client = new Elasticsearch\Client();

    $results2 = $client->search($params);
                    //print_r($results2);
                
               foreach($results2['hits']['hits'] as $hits){
                   //print_r($hits);
                    foreach($hits['_source'] as $message){

                        echo $message . '<br>';
                            
                    }
    
    
                }
                }


        
            ?>
        </div>
    
    
    
    </body>
</html>


