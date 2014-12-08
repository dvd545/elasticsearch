twitter files
require_once 'tw_autoloader.php';
<?php
require 'autoloader.php';
                                    $url = 'search/tweets.json';
                                    $getfield = '?q=replanceNJ7';
                                    $settings = \Classes\Config::password();
                                    $object3 = \Classes\TwitterFunctions::get_field($url, $getfield, $settings);
                                    $feed = \Classes\HtmlFunctions::show_mentions($object3);
                            ?>