<?php

class PracticaSharedHeadController extends Controller
{
	const REVISION = 31;

	public function build( )
	{
		$this->assign( 'revision', self::REVISION );
		$this->setLayout( 'Practica/shared/head.tpl' );
	}

    public function loadModules() {
        $modules['login']	    = 'PracticaLoginLoginHeadController';
        $modules['search']      = 'PracticaReviewSearchReviewController';
        return $modules;
    }
}

?>
