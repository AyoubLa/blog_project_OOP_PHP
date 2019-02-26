<?php 

namespace App;
use \PDO;

/**
 * 
 */
class Database
{
	private $dbname;

	private $dbuser;

	private $dbpass;

	private $dbhost;

	private $pdo;
	
	function __construct($dbname, $dbuser = 'root', $dbpass = '', $dbhost = 'localhost')
	{
        $this->dbhost = $dbhost;
        
		$this->dbname = $dbname;
		
		$this->dbuser = $dbuser;
		
        $this->dbpass = $dbpass;
        
	}

	private function getPDO()
	{
		if($this->pdo === null) {

		    $pdo = new PDO('mysql:host='.$this->dbhost.';dbname='.$this->dbname,$this->dbuser,$this->dbpass);
        
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->pdo = $pdo;

		}
        return $this->pdo;
	}

	public function query($statement, $class_name)
	{
        $req = $this->getPDO()->query($statement);
        
        return $req->fetchAll(PDO::FETCH_CLASS, $class_name);
	}

	public function prepare($statement, $attributes, $class_name, $one = false)
	{
		$req = $this->getPDO()->prepare($statement);

		$req->execute($attributes);

        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);

        if($one) {

            return $req->fetch();

        }else
        {
            return $req->fetchAll();
        }

	}
}