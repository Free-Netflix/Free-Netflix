<?php

class DB{
	public function con(){
		try{
			return new PDO("mysql:host=localhost;dbname=netflix", "root", "xande321321");
		}catch(PDOException $e){
			var_dump($e);
		}
	}
}