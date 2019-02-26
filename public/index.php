<?php 

namespace App;

use App\Config;

require '../app/Autoloader.php';

Autoloader::register();

$config = Config::getInstance();

$app = App::getInstance();

var_dump($config);

var_dump($app);

// if(isset($_GET['p']) && isset($_GET['id'])){

// 	$p = $_GET['p'];

// }else{

// 	$p = 'home';
// }

// //Objects initialisation



// ob_start();

// if($p === 'home'){

// 	require '../pages/home.php';

// }elseif($p === 'post'){

//     require '../pages/single.php';

// }elseif($p === 'category'){

//     require '../pages/category.php';

// }elseif ($p === '404') {
	
// 	require '../pages/404.php';
// }

// $content = ob_get_clean();

// require '../pages/template/default.php';