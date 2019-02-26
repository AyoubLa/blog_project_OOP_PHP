<?php 

namespace App\Table;

use App\App;

/**
 * 
 */
class Table
{
	public function __get($key)
	{
        $methode = 'get' . ucfirst($key);

        $this->$key = $this->$methode();

        return $this->$key;
	}

	public static function all()
	{
    	return self::query('
    		SELECT * 
    		FROM '.static::getTable());
    }

    public static function find($id)
    {
    	return self::query('
    		SELECT * 
    		FROM '.static::getTable().'
    		WHERE '.static::getTable().'_id = ?',
        [$id], true);
    }

    public static function query($statement, $attributes = null, $one = false)
    {
        if($attributes === null) {

        	return App::getDb()->query($statement, get_called_class());

        }else {
        	
        	return App::getDb()->prepare($statement,
            $attributes,
	        get_called_class(), $one);
        }
    }

}