<?php
header('Content-Type: application/json; charset=utf-8');

require_once 'classes/pessoas.php';

class Rest
{
	public static function open($req)
	{
		if ($req == null) {
			return json_encode(array('status' => 'erro', 'dados' => 'URL Vazia!'));
		} else {
			$url = explode('/', $req['url']);
			if (count($url) <= 2) {

				$classe = ucfirst($url[0]);
				$metodo = $url[1];

				if (class_exists($classe)) {
					if (method_exists($classe, $metodo)) {
						$retorno = call_user_func_array(array(new $classe, $metodo), []);
						return json_encode(array('status' => 'sucesso', 'dados' => $retorno));
					} else {
						return json_encode(array('status' => 'erro', 'dados' => 'Metodo inexistente!'));
					}
				} else {
					return json_encode(array('status' => 'erro', 'dados' => 'Classe inexistente!'));
				}
			} else {
				return json_encode(array('status' => 'erro', 'dados' => 'Pagina Nao Encontrada!'));
			}
		}
	}
}
