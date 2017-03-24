<?php

class bdd {

public $donnees = NULL;

function __construct($MYSQL_host, $MYSQL_dbname, $MYSQL_user, $MYSQL_password)
{
	try
	{
		$this->bdd=new PDO('mysql: host ='.$MYSQL_host.'; dbname='. $MYSQL_dbname, $MYSQL_user, $MYSQL_password); //on crée un objet dans la classe bdd
		$this->bdd->exec('SET NAMES utf8');
		$this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // '::' Avoir acces a un attribut statique de la classe
	}
	catch (Exception $e)
	{
		die ('Erreur : '.$e->getMessage());
	}
}

public function querryArray ($monquery, $mesdonnees = array ()){

	try {
		 $request = $this->bdd->prepare($monquery);
		 $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		 $request->execute ($mesdonnees);
		 $this->donnees =$request->fetchAll();

	}
	catch (PDOExection $e)
	{
		die ('Erreur : '.$e->getMessage());
	}

}



public function query($monquery, $mesdonnees = array ()){

	try {
		 $request = $this->bdd->prepare($monquery);
		 $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		 $request->execute ($mesdonnees);
		 $this->donnees =$request->fetch();

	}
	catch (PDOExection $e)
	{
		die ('Erreur : '.$e->getMessage());
	}
}

}
