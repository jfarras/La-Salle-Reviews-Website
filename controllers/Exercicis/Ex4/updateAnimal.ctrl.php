<?php
/**
 * Inset Controller
 */
class Ex4UpdateAnimalController extends Controller
{
    protected $viewUpdate = 'Exercicis/zoo/updateAnimal.tpl';
    protected $viewList = 'Exercicis/zoo/listZoo.tpl';
    protected $viewError = 'Exercicis/error/error404.tpl';

    /**
     * Aquest métode sempre s'executa i caldrà implementar-lo sempre.
     */
    public function build()
    {
        //Crida a un métode que mostrarà contingut per pantalla.
        $this->capturaValor();
    }

    protected function capturaValor()
    {
        $params = $this -> getParams();
        if(count($params) == 2)
        {
            $this->setLayout($this->viewUpdate);
            $taula = $params['url_arguments'][0];
            $id = $params['url_arguments'][1];

            $update_valor = $this -> getClass ('Ex4UpdateAnimalModel');

            // Per capturar una variable enviada mitjançant un formulari HTML pels métodes GET/POST evitant SQL injection
            $nombre = Filter::getString('nombre');
            $url = Filter::getString('url');

            if ($nombre && $url) {
                $update_valor -> update($nombre,$url,$taula,$id);
                $this->assign("flag", "Imatge editada correctament");
                $this->setLayout($this->viewList);

            }
        }
        else
        {
            $this->setLayout($this->viewError);
        }

    }
    public function loadModules() {
        $modules['head']	    = 'SharedHeadController';
        $modules['monos']	    = 'Ex4ListMonoController';
        $modules['ornis']	    = 'Ex4ListOrniController';
        $modules['marmotas']	= 'Ex4ListMarmotaController';
        $modules['footer']	    = 'SharedFooterController';
        return $modules;
    }

}