<?php

	class Pessoas
	{
		public function consultar()
		{
			$con = new PDO('mysql: host=locahost; dbname=teste;','root','efc2505xx');

			$sql = "SELECT * FROM pessoas ORDER BY id ASC";
			$sql = $con->query($sql);
			
			$resultados = array();
			while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
				$resultados[] = $row;
			}	
			return $resultados;
		}
	}