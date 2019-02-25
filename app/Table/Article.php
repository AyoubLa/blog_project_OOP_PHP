<?php 

namespace App\Table;

use App\App;

/**
 * 
 */
class Article extends Table
{
	public function __get($key)
	{
        $methode = 'get' . ucfirst($key);

        $this->$key = $this->$methode();

        return $this->$key;
	}
	
    public static function getLast(){

    	return App::getDb()->query('SELECT * FROM posts', __CLASS__);
    }

    public static function getPost($post_id){

    	return App::getDb()->prepare('SELECT * FROM posts WHERE post_id = ?', [$post_id], __CLASS__, true);
    }

	public function getUrl()
	{
		return 'index.php?p=article&post='.$this->post_id;
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
		$html = '<p>' . utf8_encode($this->post_content) . '</p>';

		$html .= '<p><a href="'.$this->getUrl().'">Voir la suite</a></p>';

		return $html;
	}


}

