<?php
/**
 * Home Controller: Controller d'exemple.
 *
 * Coses a tenir en compte:
 * 	-> El controller fa un "extends Controller"
 * 	-> El controller necessitar� sempre un m�tode "public function build(){...}"
 */
class HomeHomeController extends Controller
{
	protected $view = 'Exercicis/home/home.tpl';

	/**
	 * Aquest m�tode sempre s'executa i caldr� implementar-lo sempre.
	 */
	public function build()
	{
		// Caldr� sempre definir una vista per cada controllador. Pot quedar definidar 
		// aqui o dins d'un altre m�tode cridat a build().		
		// El fitxer referenciat es troba a: instances/<la_vostra_instancia>/templates/home/home.tpl
		$this->setLayout($this->view);	
	
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