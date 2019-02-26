<?php 

namespace App;

/**
 * 
 */
class App
{
	private static $db;

    private static $_instance;

	private static $title = 'BlogPosts';

	const DB_HOST = 'localhost';

	const DB_NAME = 'blog';

	const DB_USER = 'root';

	const DB_PASS = '';

    public static function getInstance()
    {
        if(self::$_instance === null) {

        	self::$_instance = new App();
        }

        return self::$_instance;

    }

	public static function getDb()
	{
		if(self::$db === null) {

			self::$db = new Database(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST);
		}
		
		return self::$db;
	}

	public static function getTitle()
	{
		return self::$title;
	}

	public static function setTitle($title)
	{
		self::$title = self::$title . ' | ' . $title;
	}

	public static function notFound()
	{
		header("HTTP/1.0 404 Not Found");
		header("Location: index.php?p=404");
	}
}