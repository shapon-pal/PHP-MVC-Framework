<?php
include 'app/config/path.php';
spl_autoload_register(function($class){
    include LIBS.$class.'.php';
});



// URL
$url = isset($_GET['url']) ? $_GET['url'] : null;
if ($url != null) 
{
	$url = rtrim($url, '/');
    $url = explode('/', filter_var($url, FILTER_SANITIZE_URL));
}else{
	unset($url);
}

if (isset($url[0])) 
{

	include 'app/controllers/'.$url[0].'.php';
    $ctlr = new $url[0]();

    if (isset($url[2])) 
    {
    	$ctlr->$url[1]($url[2]);

    }else if(isset($url[1]))
    {
    	$ctlr->$url[1]();
    }
}else
{
    include 'app/controllers/Index.php';
	$index = new Index();
	$index->home();
}
