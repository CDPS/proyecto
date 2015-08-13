<?php

class Controlador {
	

	protected $parametros;

	protected function cargarModelo($modelo)
	{
		$modelo= ucfirst(strtolower($modelo));

		$urlFile= 'modelos/'.$modelo.'.php';

		 if(file_exists($urlFile))
    	{
    		include $urlFile;

      		$class = $modelo;
      		$model = new $class();

      		return $model;
		}else{

			return null;
		}
	}


	protected function cargarVista($vista, $param =null)
	{
		$vista= ucfirst(strtolower($vista));
		$urlFile= 'vistas/'.$vista.'.php';

		 if(file_exists($urlFile))
    	{
    		require_once($urlFile);

      		//return true;
		}else{

			return false;
		}
	}

	public function setParametros($parametros){

		$this->parametros=$parametros;
	}

	protected function getParametros(){
		return $this->parametros;
	}
}