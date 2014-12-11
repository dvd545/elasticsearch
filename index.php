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
            <h3>Search for something in the Elastic Search Database!</h3>
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
                    
    $params['index'] = 'twitter';
    $params['type']  = 'drone';
    $params['body']['query']['match']['tweet'] = $q;
    $client = new Elasticsearch\Client();

    $results2 = $client->search($params);
                    //print_r($results2);
                $array_tweet = array();
               foreach($results2['hits']['hits'] as $hits){
                   //print_r($hits);
                    foreach($hits['_source'] as $message){

                        $array_tweet[] = $message;
                        
                            echo $message . '<br>';
                            
                    }
    
    
                }
                    print_r($array_tweet);
                }

*/

            $search = \Classes\curlFunction::Search($q);
                $array_tweet = array();
                foreach($search['hits']['hits'] as $hits){
                    foreach($hits['_source'] as $message){

                        $array_tweet[] = $message;
                        
                            echo $message . '<br>';
                            
                    }
    
    
                }
                    print_r($array_tweet);
                }
        
            ?>
        </div>
    
    
    
    </body>
</html>


