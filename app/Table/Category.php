<?php 

namespace App\Table;

use App\App;

/**
 * 
 */
class Category extends Table
{
	private static $table = 'category';

	public static function getTable()
	{
		return self::$table;
	}

	public function getUrl()
	{
		return 'index.php?p=category&id='.$this->category_id;
	}

	public function getName()
	{
		return utf8_encode($this->category_name);
	}
}