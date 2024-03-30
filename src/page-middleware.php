<?
    $page = 'home';

    if(isset($_GET['page'])) {
        $page = $_GET['page'];
    }

    if(!file_exists("{$page}.php")) {
        $page = '404'; 
        http_response_code(404);    
    }
