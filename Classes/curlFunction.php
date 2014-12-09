<?php
namespace Classes;
class curlFunction{
    public static function Import($tweet){
        $search_host = '127.0.0.1';
        $search_port = '9200';
        $index = 'twitter2';
        $doc_type = 'tweet';

            $json_doc = array(
                        "user" => "kimchy",
                        "post_date" => "2012-11-15T14:12:12",
                        "message" => "trying out Elastic Search"
                    );
            //$tweet = json_encode($json_doc);

            $baseUri = 'http://'.$search_host.':'.$search_port.'/'.$index.'/'.$doc_type .'/';

            $ci = curl_init();
            curl_setopt($ci, CURLOPT_URL, $baseUri);
            curl_setopt($ci, CURLOPT_PORT, $search_port);
            curl_setopt($ci, CURLOPT_TIMEOUT, 200);
            curl_setopt($ci, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ci, CURLOPT_FORBID_REUSE, 0);
            curl_setopt($ci, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ci, CURLOPT_POSTFIELDS, $tweet);
            $response = curl_exec($ci);
            return $response;
        }

    public static function Search($term){
        $search_host = '127.0.0.1';
        $search_port = '9200';
        $index = 'twitter2';
        $doc_type = 'tweet';
       
            $json_doc = json_encode($json_doc);

            $baseUri = 'http://'.$search_host.':'.$search_port.'/'.$index.'/_search?q=message:'. $term;

            $ci = curl_init();
            curl_setopt($ci, CURLOPT_URL, $baseUri);
            curl_setopt($ci, CURLOPT_PORT, $search_port);
            curl_setopt($ci, CURLOPT_TIMEOUT, 200);
            curl_setopt($ci, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ci, CURLOPT_FORBID_REUSE, 0);
            curl_setopt($ci, CURLOPT_CUSTOMREQUEST, 'GET');
            $response = curl_exec($ci);
            return(json_decode($response, TRUE));
            
        
        }
    }

$var = curlFunction::Import();
print_r($var);
$search = curlFunction::Search('Elastic');
print_r($search);


?>
