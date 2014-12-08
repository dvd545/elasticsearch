<?php
require_once 'app/init.php';
ini_set("memory_limit", "-1");
ini_set('display_errors', 'On');

if(!empty($_POST)){
    if(isset($_POST['title'], $_POST['body'], $POST['keywords'])) {
        
        $title = $_POST['title'];
        $body = $_POST['body'];
        $keywords = explode(',', $_POST['keywords']);
        
        echo 'title';
    
    }

}



?>



<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Add</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body style="display: table-caption;">
        <form action="add.php" method="POST" autocomplete="off">
        <label>
            Title
            <input type="text" name="title">
        </label>
        <label>
            Body
            <textarea name="body" rows="8"></textarea>
        </label>   
        <label>
            Keywords
            <input type="text" name="keywords" placeholder="comme, separated"> 
        </label>    
        <input type="submit" value="Add">
        </form>
    
    
    </body>
</html>