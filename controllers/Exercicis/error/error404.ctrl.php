<?php

class ErrorError404Controller extends Controller
{
	public function build( )
	{
		$this->setLayout( 'Practica/error/error404.tpl' );
	}

	public function loadModules()
	{
		$modules['head']	= 'PracticaSharedHeadController';
		$modules['footer']	= 'PracticaSharedFooterController';

		return $modules;
	}
}


?>