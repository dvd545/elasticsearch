<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.0/yeti/bootstrap.min.css" rel="stylesheet">        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">IS421 Elastic Search Project By David Schmidt</a>
        </div>
        <!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Search With Elastic Search</h1>
        <p>Results are displayed from a database of tweets</p>
          <form action="index.php" method="get" autocomplete="off">
              <div class="inner-addon right-addon ">
                  <i class="glyphicon glyphicon-search"></i>
                    <input type="search" name="q" class="form-control" placeholder="Search" />
                        <script src="text/javascript">
                         $(function() {
                            $("input").keypress(function (e) {
                                if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
                                    $('button[type=submit] .default').click();
                                    return false;
                                } else {
                                    return true;
                                }
                            });
                        });

                      </script>
                     </div>
          </form>

      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-12">
          <?php
                         require_once 'vendor/autoload.php';
                        require_once 'tw_autoloader.php';
                        ini_set('display_errors', 'On');
            
                        $es = new Elasticsearch\Client();

                        if(isset($_GET['q'])){
                            $q = $_GET['q'];
                        

                            $search = \Classes\curlFunction::Search($q);
                            $array_tweet = array();
                            $table = "<h2>Query Results</h2>
                                        <table class='table table-striped table-hover'>
                                          <thead>
                                            <tr>
                                              <th>Results</th>
                                            </tr>
                                          </thead>
                                          <tbody>";
                            $term = $_GET['q'];
                            foreach($search['hits']['hits'] as $hits){
                                        foreach($hits['_source'] as $message){
                                            $table .= "<tr><td>" . $message . "</td></tr>";
                                        }
                            }
                            $table .= "</tbody></table>";
                            
                            if($search['hits']['total'] == 0){ ?>
                                <div class="alert alert-dismissable alert-danger">
                                  <button type="button" class="close" data-dismiss="alert">×</button>
                                  <h4>Sorry!</h4>
                                  <p>We didnt find any search criteria for the terms you provided. Try clicking the button below to add the terms.</p>
                                </div>
                                    <?php    
                                    echo "<a href='index.php?term=" . $term . "' class='btn btn-warning btn-lg'>Add " . $term . " &raquo; </a>";
                            }else{
                                echo $table;
                            }
                        }


                          

                       if(isset($_GET['term'])) {
                                $term = $_GET['term'];
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
                                        }
                                    }
                                } ?>
                            <div class="alert alert-dismissable alert-info">
                              <button type="button" class="close" data-dismiss="alert">×</button>
                              <strong>Success!</strong>  Twitter was searched for <?php echo $term; ?> and was added to the database. Try your search again!
                            </div> 
                        <?php } ?>
                            
            

    

        
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; Company 2014</p>
      </footer>
    </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>
    </body>
</html>
