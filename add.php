<?php


if (isset($_POST['term'])){
    echo 'test';
}


/*
                                    $term = $_GET['q'];
                                    $url = 'search/tweets.json';
                                    $getfield = '?q=' . $term;
                                    $settings = \Classes\Config::password();
                                    $obj = \Classes\TwitterFunctions::get_field($url, $getfield, $settings);
                                    foreach($obj as $items){
                                        foreach($items as $item){
                                            if(!empty($item)){
                                                $val = $item['text'];
                                                $feed_item = array("text" => $val);
                                                $add = \Classes\curlFunction::Import($feed_item);
                                                print_r($add);
                                            }
                                        }
                                    }
                                    
                                    
*/


?>