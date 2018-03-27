<?php
/**
 * Home Controller: Controller d'exemple.
 *
 * Coses a tenir en compte:
 * 	-> El controller fa un "extends Controller"
 * 	-> El controller necessitar� sempre un m�tode "public function build(){...}"
 */
class MonitosMono3Controller extends Controller
{
	protected $view = 'Exercicis/monitos/fotos.tpl';

	/**
	 * Aquest m�tode sempre s'executa i caldr� implementar-lo sempre.
	 */
	public function build()
	{
		//Crida a un m�tode que mostrar� contingut per pantalla.


		$this->mostrarFoto();
        

		// Caldr� sempre definir una vista per cada controllador. Pot quedar definidar 
		// aqui o dins d'un altre m�tode cridat a build().		
		// El fitxer referenciat es troba a: instances/<la_vostra_instancia>/templates/home/home.tpl
		$this->setLayout($this->view);	
	
	}
	
	
	

	protected function asignaValor($arg1)
	{

		$path = "/imag/monos/gracioso" . $arg1 . ".jpg";
		$this->assign('desti',$path);
		$this->assign('numFoto',$arg1);

	}

	protected function mostrarFoto()
	{
		
		$params = $this->getParams();
		$numFoto = $params['url_arguments'][0];
		
		// default:fora marges
		
		switch ($numFoto){
			case 1:
				$this -> asignaValor(1);
				break;
			case 2:
				$this -> asignaValor(2);
				break;
			case 3 :
				$this -> asignaValor(3);
				break;
			
			default: 
				$this->assign('tipo',"Gracioso");
				$this->assign('rango',"1..3");
				break;
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