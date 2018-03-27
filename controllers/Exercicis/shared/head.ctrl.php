<?php

class SharedHeadController extends Controller
{
	const REVISION = 31;

	public function build( )
	{
		$this->assign( 'revision', self::REVISION );
		$this->setLayout( 'Exercicis/shared/head.tpl' );
	}
}


?>
