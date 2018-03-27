<?php
/**
 * Mono1 Controller: Controller monos grans.
 */
class MonitosMono1Controller extends Controller
{
	protected $view = 'Exercicis/monitos/fotos.tpl';
	protected $viewIndex = 'Exercicis/monitos/indice.tpl';

	/**
	 * Aquest m�tode sempre s'executa i caldr� implementar-lo sempre.
	 */
	public function build()
	{
		//Crida a un m�tode que mostrar� contingut per pantalla.
		$this->mostrarFoto();		
	
	}
	
	protected function mostrarFoto()
	{
		$params = $this->getParams();
		if (count($params) > 1) 
		{
			//Hi ha algun paramtre extra
			$numFoto = $params['url_arguments'][0];
			// Si s'ha escollit una foto
			if($numFoto) 
			{
				if ($numFoto < 4 && $numFoto > 0) 
				{
					$path = "/imag/monos/grande" . $numFoto . ".jpg";
					$this->assign('desti',$path);
					$this->assign('numFoto',$numFoto);
				} 
				else 
				{
					$this->assign('tipo',"Grande");
					$this->assign('rango',"1..3");
				}
				// Caldr� sempre definir una vista per cada controllador. Pot quedar definidar 
				// aqui o dins d'un altre m�tode cridat a build().		
				// El fitxer referenciat es troba a: instances/<la_vostra_instancia>/templates/home/home.tpl
				$this->setLayout($this->view);	
			}
		}
		else 
		{
			// Caldr� sempre definir una vista per cada controllador. Pot quedar definidar 
			// aqui o dins d'un altre m�tode cridat a build().		
			// El fitxer referenciat es troba a: instances/<la_vostra_instancia>/templates/home/home.tpl
			$this->setLayout($this->viewIndex);	
		}
	}
	
	/**
	 * With this method you can load other modules that we will need in our page. You will have these modules availables in your template inside the "modules" array (example: {$modules.head}).
	 * The sintax is the following:
	 * $modules['name_in_the_modules_array_of_Smarty_template'] = Controller_name_to_load;
	 *
	 * @return array
	 */
	public function loadModules() {
		$modules['head']	= 'SharedHeadController';
		$modules['footer']	= 'SharedFooterController';
		return $modules;
	}
}