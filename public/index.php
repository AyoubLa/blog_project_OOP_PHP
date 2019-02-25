<?php 

namespace App;

require '../app/Autoloader.php';

Autoloader::register();

if(isset($_GET['p']) && isset($_GET['post'])){

	$p = $_GET['p'];

}else{

	$p = 'home';
}

//Objects initialisation

// $db = new Database('blog');

ob_start();

if($p === 'home'){

	require '../pages/home.php';

}elseif($p === 'article'){

    require '../pages/single.php';

}

$content = ob_get_clean();

require '../pages/template/default.php';