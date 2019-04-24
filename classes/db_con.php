<?php 
	class connectClass{
	protected $dbcon;
	public 	$dbname='mydb';
	public $host='localhost';
	public $uname='root';
	public $pwd=1234;

	function connect(){
		try{
			this->$dbcon=new PDO("mysql:host=$this->host;dbname=$this->dbname",$uname,$pwd);
			return $this->dbcon;
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
}
?>