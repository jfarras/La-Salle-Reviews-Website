<?php
/**
 * Select Controller
 */
class Ex3SelectZooController extends Controller
{
    protected $viewSelect = 'Exercicis/zoo/selectZoo.tpl';
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
        if(count($params) > 1)
        {
            $URLarguments = $params['url_arguments'];
            if (count($URLarguments) == 1)
            {
                $this->setLayout($this->viewSelect);

                $id = $URLarguments[0];
                $select_model = $this->getClass('Ex3SelectAnimalModel');            $this->assign('id',(int)$id);

                $maxMono = $select_model->ConsultarMida('imagenesmonos');
                $maxOrni = $select_model->ConsultarMida('imagenesornitorrincos');
                $maxMarmota = $select_model->ConsultarMida('imagenesmarmotas');

                $max = $maxMono[0]['COUNT(*)'];
                if ($max < $maxOrni[0]['COUNT(*)']) $max = $maxOrni[0]['COUNT(*)'];
                if ($max < $maxMarmota[0]['COUNT(*)']) $max = $maxMarmota[0]['COUNT(*)'];

                $this->setParams(array('id'=>$id));

                if ($id > 1)
                {
                    $this->assign("prev", true);
                }
                else
                {
                    $this->assign("prev", false);
                }
                if ($id+2 < $max)
                {
                    $this->assign("next", true);
                }
                else
                {
                    $this->assign("next", false);
                }
            }
            else
            {
                $this->setLayout($this->viewError);
            }
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
        $modules['monos']	    = 'Ex3SelectMonoController';
        $modules['ornis']	    = 'Ex3SelectOrniController';
        $modules['marmotas']	= 'Ex3SelectMarmotaController';
        $modules['footer']	    = 'SharedFooterController';
        return $modules;
    }
}