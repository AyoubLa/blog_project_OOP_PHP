<?php 

namespace App\Table;

use App\App;

/**
 * 
 */
class Post extends Table
{
    private static $table = 'post';

	public static function getTable()
	{
		return self::$table;
	}
	
    public static function getLast(){

    	return parent::query('SELECT * FROM '.static::getTable().' LEFT JOIN '.Category::getTable().' 
    		    ON post_category_id = category_id');
    	
    }

    public static function find($id)
    {
        return static::query('
    		SELECT * 
    		FROM '.static::getTable().'
            LEFT JOIN '.Category::getTable().
                ' ON post_category_id = category_id'.
    		' WHERE '.static::getTable().'_id = ?',
        [$id], true);
    }

    public static function lastByCategory($id){

	return parent::query('
		SELECT * FROM '.static::getTable().' 
		LEFT JOIN '.Category::getTable().' 
		    ON post_category_id = category_id
		WHERE category_id = ?', [$id]);
    	
    }

	public function getUrl()
	{
		return 'index.php?p=post&id='.$this->post_id;
	}

	public function getTitle()
	{
		return utf8_encode($this->post_title);
	}

    public function getExtract()
	{
		$html = '<p>' . substr(utf8_encode($this->post_content), 0, 100) . '</p>';

		$html .= '<p><a class="btn btn-secondary" href="'.$this->getUrl().'" role="button">View more &raquo;</a></p>';

		return $html;
	}

	public function getContent()
	{
		return '<p>' . utf8_encode($this->post_content) . '</p>';
	}


}

