<?php 

namespace App\Table;

use App\App;

/**
 * 
 */
class Table
{
	protected static $table;

	public function __get($key)
	{
        $methode = 'get' . ucfirst($key);

        $this->$key = $this->$methode();

        return $this->$key;
	}

	public static function all()
	{

    	return App::getDb()->query('
    		SELECT * 
    		FROM '.static::$table,
         get_called_class());
    }

    public static function find($id)
    {

    	return App::getDb()->prepare('
    		SELECT * 
    		FROM '.static::$table.'
    		WHERE '.static::$table.'_id = ?',
        [$id],
        get_called_class(), true);
    }

    public static function query($statement, $attributes = null )
    {
        if($attributes === null) {

        	return App::getDb()->query($statement, get_called_class());

        }else {
        	
        	return App::getDb()->prepare($statement,
            $attributes,
	        get_called_class());
        }
    }

}