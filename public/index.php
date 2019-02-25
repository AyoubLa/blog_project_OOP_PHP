<?php 

namespace App;

require '../app/Autoloader.php';

Autoloader::register();

if(isset($_GET['p']) && isset($_GET['id'])){

	$p = $_GET['p'];

}else{

	$p = 'home';
}

//Objects initialisation

// $db = new Database('blog');

ob_start();

if($p === 'home'){

	require '../pages/home.php';

}elseif($p === 'post'){

    require '../pages/single.php';

}elseif($p === 'category'){

    require '../pages/category.php';

}elseif ($p === '404') {
	
	require '../pages/404.php';
}

$content = ob_get_clean();

require '../pages/template/default.php';