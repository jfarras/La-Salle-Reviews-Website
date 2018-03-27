<?php
/**
 * Inset Controller
 */
class Ex4InsertZooController extends Controller
{
    protected $viewInsert = 'Exercicis/zoo/insertZoo.tpl';
    protected $viewError = 'Exercicis/error/error404.tpl';

    protected $animal;
    protected $tabla;
    /**
     * Aquest métode sempre s'executa i caldrà implementar-lo sempre.
     */
    public function build()
    {
        $this->setLayout($this->viewInsert);
        $this->capturaValor();
    }

    protected function capturaValor()
    {
        $params = $this -> getParams();
        if(count($params) == 1)
        {
            $tipo = $this->animal;
            $this->setLayout($this->viewInsert);
            $this->assign('tipo',$tipo);
            $insert_valor = $this -> getClass ('Ex4InsertAnimalModel');

            // Per capturar una variable enviada mitjançant un formulari HTML pels métodes GET/POST evitant SQL injection
            $nombre = Filter::getString($tipo);
            $url = Filter::getString('url'.$tipo);
            if ($nombre && $url) {
                $insert_valor -> Inserir($nombre,$url,$this->tabla);
            }
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
        $modules['head']	    = 'SharedHeadController';
        $modules['monos']	    = 'Ex3InsertMonoController';
        $modules['ornis']	    = 'Ex3InsertOrniController';
        $modules['marmotas']	= 'Ex3InsertMarmotaController';
        $modules['footer']	    = 'SharedFooterController';
        return $modules;
    }
}