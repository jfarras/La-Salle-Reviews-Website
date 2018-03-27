<?php
/**
 * Inset Controller
 */
class Ex4DeleteAnimalController extends Controller
{
    protected $viewDelete = 'Exercicis/zoo/listZoo.tpl';

    /**
     * Aquest métode sempre s'executa i caldrà implementar-lo sempre.
     */
    public function build()
    {
        //Crida a un métode que mostrarà contingut per pantalla.
        $this->EliminaValor();
    }

    protected function EliminaValor()
    {

        $params = $this -> getParams();
        if(count($params) == 2)
        {
            $this->setLayout($this->viewDelete);
            $taula = $params['url_arguments'][0];
            $id = $params['url_arguments'][1];

            $delete_valor = $this -> getClass ('Ex4DeleteAnimalModel');


            // Per capturar una variable enviada mitjançant un formulari HTML pels métodes GET/POST evitant SQL injection

            if ($id && $taula) {
                $delete_valor -> deleteAnimal($id,$taula);
                $this->assign("flag", "Imatge esborrada correctament");
            }

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