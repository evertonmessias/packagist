<?php

namespace api;

abstract class Pessoas
{
	public static function consultar()
	{
		$con = new \PDO('mysql: host=locahost; dbname=testephp;', 'root', '');

		$sql = "SELECT * FROM pessoas ORDER BY id ASC";
		$sql = $con->query($sql);

		$resultados = array();
		while ($row = $sql->fetch()) {
			$resultados[] = $row;
		}
		return $resultados;
	}
}
