<?php
/**
 * List Controller
 */
class Ex4ListZooController extends Controller
{
    protected $viewList = 'Exercicis/zoo/listZoo.tpl';
    protected $viewError = 'Exercicis/error/error404.tpl';

    /**
     * Aquest métode sempre s'executa i caldrà implementar-lo sempre.
     */
    public function build()
    {
        //Crida a un métode que mostrarà contingut per pantalla.
        $this->mostrarContingut();
    }

    protected function mostrarContingut()
    {
        $params = $this->getParams();
        if(count($params) == 1)
        {
            $this->setLayout($this->viewList);
        }
        else
        {
            $this->setLayout($this->viewError);
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
        $modules['monos']	    = 'Ex4ListMonoController';
        $modules['ornis']	    = 'Ex4ListOrniController';
        $modules['marmotas']	= 'Ex4ListMarmotaController';
        $modules['footer']	    = 'SharedFooterController';
        return $modules;
    }
}