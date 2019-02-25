<?php 

namespace App;

/**
 * 
 */
class App
{
	private static $db;

	const DB_HOST = 'localhost';

	const DB_NAME = 'blog';

	const DB_USER = 'root';

	const DB_PASS = '';

	public static function getDb()
	{
		if(self::$db === null) {

			self::$db = new Database(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST);
		}
		

		return self::$db;
	}
	
}