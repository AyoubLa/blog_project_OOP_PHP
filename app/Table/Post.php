<?php 

namespace App\Table;

use App\App;

/**
 * 
 */
class Post extends Table
{
    protected static $table = 'post';

	public function __get($key)
	{
        $methode = 'get' . ucfirst($key);

        $this->$key = $this->$methode();

        return $this->$key;
	}
	
    public static function getLast(){

    	return parent::query('SELECT * FROM '.static::$table.' LEFT JOIN '.Category::$table.' 
    		    ON post_category_id = category_id');
    	
    }

    public static function lastByCategory($id){

	return parent::query('
		SELECT * FROM '.static::$table.' 
		LEFT JOIN '.Category::$table.' 
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
		$html = '<p>' . substr($this->post_content, 0, 100) . '</p>';

		$html .= '<p><a href="'.$this->getUrl().'">Voir la suite</a></p>';

		return $html;
	}

	public function getContent()
	{
		return '<p>' . utf8_encode($this->post_content) . '</p>';
	}


}

